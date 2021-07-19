<?php include('config.php'); ?>

<center>
    <font size="8">Tambah Barang</font>
</center>
<hr>
<?php
if (isset($_POST['submit'])) {
    $Kode_Barang    = $_POST['Kode_Barang'];
    $Nama_Barang    = $_POST['Nama_Barang'];
    $Jumlah_Barang  = $_POST['Jumlah_Barang'];
    $Harga_Barang   = $POST['Harga_Barang'];

    $cek = mysqli_query($koneksi, "SELECT * FROM tabel_barang where Kode_Barang='$Kode_Barang'") or die(mysqli_error($koneksi));

    if (mysqli_num_rows($cek) == 0) {
        $sql = mysqli_query($koneksi, "INSERT INTO tabel_barang (Kode_Barang, Nama_Barang, Jumlah_Barang, Harga_Barang) values('$Kode_Barang', '$Nama_Barang', '$Jumlah_Barang', '$Harga_Barang' )") or die(mysqli_error($koneksi));

        if ($sql) {
            echo '<script>alert("Berhasil menambahkan data."); document.location="index.php?page=tampil_mhs";</script>';
        } else {
            echo '<div class="alert alert-warning">Gagal melakukan proses penambahan data.</div>';
        }
    } else {
        echo '<div class="alert alert-warning">Gagal, Kode Barang.</div>';
    }
}
?>

<form action="index.php?page=tambah_mhs" method="post">
    <div class="item form-group">
        <label class="col-form-label col-md-3 lebal-align">Kode Barang</label>
        <div class="col-md-6 col-sm-6">
            <input type="text" name="Kode_Barang" class="form-control" size="4" required>
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-md-3 col-sm-3 label-align">Nama Barang</label>
        <div class="col-md-6 col-sm-6">
            <input type="text" name="Nama_Barang" class="form-control" required>
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-md-3 col-sm-3 label-align">Jumlah Barang</label>
        <div class="col-md-6 col-sm-6">
            <input type="text" name="Jumlah_Barang" class="form-control" required>
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-md-3 col-sm-3 label-align">Harga Barang</label>
        <div class="col-md-6 col-sm-6">
            <input type="text" name="Harga_Barang" class="form-control" required>
        </div>
    </div>
    <div class="item form-group">
        <div class="col-md-6 col-sm-6 offset-md-3">
            <input type="submit" name="submit" class="btn btn-primary" value="simpan">
            <a href="index.php?page=tampil_mhs" class="btn btn-danger">Kembali</a>
        </div>
    </div>

</form>
</div>