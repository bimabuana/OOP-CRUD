<?php
class crud extends koneksi{
    public function lihatData()
    {
        $sql    ="SELECT * FROM user_detail";
        $_result= $this->koneksi->prepare($sql);
        $_result->execute();
        return $_result;
    }

    public function insertData($email, $pass, $name){
        try{
            $sql="INSERT INTO user_detail (user_email, user_password, user_fullname, level) VALUES (:email, :pass, :name, 2)";
            $result=$this->koneksi->prepare($sql);
            $result->bindParam(":email", $email);
            $result->bindParam(":pass", $pass);
            $result->bindParam(":name", $name);
            $result->execute();
            return true;
        }
        catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }

    public function hapusData($id) {
        try {
            // Membuat query untuk menghapus data pengguna berdasarkan id
            $sql = "DELETE FROM user_detail WHERE id = :id";
            $stmt = $this->koneksi->prepare($sql);
            $stmt->bindParam(':id', $id);
            
            // Mengembalikan hasil eksekusi query (true jika berhasil, false jika gagal)
            return $stmt->execute();
        } catch (PDOException $e) {
            // Menampilkan pesan kesalahan jika terjadi error
            echo "Error: " . $e->getMessage();
            return false;
        }
    }    

    public function getDataById($id){
        try {
            $sql = "SELECT * FROM user_detail WHERE id = :id";
            $stmt = $this->koneksi->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            
            // Mengembalikan hasil query sebagai array asosiatif
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Menampilkan pesan kesalahan jika terjadi error
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
    
    
}
?>