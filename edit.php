<?php
require ('koneksi.php');
require ('query.php');

// Mengecek apakah parameter id telah diterima dari URL
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $obj = new crud;

    // Memanggil method getDataById() untuk mendapatkan data pengguna berdasarkan id
    $userData = $obj->getDataById($id);

    if($userData) {
        // Jika data pengguna ditemukan, tampilkan formulir untuk mengedit
        ?>
        <html>
        <head>
            <title>Edit User</title>
        </head>
        <body>
            <h1>Edit User</h1>
            <form action="proses_edit.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $userData['id']; ?>">
                <p>Email: <input type="text" name="txt_email" value="<?php echo $userData['user_email']; ?>" required></p>
                <p>Password: <input type="password" name="txt_pass" required></p>
                <p>Name: <input type="text" name="txt_name" value="<?php echo $userData['user_fullname']; ?>" required></p>
                <button type="submit" name="submit">Update</button>
            </form>
        </body>
        </html>
        <?php
    } else {
        // Jika data pengguna tidak ditemukan, kembali ke halaman home.php
        header('Location: home.php');
    }
} else {
    // Jika parameter id tidak ada, kembali ke halaman home.php
    header('Location: home.php');
}
?>
