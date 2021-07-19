<?php
//include file config.php
include('config.php');

//jika benar mendapatkan GET id dari URL
if (isset($_GET['Kode_Barang'])) {
    //membuat variabel $id yang menyimpan niali dari  $_GET['id']
    $Kode_Barang = $_GET['Kode_Barang'];

    //melakukan query ke database, dengan cara SELECT data yang memiliki id yang sama dengan variabel $id
    $cek = mysqli_query($koneksi, "SELECT * FROM tabel_barang where Kode_Barang='$Kode_Barang'") or die(mysqli_error($koneksi));

    //jika query memastikan nilai > 0 maka eksekusi script di bawah
    if (mysqli_num_rows($cek) > 0) {
        //query ke database DELETE untuk menhghapus data dengan kondisi id=$id
        $del = mysqli_query($koneksi, "DELETE FROM tabel_barang where Kode_Barang = '$Kode_Barang'") or die(mysqli_error($koneksi));
        if ($del) {
            echo '<script>alert("Berhasil menghapus data"); document.location="index.php?page=tampil_mhs";</script>';
        } else {
            echo '<script>alert("Gagal menghapus data."); document.location="index.php?page=tampil_mhs";</script>';
        }
    } else {
        echo '<script>alert("Kode tidak di temukan di database"); document.location="index.php?page=tampil_mhs";</script>';
    }
} else {
    echo '<script>alert("Kode tidak di temukan di database"); document.location="index.php?page=tampil_mhs";</script>';
}
