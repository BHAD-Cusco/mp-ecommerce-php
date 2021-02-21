<?php
  require __DIR__ .  '/vendor/autoload.php';

  // MercadoPago\SDK::setAccessToken("APP_USR-8208253118659647-112521-dd670f3fd6aa9147df51117701a2082e-677408439");

  file_put_contents('log.txt', file_get_contents('php://input'), FILE_APPEND);

?>