<?php

namespace App\Models\payment_gateway;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB, Session, Stripe;

//for stripe
use App\Http\Requests;
use Illuminate\Http\Request;

class StripePay extends Model
{
    use HasFactory;

    public static function payment_status($identifier, $transaction_keys = []){
        $payment_gateway = DB::table('payment_gateways')->where('identifier', $identifier)->first();
        $keys = json_decode($payment_gateway->keys, true);

        if($payment_gateway->test_mode == 1):
            $stripeSecretKey = $keys['secret_key'];
        else:
            $stripeSecretKey = $keys['secret_live_key'];
        endif;


        // Check whether stripe checkout session is not empty
        $session_id = $transaction_keys['session_id'];
        if($session_id != ""){


          // Set API key
          \Stripe\Stripe::setApiKey($stripeSecretKey);

          // Fetch the Checkout Session to display the JSON result on the success page
          try {
              $checkout_session = \Stripe\Checkout\Session::retrieve($session_id);
          }catch(Exception $e) {
              $api_error = $e->getMessage();
          }

          if(empty($api_error) && $checkout_session){
              // Retrieve the details of a PaymentIntent
              try {
                  $intent = \Stripe\PaymentIntent::retrieve($checkout_session->payment_intent);
              } catch (\Stripe\Exception\ApiErrorException $e) {
                  $api_error = $e->getMessage();
              }

              // // Retrieves the details of customer
              // try {
              //     // Create the PaymentIntent
              //     $customer = \Stripe\Customer::retrieve($checkout_session->customer);
              // } catch (\Stripe\Exception\ApiErrorException $e) {
              //     $api_error = $e->getMessage();
              // }

              //if(empty($api_error) && $intent){
              if($intent){
                  // Check whether the charge is successful
                  if($intent->status == 'succeeded'){
                      return true;
                  }else{
                      return false;
                  }
              }else{
                  //return get_phrase("Unable_to_fetch_the_transaction_details"). ' ' .$api_error;
                  return false;
              }

          }else{
              //return get_phrase("Transaction_has_been_failed").' '.$api_error;
              return false;
          }
        }else{
          //return get_phrase("Invalid_Request");
          return false;
        }
        return false;
    }

    public static function payment_create($identifier){
        // require_once '../vendor/autoload.php';
        // require_once '../secrets.php';

        $payment_gateway = DB::table('payment_gateways')->where('identifier', $identifier)->first();
        $payment_details = session('payment_details');
        $keys = json_decode($payment_gateway->keys, true);


        $products_name = '';
        foreach($payment_details['items'] as $key => $value):
            if($key == 0){
              $products_name .= $value['title'];
            }else{
              $products_name .= ', '.$value['title'];
            }
        endforeach;

        if($payment_gateway->test_mode == 1):
            $stripeSecretKey = $keys['secret_key'];
        else:
            $stripeSecretKey = $keys['secret_live_key'];
        endif;

        \Stripe\Stripe::setApiKey($stripeSecretKey);
        header('Content-Type: application/json');

        $YOUR_DOMAIN = 'http://localhost:4242';

        $checkout_session = \Stripe\Checkout\Session::create([
            'line_items' => [
                [
                    #Provide the exact Price ID (e.g. pr_1234) of the product you want to sell
                    #'price' => '{{PRICE_ID}}', This structure for pre-created stripe payment or product
                    # OR
                    'price_data' => [
                        'product_data' => [
                            'name' => get_phrase('Purchasing').' '.$products_name
                        ],
                        'unit_amount' => round($payment_details['payable_amount']*100, 2),
                        'currency' => $payment_gateway->currency,
                    ],
                    'quantity' => 1,
                ]
            ],
            'mode' => 'payment', //Checkout has three modes: payment, subscription, or setup. Use payment mode for one-time purchases. Learn more about subscription and setup modes in the docs.
            'success_url' => $payment_details['success_url'].'/'.$identifier.'?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => $payment_details['cancel_url'],
        ]);

        return $checkout_session->url;
    }


}
