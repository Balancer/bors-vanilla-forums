<?php

namespace B2;

define('APPLICATION', 'Vanilla');
define('APPLICATION_VERSION', '2.3.1');
define('DS', '/');
define('PATH_ROOT', getcwd());

define('PATH_CACHE', PATH_ROOT.'/cache');

class Vanilla extends \B2\Obj
{
    /** @var int|null */
    public $UserID = null;

    /** @var string */
    public $CookieName;

    /** @var string */
    public $CookiePath;

    /** @var string */
    public $CookieDomain;

    /** @var string */
    public $VolatileMarker;

    /** @var bool */
    public $CookieHashMethod;

    /** @var string */
    public $CookieSalt;

    /** @var string */
    public $PersistExpiry = '30 days';

    /** @var string */
    public $SessionExpiry = '2 days';

	static function factory($id=NULL)
	{
		$vanilla = parent::factory();

		require '/var/www/offzone.spr.wrk.ru/htdocs/vanilla/conf/config-defaults.php';
		require '/var/www/offzone.spr.wrk.ru/htdocs/vanilla/conf/config.php';
		// $Configuration

		$vanilla->CookieName = $Configuration['Garden']['Cookie']['Name'];
		$vanilla->CookiePath = $Configuration['Garden']['Cookie']['Path'];
		$vanilla->CookieDomain = $Configuration['Garden']['Cookie']['Domain'];
		$vanilla->CookieHashMethod = $Configuration['Garden']['Cookie']['HashMethod'];
		$vanilla->CookieSalt = $Configuration['Garden']['Cookie']['Salt'];
		$vanilla->VolatileMarker = $vanilla->CookieName.'-Volatile';
		$vanilla->PersistExpiry = defval($Configuration['Garden']['Cookie'], 'PersistExpiry', '30 days');
		$vanilla->SessionExpiry = defval($Configuration['Garden']['Cookie'], 'SessionExpiry', '2 days');

		return $vanilla;
	}

	public function getIdentity()
	{
		if(!is_null($this->UserID))
			return $this->UserID;

		if(!$this->_checkCookie($this->CookieName))
		{
			$this->_clearIdentity();
			return 0;
		}

		list($UserID) = self::getCookiePayload($this->CookieName);

		if (!is_numeric($UserID) || $UserID < -2)	// allow for handshake special id
			return 0;

		return $this->UserID = $UserID;
	}

	/**
	 * @param $CookieName
	 * @return bool
	 */
	protected function _checkCookie($CookieName)
	{
		$CookieStatus = self::checkCookie($CookieName, $this->CookieHashMethod, $this->CookieSalt);
		if($CookieStatus === false)
			$this->_deleteCookie($CookieName);

		return $CookieStatus;
	}

	/**
	 * Validate security of our cookie.
	 *
	 * @param $CookieName
	 * @param null $CookieHashMethod
	 * @param null $CookieSalt
	 * @return bool
	 */
	public static function checkCookie($CookieName, $CookieHashMethod = null, $CookieSalt = null)
	{
		if(empty($_COOKIE[$CookieName]))
			return false;

		if(is_null($CookieHashMethod))
			$CookieHashMethod = Gdn::config('Garden.Cookie.HashMethod');

		if(is_null($CookieSalt))
			$CookieSalt = Gdn::config('Garden.Cookie.Salt');

		$CookieData = explode('|', $_COOKIE[$CookieName]);

		if(count($CookieData) < 5)
		{
			self::deleteCookie($CookieName);
			return false;
		}

		list($HashKey, $CookieHash) = $CookieData;

		list($UserID, $Expiration) = self::getCookiePayload($CookieName);

		if($Expiration < time())
		{
			self::deleteCookie($CookieName);
			return false;
		}

		$KeyHash = hash_hmac($CookieHashMethod, $HashKey, $CookieSalt);
		$CheckHash = hash_hmac($CookieHashMethod, $HashKey, $KeyHash);

		if(!hash_equals($CheckHash, $CookieHash))
		{
			self::deleteCookie($CookieName);
			return false;
		}

		return true;
	}

	/**
	 * Destroys the user's session cookie - essentially de-authenticating them.
	 */
	protected function _clearIdentity()
	{
		// Destroy the cookie.
		$this->UserID = 0;
		$this->_deleteCookie($this->CookieName);
	}

	/**
	 * Remove a cookie.
	 *
	 * @param $CookieName
	 * @param null $Path
	 * @param null $Domain
	 */
	protected function _deleteCookie($CookieName)
	{
		unset($_COOKIE[$CookieName]);
		self::deleteCookie($CookieName, $this->CookiePath, $this->CookieDomain);
	}

    /**
     * Remove a cookie.
     *
     * @param $CookieName
     * @param null $Path
     * @param null $Domain
     */
    public static function deleteCookie($CookieName, $Path = null, $Domain = null)
    {
        if(is_null($Path))
            $Path = '/';

        if(is_null($Domain))
            $Domain = $_SERVER['HTTP_HOST'];

        $CurrentHost = $_SERVER['HTTP_HOST'];

//        if(!StringEndsWith($CurrentHost, trim($Domain, '.')))
  //          $Domain = '';

        $Expiry = time() - 60 * 60;
        safeCookie($CookieName, "", $Expiry, $Path, $Domain);
        $_COOKIE[$CookieName] = null;
    }

	/**
	 * Get the pieces that make up our cookie data.
	 *
	 * @param string $CookieName
	 * @return array
	 */
	public static function getCookiePayload($CookieName) {
		$Payload = explode('|', $_COOKIE[$CookieName]);
		$Key = explode('-', $Payload[0]);
		$Expiration = array_pop($Key);
		$UserID = implode('-', $Key);
		$Payload = array_slice($Payload, 4);
		$Payload = array_merge(array($UserID, $Expiration), $Payload);

		return $Payload;
	}
}

if (!function_exists('safeCookie')) {
    /**
     * Context-aware call to setcookie().
     *
     * This method is context-aware and will avoid setting cookies if the request
     * context is not HTTP.
     *
     * @param string $name
     * @param string $value
     * @param integer $expire
     * @param string $path
     * @param string $domain
     * @param boolean $secure
     * @param boolean $httponly
     */
    function safeCookie($name, $value = null, $expire = 0, $path = null, $domain = null, $secure = false, $httponly = false) {
        static $context = null;
        if (is_null($context)) {
            $context = requestContext();
        }

        if ($context == 'http') {
            setcookie($name, $value, $expire, $path, $domain, $secure, $httponly);
        }
    }
}

if (!function_exists('requestContext')) {
    /**
     * Get request context.
     *
     * This method determines if current request is operating within HTTP, or
     * elsewhere such as the command line.
     *
     * @staticvar string $context
     * @return string
     */
    function requestContext() {
        static $context = null;
        if (is_null($context)) {
            $context = NULL; // c('Garden.RequestContext', null);
            if (is_null($context)) {
                $protocol = defval($_SERVER, 'SERVER_PROTOCOL');
                if (preg_match('`^HTTP/`', $protocol)) {
                    $context = 'http';
                } else {
                    $context = $protocol;
                }
            }
            if (is_null($context)) {
                $context = 'unknown';
            }
        }
        return $context;
    }
}
