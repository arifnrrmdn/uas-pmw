<?php

  include ('koneksi/koneksi.php');

  $no = $_GET['id'];
  $query = "DELETE FROM transaksi WHERE no = $no";
  $result = mysqli_query($koneksi, $query);
  if($result){
    header("location: index.php");
  }

?>