<?php
  require __DIR__ .  '/vendor/autoload.php';

  MercadoPago\SDK::setAccessToken("APP_USR-8208253118659647-112521-dd670f3fd6aa9147df51117701a2082e-677408439");
  $payment = MercadoPago\Payment::find_by_id($_GET['id']);
  echo '<pre>';
  var_dump($payment);
  var_dump(json_encode($payment));
  echo '</pre>';
?>