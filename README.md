# Vanilla forums for BORS© an Infonesy

Under construction.

```php

$vanilla = new \B2\Vanilla('VANILLA_DB');

$latest_post = $vanilla->find()->post()->order('-create_time')->first();
```
