
<?php
  include ('koneksi/koneksi.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Lacchoco</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

  <style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap');
    body {
      padding-top: 56px;
      font-family: "Montserrat", sans-serif;
    }

    .sidebar {
      height: 100%;
      width: 250px;
      position: fixed;
      top: 0;
      left: 0;
      background-color: #2c3e50; /* Sidebar background color */
      padding-top: 20px;
    }

    .sidebar a {
      padding: 10px;
      text-decoration: none;
      font-size: 18px;
      color: #ecf0f1; /* Sidebar text color */
      display: block;
    }

    .content {
      margin-left: 250px;
      padding: 20px;
    }

    .content h1 {
      text-align: center;
    }

    .btn-tambah {
      margin-top: 30px;
    }

    .table {
      margin-top: 20px;
    }
  </style>
</head>
<body>

  <div class="sidebar">
    <a href="#">Dashboard</a>
    <a href="tambah.php">Tambah Produk</a>
    <!-- Add more sidebar links as needed -->
  </div>

  <div class="content">
    <h1>Daftar Produk</h1>
    <a href="tambah.php" class="btn btn-primary btn-tambah">Tambah</a>
    <table class="table table-striped table-bordered">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nama</th>
          <th scope="col">Nomor</th>
          <th scope="col">Email</th>
          <th scope="col">Nama Produk</th>
          <th scope="col">Jumlah</th>
          <th scope="col">Harga</th>
          <th scope="col">Total</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $no = 1;
          $query = "SELECT * FROM transaksi";
          $result = mysqli_query($koneksi, $query);
          foreach ($result as $data){
            echo "
              <tr>
                <th scope='row'>". $no++ ."</th>
                <td>". $data["nama_pembeli"] ."</td>
                <td>". $data["nomor_pembeli"] ."</td>
                <td>". $data["email_pembeli"] ."</td>
                <td>". $data["nama_produk"] ."</td>
                <td>". $data["jumlah"] ."</td>
                <td>". $data["harga"] ."</td>
                <td>". $data["total_harga"] ."</td>
                <td> 
                  <a href='update.php?id=".$data["no"]."' type='button' class='btn btn-success'>Update</a>
                  <a href='hapus.php?id=".$data["no"]."' type='button' class='btn btn-danger' onclick=\"return confirm('Yakin ingin menghapus produk?')\">Delete</a>
                </td>
              </tr>";
          }
        ?>
      </tbody>  
    </table>
  </div>

</body>
</html>