<?php include('config.php'); ?>

<div class="container" style="margin-top:20px">
    <h2>Edit Barang</h2>

    <hr>

    <?php //jika sudah mendapatkan parameter GET id dari url
    if (isset($_GET['Kode_Barang'])) {
        //membuat variabel sid untuk menyimpan  id dari GET id di URL
        $Kode_Barang = $_GET['Kode_Barang'];

        //query ke database SELECT tabel_barang berdasarkan Kode_Barang = $Kode_Barang
        $select = mysqli_query($koneksi, "SELECT * FROM tabel_barang where Kode_Barang='$Kode_Barang'") or die(mysqli_error($koneksi));
        //jika hasil query = 0 maka akan muncul pesan error
        if (mysqli_num_rows($select) == 0) {
            echo '<div class="alert alert-warning">Kode Barang Tidak ada dalam database</div>';
            exit();
            // jika hasil query > 0
        } else {
            //membuat variabel $data dan menyimpan data row dari query
            $data = mysqli_fetch_assoc($select);
        }
    }
    ?>

    <?php
    //jika tombol simpan di tekan/klik
    if (isset($_POST['submit'])) {
        $Nama_Barang    = $_POST['Nama_Barang'];
        $Jumlah_Barang  = $_POST['Jumlah_Barang'];
        $Harga_Barang  = $_POST['Harga_Barang'];

        $sql = mysqli_query($koneksi, "UPDATE tabel_barang SET Nama_Barang='$Nama_Barang', Jumlah_Barang='$Jumlah_Barang', Harga_Barang='$Harga_Barang' where Kode_Barang='$Kode_Barang'") or die(mysqli_error($koneksi));

        if ($sql) {
            echo '<script>alert("Berhasil menyimpan data."); document.location="index.php?page=tampil_mhs";</script>';
        } else {
            echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
        }
    }
    ?>
    <form action="index.php?page=edit_mhs&Kode_Barang=<?php echo $Kode_Barang; ?>" method="post">
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Kode Barang</label>
            <div class="col-md-6 col-sm-6">
                <input type="text" name="Kode_Barang" class="form-control" size="4" value="<?php echo $data['Kode_Barang']; ?>" readonly required>
            </div>
        </div>
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Nama Barang</label>
            <div class="col-md-6 col-sm-6"></div>
            <input type="text" name="Nama_Barang" class="Form-control" value="<?php echo $data['Nama_Barang']; ?>" required>
        </div>
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Jumlah Barang</label>
            <div class="col-md-6 col-sm-6"></div>
            <input type="text" name="Jumlah_Barang" class="Form-control" value="<?php echo $data['Jumlah_Barang']; ?>" required>
        </div>
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Harga Barang</label>
            <div class="col-md-6 col-sm-6"></div>
            <input type="text" name="Harga_Barang" class="Form-control" value="<?php echo $data['Harga_Barang']; ?>" required>
        </div>
        <div class="item form-group">
            <div class="col-md-6 col-sm-6 offset-md-3">
                <input type="submit" name="submit" class="btn btn-primary" value="simpan">
                <a href="index.php?page=tampil_mhs" class="btn btn-warning">Kembali</a>
            </div>
        </div>
    </form>
</div>