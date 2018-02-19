<?php
namespace App\Helpers;
use WebToPay;
class PayseraHelper {
  public function payseraPay($orderId, $totalAmount) {
    try {

        $request = WebToPay::redirectToPayment(array(
            'projectid'     => 111936,
            'sign_password' => '07bac5d43b1c6a2583ff7ca8f6ac9715',
            'orderid'       => $orderId,
            'amount'        => $totalAmount * 100,
            'currency'      => 'EUR',
            'country'       => 'LT',
            'accepturl'     => url('/payment_success'),
            'cancelurl'     => url('/payment_cancel'),
            'callbackurl'   => url('/callback.php'),
            'test'          => 1,
        ));

    } catch (WebToPayException $e) {
        // handle exception
    }
  }

  public function updatePaymentStatus() {
    try {
    $response = WebToPay::checkResponse($_GET, array(
      'projectid'     => 111936,
      'sign_password' => '07bac5d43b1c6a2583ff7ca8f6ac9715',
    ));

    $orderId = $response['orderid'];
    $amount = $response['amount'];
    $currency = $response['currency'];
    //@todo: patikrinti, ar užsakymas su $orderId dar nepatvirtintas (callback gali būti pakartotas kelis kartus)
    //@todo: patikrinti, ar užsakymo suma ir valiuta atitinka $amount ir $currency
    //@todo: patvirtinti užsakymą

    } catch (Exception $e) {
        echo get_class($e) . ': ' . $e->getMessage();
    }

    return $orderId;

  }
}
