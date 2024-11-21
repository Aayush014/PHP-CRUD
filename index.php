<?php
include_once 'Config/config.php';

$config = new Config();

$isLoggedIn = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!empty($email) && !empty($password)) {
        $config->insertDatabase($email, $password);
        $isLoggedIn = true;
    } else {
        echo "<script>alert('Please fill in all fields!')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="bg-light">
    <div class="d-flex justify-content-center align-items-center vh-100">
    <div class="col-md-4 p-4 rounded bg-white" 
     style="box-shadow: 0 8px 20px rgba(0.2, 0, 0, 0.2);">
    <h3 class="text-center mb-4 text-primary">Login</h3>
    <form method="POST" action="">
        <div class="mb-3">
            <label for="email" class="form-label">Email Address</label>
            <input type="email" name="email" class="form-control" id="email" required>
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="password" required>
        </div>
        <button type="submit" name="login" class="btn btn-primary w-100">Login</button>
    </form>

    <?php if ($isLoggedIn): ?>
        <div class="mt-3">
            <form action="show_data.php" method="GET">
                <button type="submit" class="btn btn-secondary w-100">Show Data</button>
            </form>
        </div>
    <?php endif; ?>

    <div class="text-center mt-3">
        <small>Don't have an account? <a href="#" class="text-primary text-decoration-none">Sign up</a></small>
    </div>
</div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
