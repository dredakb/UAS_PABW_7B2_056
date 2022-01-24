<?php

    //mengambil data gambar dan menyimpannya kedalam variabel
    include "config.php";
    $nama_file = $_FILES['file']['name'];
    $ukuran_file = $_FILES['file']['size'];
    $tipe_file = $_FILES['file']['type'];
    $tmp_file = $_FILES['file']['tmp_name'];
    $tgl_upload = date("Y-m-d H:i:s");

    $path = "files/".$nama_file;

    if($tipe_file == "image/jpeg" || $tipe_file == "image/png" || $tipe_file == "video/mp4" || $tipe_file == "application/pdf"){ 
        if($ukuran_file <= 20000000){ 

          //memindahkan lokasi gambar dari tempat asal ke dalam folder website
          //memiliki 2 parameter yang harus diisi, yaitu parameter tempat asal gambar dan paramter tempat tujuan gambar
          if(move_uploaded_file($tmp_file, $path)){ 
            //query untuk memasukkan data ke dalam database
            $sql = mysqli_query($conn,"insert into fileupload set nama='$nama_file', ukuran='$ukuran_file', tipe='$tipe_file',tgl_upload='$tgl_upload'");
            //jika insert data berhasil, maka akan dikembalikan ke halaman tampilgambar.php
            if($sql){ 
              header("location: galeri.php"); 
            }else{
              //jika gagal insert data ke database maka akan memunculkan pesan seperti di bawah ini
              echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
              //link menuju halaman insert gambar
              echo "<br><a href='home.php'>Kembali Ke Form</a>";
            }
          }else{
            echo "Maaf, file gagal untuk diupload.";
            echo "<br><a href='home.php'>Kembali Ke Home</a>";
          }
        }else{
          //jika ukuran gambar lebih besar dari 1MB maka akan memunculkan pesan seperti di bawah ini
          echo "Maaf, Ukuran gambar yang diupload tidak boleh lebih dari 20MB";
          echo "<br><a href='form.php'>Kembali Ke Form</a>";
        }
      }else{
        //jika tipe gambar yang diupload bukan jpg atau png maka akan memunculkan pesan seperti di bawah ini
        echo "Maaf, Tipe file yang diupload harus gambar(jpg/png) dokumen(pdf) video(mp4).";
        echo "<br><a href='home.php'>Kembali Ke Home</a>";
      }
?>