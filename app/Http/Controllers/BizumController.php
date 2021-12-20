<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use League\Flysystem\Exception;
use Ssheduardo\Redsys\Facades\Redsys;

class BizumController extends Controller
{
    public function index()
    {
        try{
            $key = config('redsys.key');

            Redsys::setAmount(9);
            Redsys::setOrder(time());
            Redsys::setMerchantcode('999008881'); //Reemplazar por el código que proporciona el banco
            Redsys::setCurrency('978');
            Redsys::setTransactiontype('0');
            Redsys::setTerminal('001');
            Redsys::setMethod('z'); //Solo pago con tarjeta, no mostramos iupay
            Redsys::setNotification(config('redsys.url_notification')); //Url de notificacion
            Redsys::setUrlOk(config('redsys.url_ok')); //Url OK
            Redsys::setUrlKo(config('redsys.url_ko')); //Url KO
            Redsys::setVersion('HMAC_SHA256_V1');
            Redsys::setTradeName('Tienda S.L');
            Redsys::setTitular('Pedro Risco');
            Redsys::setProductDescription('Compras varias');
            Redsys::setEnviroment('test'); //Entorno test
            Redsys::setAttributesSubmit('btn_submit', 'btn_id', 'Pagar con Bizum', 'font-size:14px; color:#ff00c1');
            $signature = Redsys::generateMerchantSignature($key);
            Redsys::setMerchantSignature($signature);

            $form = Redsys::createForm();
        }
        catch(Exception $e){
            echo $e->getMessage();
        }
        return $form;
    }
}
