<?php
require 'constants.php';

switch($_GET['status']){

	case 'k':
		$top_img = '&#128179;';
		$sub_img = '&#10004;&#65039;';
		$body = '<h2>Pago aprovado</h2>

				<div class="pd-util-push-top-large-35">
					<table>
						<tr> <th>Pago n&uacute;mero:</th> <td>'.$_GET['collection_id'].'</td> </tr>
						<tr> <th>Order n&uacute;mero:</th> <td>'.$_GET['external_reference'].'</td> </tr>
					</table>
				</div>';
		break;

	case 'p':
		$top_img = '&#128179;';
		$sub_img = '&#9888;&#65039;';
		$body = '<h2>Pendiente de pago</h2>

				<div class="pd-util-push-top-large-35">
					Su pago est&aacute; pendiente a acreditarse.
				</div>
				<div class="pd-util-push-top-large-35">
					Si pag&oacute; con tarjeta se le avisara cuando se acredite el pago.
					<br>
					Si pag&oacute; con un medio de pago en efectivo el pago se acreditar&aacute; en las pr&oacute;ximas 24hs de haber efectuado la transacci&oacute;n pactada.
				</div>';
		break;

	case 'f':
		$top_img = '&#128179;';
		$sub_img = '&#10060;';
		$body = '<h2>Tu pago ha sido rechazado</h2>

				<div class="pd-util-push-top-large-35">
					Comun&iacute;quese con el emisor de su tarjeta para comprobar que su saldo y autorizaci&oacute;n para compras online o utilice otro medio de pago.
				</div>
				<div class="pd-util-push-top-large-35">
					Dir&iacute;jase al inicio para volver a intentarlo.
				</div>';
		break;

	default:
		$top_img = '&#9888;';
		$sub_img = '';
		$body = '<h2>No pudimos reconocer el estado de tu pago</h2>

				<div class="pd-util-push-top-large-35">
					Espere unos minutos y vuelva a intentarlo.
				</div>
				<div class="pd-util-push-top-large-35">
					Si el problema persiste comun&iacute;quese con <a href="mailto:soporte@tienda.e-commerce.com">soporte@tienda.e-commerce.com</a>
				</div>';
		break;

}

?>

			<style type="text/css">
				.top-img{ font-size: 1000%; position: relative; }
				.sub-img{ font-size: 35%; position: absolute; right: 15%; bottom: 0; }
				@media only screen and (max-width:1023px) and (max-device-width:736px){ .top-img{ font-size: 300%; } }
				a.mercadopago-button, th, td{ padding: 5px; } th{ font-weight: 700; }
			</style>

			<div class="column large-5 small-3">
				<div class="mini-gallery">
					<span class="top-img">
						<?=$top_img?>
						<span class="sub-img">
							<?=$sub_img?>
						</span>
					</span>
				</div>
			</div>
			<div class="as-accessories-filter-tile column large-5 small-9">

				<?=$body?>

				<div class="pd-util-push-top-large-35">
					<a class="mercadopago-button" href="<?=HOST.URI?>">Volver al inicio</a>
				</div>

			</div>