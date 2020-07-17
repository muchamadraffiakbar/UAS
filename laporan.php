<?php
  session_start();
  if(!isset($_SESSION['id_user'])){
    header("Location: ./login.php");
    die();
  }

  include "config.php";
?>
<!DOCTYPE HTML>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <style>
      body{
        background-color: #f5f5f5;
      }
      .table th {
        text-align: center;
      }
      .table td {
        text-align: center;
      }
    </style>

    <title>Home</title>
  </head>
  <body onload="JavaScript:window.print();">
    <div class="container">
      <?php
        //skrip untuk menampilkan data dari database
        $sql = mysqli_query($conn, "SELECT * FROM covid19"); //script query untuk mengambil semua data dari table transaksi
        if(mysqli_num_rows($sql) > 0) { //mengecek apakah ada data di dalam table transaksi atau tidak, jika ada maka query akan di jalankan
          while($row = mysqli_fetch_array($sql)) {
      ?>
      <center><h3>Data Pemantauan COVID19 Wilayah <?php echo $row['wilayah']; ?> <br>
      <?php $dt = new DateTime('now', new DateTimezone('Asia/Jakarta')); ?>
      Per <?php echo $dt->format("d F Y H:i:s"); ?> <br>
      <?php echo $row['nama']; ?> 
      <?php echo $row['nim']; ?> </h3><br>
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th scope="col">Positif</th>
            <th scope="col">Dirawat</th>
            <th scope="col">Sembuh</th>
            <th scope="col">Meninggal</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td style="padding-top: 10px;"><?php echo $row['positif']; ?></td>
            <td style="padding-top: 10px;"><?php echo $row['dirawat']; ?></td>
            <td style="padding-top: 10px;"><?php echo $row['sembuh']; ?></td>
            <td style="padding-top: 10px;"><?php echo $row['meninggal']; ?></td>
          </tr>
        </tbody>
      </table>
      <?php } }  ?>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>