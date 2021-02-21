<?php
  require __DIR__ .  '/vendor/autoload.php';

  // MercadoPago\SDK::setAccessToken("APP_USR-8208253118659647-112521-dd670f3fd6aa9147df51117701a2082e-677408439");

  $email = new \SendGrid\Mail\Mail();
  $email->setFrom("sdabrf@gmail.com", "Dante");
  $email->setSubject("WebHook");
  $email->addTo("sdabrf@gmail.com", "Dante");
  $email->addContent("text/plain", "and easy to do anywhere, even with PHP");
  $email->addContent(
      "text/html", implode("|||", $_POST)
  );
  $sendgrid = new \SendGrid("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");

  $sendgrid->send($email);
?>