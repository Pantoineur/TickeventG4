<?php
/**
 * Created by PhpStorm.
 * User: orencohen
 * Date: 09/12/2018
 * Time: 18:33
 */

        require_once "stripe-php-master/init.php";
        // require_once "ContentConcert.php";

        $stripeDetails= array(
            "secretKey" => "sk_test_kpJ3IIVy2aVqV7DJP0nBeLaq",
            "publishableKey" => "pk_test_oFfPMs68jPZ8tl67VVnx29Kt"
);
// Set your secret key: remember to change this to your live secret key in production
// See your keys here: https://dashboard.stripe.com/account/apikeys
\Stripe\Stripe::setApiKey($stripeDetails['secretKey']);
