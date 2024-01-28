<?php
   include ('koneksi/koneksi.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Halaman Tambah Produk</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <style>
  @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap');
  </style>

</head>
<body style="font-family: Montserrat, sans-serif";>

  <section class="row" style="margin-bottom: 20px">
    <div class="col-md-6 offset-md-3 align-self-center"> 
      <h1 class="text-center mt-4">Form Tambah Transaksi</h1>
      <form method="POST" style="margin-top: 35px">
        <div class="mb-3">
          <label for="inputKue" class="form-label">Nama Pembeli</label>
          <input type="text" class="form-control" id="inputNamaPembeli" name="nama_pembeli" placeholder="Masukan Nama Pembeli">
        </div>
        <div class="mb-3">
          <label for="inputBerat" class="form-label">Nomor</label>
          <input type="text" class="form-control" id="inputNomor" name="nomor_pembeli" placeholder="Masukan Nomor">
        </div>
        <div class="mb-3">
          <label for="inputHarga" class="form-label">Email</label>
          <input type="text" class="form-control" id="inputEmail" name="email_pembeli" placeholder="Masukan Email">
        </div>
        <div class="mb-3">
          <label for="inputHarga" class="form-label">Nama Produk</label>
          <input type="text" class="form-control" id="inputProduk" name="nama_produk" placeholder="Masukan Produk">
        </div>
        <div class="mb-3">
          <label for="inputHarga" class="form-label">Keterangan</label>
          <input type="text" class="form-control" id="inputKeterangan" name="deskripsi_produk" placeholder="Masukan Keterangan">
        </div>
        <div class="mb-3">
          <label for="inputHarga" class="form-label">Jumlah</label>
          <input type="number" class="form-control" id="inputJumlah" name="jumlah" placeholder="Masukan Jumlah">
        </div>
        <div class="mb-3">
          <label for="inputHarga" class="form-label">Harga</label>
          <input type="number" class="form-control" id="inputHarga" name="harga" placeholder="Masukan Harga">
        </div>
        <input name="daftar" type="submit" class="btn btn-primary" value="Tambah" style="margin-top: 20px">
        <a href="index.php" type="button" class="btn btn-info text-white" style="margin-top: 20px">Kembali</a>
      </form>
    </div>
  </section>

  <?php
    
    // Buat kondisi jika tombol data di klik
    if(isset($_POST['daftar'])){
      // Membuat variable setiap field inputan agar kodingan lebih rapi.
      $nama_pembeli = $_POST['nama_pembeli'];
      $nomor_pembeli = $_POST['nomor_pembeli'];
      $email_pembeli = $_POST['email_pembeli'];
      $nama_produk = $_POST['nama_produk'];
      $jumlah = $_POST['jumlah'];
      $harga = $_POST['harga'];

      $total = $jumlah * $harga;

      // Membuat Query
      $query = "INSERT INTO transaksi (nama_pembeli, nomor_pembeli, email_pembeli, nama_produk, jumlah, harga, total_harga) VALUES('".$nama_pembeli."', '".$nomor_pembeli."', '".$email_pembeli."','".$nama_produk."','".$jumlah."','".$harga."','".$total."')";

      $result = mysqli_query($koneksi, $query);

      if($result){
        header("location: index.php");
      } else {
        echo "<script>alert('Porduk Gagal di tambahkan!')</script>";
      }

    }    

  ?>

</body>
</html>