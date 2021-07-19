<?php
//koneksi ke dtabase mysql,

$koneksi = mysqli_connect("localhost", "root", "", "andriawan");


//cek jika koneksi ke mysql gagal, maka akan tampil pesan berikut
if (mysqli_connect_errno()) {
    echo "Gagal Menghubungkan ke Mysql: " . mysqli_connect_error();
}
