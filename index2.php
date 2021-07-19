<!DOCTYPE html>
<html>

<head>
    <title>Menampilkan Data Pelanggan</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>

<body>
    <h1 class="text-center">Tabel Barang</h1>
    <table border="7">
        <tr bgcolor="green">
            <th>No</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Jumlah Barang</th>
            <th>Harga Barang</th>
        </tr>

        <?php
        include "config.php";

        $no = 1;
        $data = mysqli_query($koneksi, "SELECT * FROM tabel_barang");
        while ($hasil = mysqli_fetch_array($data)) {
        ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $hasil['Kode_Barang']; ?></td>
                <td><?php echo $hasil['Nama_Barang']; ?></td>
                <td><?php echo $hasil['Jumlah_Barang']; ?></td>
                <td><?php echo $hasil['Harga_Barang']; ?></td>
            </tr>
        <?php
        }
        ?>
        <P>
    </table>

    </P>

    <h1>Tabel Pelanggan</h1>
    <table border="7">
        <tr bgcolor="green">
            <th>No</th>
            <th>Nama Pelanggan</th>
            <th>Alamat</th>
            <th>Nama Barang</th>
            <th>Jumlah Pesanan</th>
            <th>Kode Barang</th>
        </tr>

        <?php
        include "config.php";

        $no = 1;
        $data = mysqli_query($koneksi, "SELECT * FROM tabel_pelanggan");
        while ($hasil = mysqli_fetch_array($data)) {
        ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $hasil['Nama_Pelanggan']; ?></td>
                <td><?php echo $hasil['Alamat']; ?></td>
                <td><?php echo $hasil['Nama_Barang']; ?></td>
                <td><?php echo $hasil['Jumlah_Pesanan']; ?></td>
                <td><?php echo $hasil['Kode_Barang']; ?></td>
            </tr>
        <?php
        }
        ?>
    </table>

    <h1>Tabel Barang</h1>
    <table border="7">
        <tr bgcolor="green">
            <th>No</th>
            <th>Kode Barang</th>
            <th>Ruangan</th>
            <th>Pemesan</th>
            <th>Jumlah Pesanan</th>
        </tr>

        <?php
        include "config.php";

        $no = 1;
        $data = mysqli_query($koneksi, "SELECT * FROM tempat_barang");
        while ($hasil = mysqli_fetch_array($data)) {
        ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $hasil['Kode_Barang']; ?></td>
                <td><?php echo $hasil['Ruangan']; ?></td>
                <td><?php echo $hasil['Pemesan']; ?></td>
                <td><?php echo $hasil['Jumlah_Pesanan']; ?></td>
            </tr>
        <?php
        }
        ?>
    </table>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <div class="item form-group">
        <div class="col-md-6 col-sm-6 offset-md-3">
            <a href="index.php?page=tampil_mhs" class="btn btn-danger" align-center>Kembali</a>
        </div>
    </div>
</body>

</html>