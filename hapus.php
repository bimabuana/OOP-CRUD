<?php
require ('koneksi.php');
require ('query.php');

// Mengecek apakah parameter id telah diterima dari URL
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $obj = new crud;

    // Memanggil method hapusData() untuk menghapus data dengan id tertentu
    if($obj->hapusData($id)) {
        echo '<script>alert("Data berhasil dihapus");</script>';
        echo '<script>window.location.href="home.php";</script>';
    } else {
        echo '<script>alert("Gagal menghapus data");</script>';
        echo '<script>window.location.href="home.php";</script>';
    }
} else {
    // Jika parameter id tidak ada, maka kembali ke halaman home.php
    header('Location: home.php');
}
?>
