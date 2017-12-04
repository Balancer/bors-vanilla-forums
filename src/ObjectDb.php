<?php

namespace B2\Vanilla;

class ObjectDb extends \bors_object_db
{
	function storage_engine() { return \bors_storage_mysql::class; }

	function db_name() { return \B2\Cfg::get('vanilla.db'); }
}
