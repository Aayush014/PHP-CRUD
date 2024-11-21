<?php
include_once 'Config/config.php';

$config = new Config();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = mysqli_query($config->getConnection(), "SELECT * FROM authentication WHERE id=$id");
    $row = mysqli_fetch_assoc($result);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $config->updateDatabase($id, $email, $password);
    header("Location: show_data.php"); // Redirect back to the data page
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Record</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f8f9fa; /* Subtle background color */
        }
        .form-container {
            max-width: 500px;
            margin: 50px auto;
            padding: 30px;
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .form-title {
            font-size: 1.8rem;
            font-weight: bold;
            color: #0d6efd;
            margin-bottom: 20px;
            text-align: center;
        }
        .btn-primary {
            background-color: #0d6efd;
            border-color: #0d6efd;
        }
        .btn-primary:hover {
            background-color: #0b5ed7;
            border-color: #0a58ca;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h3 class="form-title">Update Record</h3>
            <form method="POST">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <div class="mb-4">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" 
                           value="<?php echo $row['email']; ?>" required 
                           placeholder="Enter your email">
                </div>
                <div class="mb-4">
                    <label for="password" class="form-label">Password</label>
                    <input type="text" class="form-control" id="password" name="password" 
                           value="<?php echo $row['password']; ?>" required 
                           placeholder="Enter your password">
                </div>
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary w-48">Update</button>
                    <a href="show_data.php" class="btn btn-secondary w-48">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>

