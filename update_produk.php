<?php
require('koneksi.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($conn)) {
        $id_produk = isset($_POST['id_produk']) ? (int)$_POST['id_produk'] : 0;
        $nama_produk = isset($_POST['nama_produk']) ? mysqli_real_escape_string($conn, $_POST['nama_produk']) : '';
        $jenis_produk = isset($_POST['jenis_produk']) ? mysqli_real_escape_string($conn, $_POST['jenis_produk']) : '';
        $harga = isset($_POST['harga']) ? (int)$_POST['harga'] : 0;
        $stok = isset($_POST['stok']) ? (int)$_POST['stok'] : 0;

        // Validasi
        if ($id_produk > 0 && !empty($nama_produk) && !empty($jenis_produk) && $harga > 0 && $stok >= 0) {

            $sql = "UPDATE produk SET nama_produk = '$nama_produk', jenis_produk = '$jenis_produk', harga = $harga, stok = $stok 
                    WHERE id_produk = $id_produk";
            mysqli_query($conn, $sql);
            header('Location: index.php');
            exit();
        }
    }
}
