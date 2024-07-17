<?php
session_start();
// Koneksi
$conn = mysqli_connect("localhost", "root", "", "kasir");

// Ini Fungsi Login 
if (isset($_POST['username']) && isset($_POST['password'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username='$username' and password='$password'");
    $hitung = mysqli_num_rows($result);

    if($hitung > 0){
        $_SESSION['login'] = true;
        header("location: index.php");
    
    } else{
        echo '
        <script>
        alert("Username atau Password Salah");
        window.location.href="login.php";
        </script>
        ';
    }
}

// Ini fungsi tambah barang
if(isset($_POST['tambahbarang'])){
    $namaproduk = $_POST['nama_produk'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    $insert = mysqli_query($conn, "INSERT INTO produk (nama_produk, deskripsi, harga, stok) VALUES ('$namaproduk', '$deskripsi', '$harga', '$stok')");

    if($insert){
 
        echo '
        <script>
        alert("Berhasil Menambahkan Barang");
        window.location.href = "stok.php";
        </script>
        ';
        exit();
        
    } else{

        echo '
        <script>
        alert("Gagal  Menambahkan Barang");
        window.location.href = "stok.php";
        </script>
        ';
        ;
    }
};
// fungsi menambah pelanggan
if(isset($_POST['tambahpelanggan'])){
    $namapelanggan = $_POST['namapelanggan'];
    $notelp = $_POST['notelp'];
    $alamat = $_POST['alamat'];
 

    $insert = mysqli_query($conn, "INSERT INTO pelanggan (namapelanggan, notelp, alamat) VALUES ('$namapelanggan', '$notelp', '$alamat')");

    if($insert){
        echo '
        <script>
        alert("Berhasil Menambahkan Pelanggan");
        window.location.href = "pelanggan.php";
        </script>
        ';
        exit();
    } else {
        echo '
        <script>
        alert("Gagal Menambahkan Pelanggan");
        window.location.href = "pelanggan.php";
        </script>
        ';
    }
}
// fungsi menambah pesanan
if(isset($_POST['tambahpesanan'])){
    $idpelanggan = $_POST['idpelanggan'];

    $insert = mysqli_query($conn, "INSERT INTO pesanan (idpelanggan) VALUES ('$idpelanggan')");

    if($insert){
        echo '
        <script>
        alert("Berhasil Menambahkan Pesanan");
        window.location.href = "index.php";
        </script>
        ';
        exit();
    } else {
        echo '
        <script>
        alert("Gagal Menambahkan Pesanan");
        window.location.href = "index.php";
        </script>
        ';
    }
}

if(isset($_POST['addproduk'])){
    $id_produk = $_POST['idproduk'];
    $idp = $_POST['idp'];
    $qty = $_POST['qty']; //jumlah

    $insert = mysqli_query($conn, "INSERT INTO detailpesanan (id_pesanan, id_produk, qty) VALUES ('$idp', '$id_produk', '$qty')");

    if($insert){
        echo '
        <script>
        alert("Berhasil Menambahkan Pesanan");
        window.location.href = "view.php?idp='.$idp.'";
        </script>
        ';
        exit();
    } else {
        echo '
        <script>
        alert("Gagal Menambahkan Pesanan");
        window.location.href = "view.php?idp='.$idp.'";
        </script>
        ';
    }
}

?>
