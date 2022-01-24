
<html>
<head>
  <title>Data Gambar</title>
</head>
    <body>
        <h1>Data File</h1><hr>
        //link menuju halaman upload gambar
        <a href="home.php">Tambah Gambar</a><br><br>
        //data akan ditampilkan di dalam tabel
        <table border="1" cellpadding="8">
            <tr>
            <th>preview</th>
            <th>Nama File</th>
            <th>Ukuran File</th>
            <th>Tipe File</th>
            <th>Tanggal Upload</th>
        </tr>
            <?php
            //memanggil file koneksi
            include "config.php";
            //query mengambil data dari tabel gambar di database
            $tampil = mysqli_query($conn,"select * from fileupload");
            $sql = mysqli_num_rows($tampil);
                while($hasil = mysqli_fetch_array($tampil)){
            ?>
            <tr>
            <td><embed width="100%" height="600px" src="<?php echo "files/".$hasil['nama'];?>"></embed></td>
            <td><?php echo $hasil['nama'];?></td>
            <td><?php echo $hasil['ukuran'];?></td>
            <td><?php echo $hasil['tipe'];?></td>
            <td><?php echo $hasil['tgl_upload'];?></td>
            </tr>
            <?php
                
                }
            ?>
        </table>
    </body>
</html>
