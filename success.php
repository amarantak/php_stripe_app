<?php
// Check if 'tid' and 'product' parameters are present in the URL
if (!empty($_GET['tid']) && !empty($_GET['product'])) {
    // Sanitize the $_GET array
    $sanitized_get = [];
    $sanitized_get['tid'] = htmlspecialchars(trim($_GET['tid']), ENT_QUOTES, 'UTF-8'); // Sanitize tid
    $sanitized_get['product'] = htmlspecialchars(trim($_GET['product']), ENT_QUOTES, 'UTF-8'); // Sanitize product

    // Assign sanitized values to variables
    $tid = $sanitized_get['tid'];
    $product = $sanitized_get['product'];
} else {
    // Redirect to index.php if parameters are not present
    header('Location: index.php');
    exit(); // Always use exit after a header redirect
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Thank you!</title>
</head>

<body>
    <div class="container mt-4">
        <h2>Thank you for your purchasing <?php echo $product; ?></h2>
        <hr>
        <p>Your transaction ID is <?php echo $tid; ?></p>
        <p>Check your email for some info</p>
        <p><a href="index.php" class="btn btn-light mt-2">Go Back </a></p>
    </div>
</body>

</html>