<?php
   include ('koneksi/koneksi.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Halaman Update data</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

</head>
<body>

  <?php

    // Ambil data dari patameter url browser
    $no = $_GET['id'];
    // Query ambil data dari param jika ada.
    $query = "SELECT * FROM transaksi WHERE no = $no";
    // Hasil Query
    $result = mysqli_query($koneksi, $query);
    $data=mysqli_fetch_array($result);
  ?>

<?php
if (!isset($_POST['submit']))
{

  ?>
  <section class="row">
    <div class="col-md-6 offset-md-3 align-self-center"> 
      <h1 class="text-center mt-4">Form Update Data</h1>
      <form method="POST">
        <!-- Inputan tersembunyi untuk menyimpan data id yang digunakan untuk mengupdate data, lebih aman di banding menggunakan id dari params -->
        <input type="hidden" value="<?= $data['no'] ?>" name="no">
        <div class="mb-3">
          <label for="inputKue" class="form-label">Nama Pembeli</label>
          <input type="text" class="form-control" id="inputNamaPembeli" name="nama_pembeli" value="<?php echo $data[1] ?>">
        </div>
        <div class="mb-3">
          <label for="inputBerat" class="form-label">Nomor</label>
          <input type="text" class="form-control" id="inputNomor" name="nomor_pembeli" value="<?php echo $data[2] ?> ">
        </div>
        <div class="mb-3">
          <label for="inputHarga" class="form-label">Email</label>
          <input type="text" class="form-control" id="inputEmail" name="email_pembeli" value="<?php echo $data[3] ?>">
        </div>
        <div class="mb-3">
          <label for="inputHarga" class="form-label">Nama Produk</label>
          <input type="text" class="form-control" id="inputProduk" name="nama_produk" value="<?php echo $data[4] ?>">
        </div>
        <div class="mb-3">
          <label for="inputHarga" class="form-label">Keterangan</label>
          <input type="text" class="form-control" id="inputKeterangan" name="deskripsi_produk" value="<?php echo $data[5] ?>">
        </div>
        <div class="mb-3">
          <label for="inputHarga" class="form-label">Jumlah</label>
          <input type="number" class="form-control" id="inputJumlah" name="jumlah" value="<?php echo $data[6] ?>">
        </div>
        <div class="mb-3">
          <label for="inputHarga" class="form-label">Harga</label>
          <input type="number" class="form-control" id="inputHarga" name="harga" value="<?php echo $data[7] ?>">
        </div>
        <input name="submit" type="submit" class="btn btn-primary" value="Update">
        <a href="index.php" type="button" class="btn btn-info text-white">Kembali</a>
      </form>
    </div>
  </section>


  <?php
    }else 
    {
      $no = $_POST['no'];
      $nama_pembeli = $_POST['nama_pembeli'];
      $nomor_pembeli = $_POST['nomor_pembeli'];
      $email_pembeli = $_POST['email_pembeli'];
      $nama_produk = $_POST['nama_produk'];
      $deskripsi_produk = $_POST['deskripsi_produk'];
      $jumlah = $_POST['jumlah'];
      $harga = $_POST['harga'];

      // Membuat Query
      $query = "UPDATE transaksi SET nama_pembeli = '$nama_pembeli', nomor_pembeli = '$nomor_pembeli', email_pembeli = '$email_pembeli', nama_produk = '$nama_produk', deskripsi_produk = '$deskripsi_produk', jumlah = '$jumlah', harga = '$harga' WHERE no = '$no'";

      $result = mysqli_query($koneksi, $query);

      if($result){
        echo "<script>alert('Data Berhasil Diubah !') </script>";
        echo"<script type='text/javascript'>window.location = 'index.php'</script>";
      } else {
        echo "<script>alert('Data Gagal di update!')</script>";
      }

    }    

    

  ?>

</body>
</html>