<?php
  require __DIR__ .  '/vendor/autoload.php';

  MercadoPago\SDK::setAccessToken("APP_USR-8208253118659647-112521-dd670f3fd6aa9147df51117701a2082e-677408439");
  MercadoPago\SDK::setIntegratorId("dev_2e4ad5dd362f11eb809d0242ac130004");
  $preference = new MercadoPago\Preference();
  $payer = new MercadoPago\Payer();
  $payer->name = "Lalo";
  $payer->surname = "Landa";
  $payer->email = "";
  $payer->phone = array(
    "area_code" => "52",
    "number" => "5549737300"
  );
  $payer->identification = array(
    "type" => "DNI",
    "number" => "22334445"
  );
  
  $payer->address = array(
    "street_name" => "Insurgentes Sur",
    "street_number" => 1602,
    "zip_code" => "03940"
  );

  $item = new MercadoPago\Item();
  $item->id = 1234; 
  $item->title = $_POST['name'];
  $item->description = "Dispositivo movil de Tienda E-commerce";
  $item->picture_url = $_POST['url'];
  $item->quantity = 1;
  $item->unit_price = $_POST['price'];

  $preference->payment_methods =array(
    "excluded_payment_methods" => array(
      array("id" => "diners")
    ),
    "excluded_payment_types" => array(
      array("id" => "atm")
    ),
    "installments" => 6
  );

  $preference->items = array($item);
  $preference->payer = $payer;
  $preference->back_urls = array(
    "success" => "https://mpcheckout.herokuapp.com/success.php",
    "failure" => "https://mpcheckout.herokuapp.com/failure.php",
    "pending" => "https://mpcheckout.herokuapp.com/pending.php"
  );

  $preference->auto_return = "approved";
  $preference->external_reference = "sdabrf@gmail.com";
  $preference->notification_url = "https://mpcheckout.herokuapp.com/webhook.php";
  $preference->save();

  // $res->mercadoPagoUrl = $preference->init_point;
?>


<html>
  <head>
    <title>Pagar</title>
    <script
      src="https://www.mercadopago.com.pe/integrations/v1/web-payment-checkout.js"
      data-preference-id="<?php echo $preference->id; ?>">
    </script>
  </head>
  <body>
    <a href="<?php echo $preference->init_point; ?>">Pagar la compra</a>
  </body>
</html>