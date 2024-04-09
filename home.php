<?php
session_start();

if (!isset($_SESSION['user_email'])) {
    header('Location: login.php');
    exit();
}

require('koneksi.php');
require('query.php');

$user_fullname = isset($_SESSION['user_fullname']) ? $_SESSION['user_fullname'] : "";

$obj = new crud;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <h1>Selamat Datang <?php echo $user_fullname; ?></h1>
    <table border='1'>
        <tr>
            <td>No</td>
            <td>Email</td>
            <td>Nama</td>
            <td></td>
        </tr>
        <?php
            $data = $obj->lihatData();
            $no = 1;
            if ($data->rowCount() > 0) {
                while ($row = $data->fetch(PDO::FETCH_ASSOC)) { ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $row['user_email']; ?></td>
                        <td><?php echo $row['user_fullname']; ?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>
                            <a href="hapus.php?id=<?php echo $row['id']; ?>">Hapus</a>
                        </td>
                    </tr>
                    <?php
                    $no++;
                }
            }
        ?>
    </table>
    <form action="logout.php" method="POST">
        <button type="submit" name="logout">Logout</button>
    </form>
</body>
</html>
