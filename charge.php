<?php

//pass Stripe: "ChJ4fEL^:'YDu5

require_once('vendor/autoload.php');
require_once('config/db.php');
require_once('lib/pdo_db.php');
require_once('models/Customer.php');
require_once('models/Transaction.php');

//Server key
\Stripe\Stripe::setApiKey('sk_test_51Q2aif2L80WeTT2njc3ioNPvRCBr6HopwDKrrgWciP1bbfBisgqfNv1QOHFiv2YwZIHDQfcnyu68m7fOdbOuMadn00yYFV1Tkz');



// Filter and sanitize data
$first_name = htmlspecialchars(trim($_POST["first_name"]), ENT_QUOTES, 'UTF-8');
$last_name = htmlspecialchars(trim($_POST["last_name"]), ENT_QUOTES, 'UTF-8');
$email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
$token = htmlspecialchars(trim($_POST["stripeToken"]), ENT_QUOTES, 'UTF-8');

//Create customer in Stripe.
$customer = \Stripe\Customer::create(array(
    "email" => $email,
    "source" => $token
));

$charge = \Stripe\Charge::create(array(
    "amount" => 5000,
    "currency" => "eur",
    "description" => "App",
    "customer" => $customer->id

));

// print_r($charge);
// Output the token
// echo $token;

//Customer Data
$customerData = [
    'id' => $charge->customer,
    'first_name' => $first_name,
    'last_name' => $last_name,
    'email' => $email
];

//Instantiate Customer
$customer = new Customer();

//Ad customer to db
$customer->addCustomer($customerData);


//Transaction Data
$transactionData = [
    'id' => $charge->id,
    'customer_id' => $charge->customer,
    'product' => $charge->description,
    'amount' => $charge->amount,
    'currency' => $charge->currency,
    'status' => $charge->status,
];

//Instantiate Transaction
$transaction = new Transaction();

//Ad Transaction to db
$transaction->addTransaction($transactionData);


//Redirect to success
header('Location:success.php?tid=' . $charge->id . '&product=' . $charge->description);
