<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require 'vendor/autoload.php';
require 'constants.php';

// Credenciales
MercadoPago\SDK::setAccessToken('APP_USR-6317427424180639-042414-47e969706991d3a442922b0702a0da44-469485398');
MercadoPago\SDK::setIntegratorId("dev_24c65fb163bf11ea96500242ac130004");

// Producto
$item = new MercadoPago\Item();
$item->id = 1234;
$item->title = $_POST['title'];
$item->description = "Dispositivo móvil de Tienda e-commerce";
$item->category_id = "celulares";
$item->picture_url = str_replace(ROOT_PATH, HOST, realpath($_POST['img']));
$item->quantity = $_POST['unit'];
$item->unit_price = $_POST['price'];
$item->currency_id = "ARS";

//Comprador
$payer = new MercadoPago\Payer();
$payer->name = "Beto";
$payer->surname = "Velez";
$payer->email = "test_user_63274575@testuser.com";
$payer->phone = array(
	"area_code" => "11",
	"number" => "22223333"
);
$payer->identification = array(
	"type" => "DNI",
	"number" => "12345678"
);
$payer->address = array(
	"street_name" => "False",
	"street_number" => 123,
	"zip_code" => "1111"
);

//Boton de Pago
$preference = new MercadoPago\Preference();

//Agrego Producto
$preference->items = array($item);
//Agrego Datos del Comprador
$preference->payer = $payer;

#Inicio: Configuracion del Boton de Pago
$preference->external_reference = "jasu.servatis@gmail.com";

$preference->payment_methods = array(
	"excluded_payment_methods" => array(
		array("id" => "amex")
	),
	"excluded_payment_types" => array(
		array("id" => "atm")
	),
	"installments" => 6
);

$preference->back_urls = array(
	"success" => HOST.URI."confirmation.php?status=k",
	"failure" => HOST.URI."confirmation.php?status=f",
	"pending" => HOST.URI."confirmation.php?status=p"
);
$preference->auto_return = "approved";

$preference->notification_url = HOST.URI."callback/";
#Fin: Configuracion del Boton de Pago

//Creo el Boton de Pago
$preference->save();

//Mando el link
echo $preference->init_point;
?>