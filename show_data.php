<?php
include_once 'Config/config.php';

$config = new Config();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) {
    $id = $_POST['id'];
    $config->deleteDatabase($id);
    header("Location: show_data.php"); // Refresh the page after deletion
    exit();
}

$data = $config->selectDatabase();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h3 class="text-center text-primary">Database Records</h3>
        <table class="table table-bordered table-striped mt-4 table-hover">
            <thead class="table-primary text-center">
                <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($data)): ?>
                    <tr>
                        <td class="text-center"><?php echo $row['id']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['password']; ?></td>
                        <td class="text-center">
                            <form method="POST" action="" style="display: inline-block;">
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                <button type="submit" name="delete" class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash me-1"></i>
                                </button>
                            </form>
                            <a href="update.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm">
                                <i class="bi bi-pen me-1"></i>
                            </a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
