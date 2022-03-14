<?php
require('db_conn.php');

$query= mysqli_query($conn,"SELECT * FROM users");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Management Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="d-flex justify-content-between align-items-center">
        <h1>Daftar Users Registered</h1>
        <div>
            <a href="index.php" class="btn btn-danger my-5">Back</a>
            <a href="createUser.php" class="btn btn-warning my-5">Create User</a>
            <a href="logout.php" class="btn btn-primary my-5">Logout</a>
        </div>
    </div>
    <?php if($_SESSION['message'] ?? false): ?>
            <div class="alert alert-success">
                <?= $_SESSION['message'] ?? '' ; sleep(5); unset($_SESSION['message'])?>
            </div>
        <?php endif; ?>
    <table class="table table-striped">
    <thead>
     <tr>
     <th scope="col">#</th>
     <th scope="col">Name</th>
     <th scope="col">Username</th>
     <th scope="col">Password</th>
     <th scope="col">Action</th>
    </thead>
    <tbody>
    <?php $no = 1 ?>
        <?php while ($row = mysqli_fetch_assoc($query)) { ?>
        <tr>
            <th scope="row"><?= $no++; ?></th>
            <td><?= $row['name']?></td>
            <td><?= $row['user_name']?></td>
            <td><?= $row['password']?></td>
            <td>
                <a href="formedit.php?id=<?= $row['id']?>" class="btn btn-warning">Edit</a>
                <a href="delete.php?id=<?= $row['id']?>" class="btn btn-danger">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
        </table>
        </div>
</body>
</html>