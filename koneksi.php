<?php
class koneksi{
    private $host="localhost";
    private  $user="root";
    private $pass="";
    private $db = "user";
    public $koneksi;

    public function __construct(){
        try {
            // Gunakan DSN PDO yang benar
            $dsn = "mysql:host=$this->host;dbname=$this->db";
            $this->koneksi = new PDO($dsn, $this->user, $this->pass);
            $this->koneksi->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $e) {
            echo "Koneksi gagal: " . $e->getMessage();
        }
    }
}
?>
