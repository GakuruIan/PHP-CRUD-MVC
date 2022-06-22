<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="Bootstrap/css/bootstrap.min.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="/CSS/index.css">
    <title>PRODUCT CRUD</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a href="\products" class="navbar-brand">Product</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                <li>
                    <a href="/products" class="nav-link">Product</a>
                </li>
                <li>
                    <a href="#" class="nav-link">About</a>
                </li>
                <li>
                    <a href="#" class="nav-link">Contact us</a>
                </li>
                <li>
                    <a href="#" class="nav-link">Service</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container content w-75 py-5">
<?php echo $content; ?>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<!-- <script src="Bootstrap/js/bootstrap.min.js"></script> -->
</body>
</html>