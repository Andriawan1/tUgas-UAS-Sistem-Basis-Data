<?php
//memasukkan file config.php
include('config.php');
?>

<div class="container" style="margin-top:20px">
    <center>
        <font size="6">Data Barang</font>
    </center>
    <hr>
    <div class="btn-group" role="group" aria-label="Basic example">
        <a href="index.php?page=tambah_mhs"><button class="btn btn-success right">Tambah Barang</button></a>
        <a href="index.php?page=tabel_mhs"><button class="btn btn-primary right">Cek Tabel Barang</button></a>
    </div>
    <div class="table-responsive">
        <table class="table table-striped jambo_table bulk_action text-center">
            <thead>
                <tr class="text-center">
                    <th>No</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Jumlah Barang</th>
                    <th>Harga Barang</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                //select ke database Select tabel_barang urut berdasarkan 
                $sql = mysqli_query($koneksi, "SELECT * FROM tabel_barang ORDER BY Kode_Barang DESC") or die(mysqli_error($koneksi));

                if (mysqli_num_rows($sql) > 0) {
                    $no = 1;
                    while ($data = mysqli_fetch_assoc($sql)) {
                        echo '
                        <tr>
                            <td>' . $no . '</td>
                            <td>' . $data['Kode_Barang'] . '</td>
                            <td>' . $data['Nama_Barang'] . '</td>
                            <td>' . $data['Jumlah_Barang'] . '</td>
                            <td>' . $data['Harga_Barang'] . '</td>
                            <td>
                                <a href="index.php?page=edit_mhs&Kode_Barang=' . $data['Kode_Barang'] . '" class="btn btn-success bt-sm">Edit</a>
                                <a href="delete.php?Kode_Barang=' . $data['Kode_Barang'] . '" class="btn btn-danger bt-sm" onclick="return confirm(\'Yakin ingin menghapus data ini?)">Delete</a>
                            </td>
                        </tr>
                        ';
                        $no++;
                    }
                } else {
                    echo '
                    <tr>
                        <td colspan="6">Tidak Ada Data..!</td>
                    </tr>
                    ';
                }
                ?>
            </tbody>

        </table>
        <br />
        <a href="cetak.php"><button class="btn btn-success right">Cetak File</button></a>

    </div>

</div>