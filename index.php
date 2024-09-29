<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="d-flex flex-column min-vh-100">

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container d-flex justify-content-between">
            <!-- Logo on the left -->
            <a class="navbar-brand" href="#">
                <img src="img/logo.png" alt="Logo" class="img-fluid d-inline-block align-top" style="max-height: 40px;">
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Centered Navigation Tabs -->
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-secondary" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-secondary" href="#">Catalogue</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-secondary" href="#">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container flex-grow-1 d-flex justify-content-center align-items-center">
        <div class="row centered">
            <!-- First Card -->
            <div class="col-md-6 mb-4">
                <h5 class="card-title text-white font-weight-bold">Order Summary</h5>
                <div class="card h-100 shadow-sm custom-color3 border border-dark">
                    <div class="card-body d-flex">
                        <div class="col-4 pr-0">
                            <img src="img/glasses.jpg" alt="Glasses" class="img-fluid rounded mx-auto d-block">
                        </div>
                        <div class="col-8 pl-2 d-flex flex-column justify-content-start">
                            <p class="card-text text-white font-weight-bold mb-0">Laureen glasses</p>
                            <p class="card-text text-light">Estimated delivery by <strong>25 September</strong></p>

                            <div class="d-flex justify-content-between align-items-center">
                                <p class="card-text text-white font-weight-bold mb-0">$120.00</p>
                                <div class="input-group" style="width: 80px;">
                                    <div class="input-group-prepend custom-height">
                                        <button class="btn btn-outline-secondary btn-sm my-auto" type="button" id="button-addon1">-</button>
                                    </div>
                                    <input type="text" class="form-control text-center" placeholder="1" aria-label="Quantity" aria-describedby="button-addon1" style="max-width: 60px;height:30px">
                                    <div class="input-group-append custom-height">
                                        <button class="btn btn-outline-secondary btn-sm my-auto" type="button" id="button-addon2">+</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="text-white">
                    </div>
                </div>
            </div>

            <!-- Second Card -->
            <div class="col-md-6 mb-4">
                <h5 class="card-title text-white font-weight-bold">Payment Details</h5>
                <div class="card h-100 shadow-sm custom-color3 border border-dark">
                    <div class="card-body">
                        <p class="card-text">This is the content of the second card. It mirrors the first card in style and layout.</p>
                        <form action="./charge.php" method="post" id="payment-form">
                            <div class="form-row">
                                <input type="text" name="first_name" class="form-control mb-3" placeholder="First Name">
                                <input type="text" name="last_name" class="form-control mb-3" placeholder="Last Name">
                                <input type="email" name="email" class="form-control mb-3" placeholder="Email Address">
                                <div id="card-element" class="form-control">
                                    <!-- a Stripe Element will be inserted here. -->
                                </div>

                                <!-- Used to display form errors -->
                                <div id="card-errors" role="alert"></div>
                            </div>

                            <button class="btn mt-3">Submit Payment &nbsp;<i class="fa-solid fa-arrow-right"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script> -->
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
    <script src="https://js.stripe.com/v3/"></script>
    <script src="./js/charge.js"></script>
</body>

</html>