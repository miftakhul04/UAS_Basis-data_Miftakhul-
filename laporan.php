<?php include("config.php"); ?>
<!DOCTYPE html>
<html>

<head>
  <title>Laporan</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
  <link rel="stylesheet" href="style.css" />
</head>

<body>
  <header>
    <div class="navbar">
      <h3 class="admin">Welcome Administrator</h3>
    </div>
    <div class="">
      <div class="nav"></div>
      <a href="index.php"><button class="btnt"><i style="margin-right: 5px" class="fa fa-home"></i>Home</button><br></a>

    </div>

  </header>
  <div class='container' style='margin-top:70px'>
    <div class='row' style='min-height:100px'>

      <a class='btn btn-danger' href='print.php' target="_blank">
        <i class="glyphicon glyphicon-print"></i> print</a>

      <div class='panel-body'>
        <center>
          <h3></h3>
          <h3>Laporan Data Transaksi </h3>
          <p>&nbsp;</p>
        </center>

        <table class="table table-hover table-bordered">
          <thead>
            <tr>
              <th>No</th>
              <th>ID Transaksi</th>
              <th>Nama Pembeli</th>
              <th>NO Telp</th>
              <th>Nama Produk </th>

              <th>Harga</th>
              <th>Kategori</th>
              <th>Tanggal Bayar</th>
              <th>Total Harga</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $query = mysqli_query($conn, "SELECT id_transaksi,nama_pembeli,no_telp,nama_produk,kategori,harga,tgl_bayar,total_bayar 
FROM transaksi
CROSS JOIN produk ON transaksi.id_produk = produk.id_produk 
CROSS JOIN pembeli ON transaksi.id_pembeli = pembeli.id_pembeli") or die(mysqli_error($conn));


            $j = 0;
            while ($row = mysqli_fetch_array($query)) {
              echo "<tr><td align='left' bgcolor='#657FFF'>";
              echo $j + 1;
              echo "</font>";
              echo "</td>";
              echo "<td align='left' bgcolor='#E8D3DF'>";
              echo $row["id_transaksi"];
              echo "</font>";
              echo "</td>";
              echo "<td align='left' bgcolor='#E8D3DF'>";
              echo $row["nama_pembeli"];
              echo "</font>";
              echo "</td>";
              echo "<td align='left' bgcolor='#E8D3DF'>";
              echo $row["no_telp"];
              echo "</font>";
              echo "</td>";
              echo "<td align='left' bgcolor='#E8D3DF'>";
              echo $row["nama_produk"];
              echo "</font>";
              echo "</td>";
              echo "<td align='left' bgcolor='#E8D3DF'>";
              echo $row["kategori"];
              echo "</font>";
              echo "</td>";
              echo "<td align='left' bgcolor='#E8D3DF'>";
              echo $row["harga"];
              echo "</font>";
              echo "</td>";
              echo "<td align='left' bgcolor='#E8D3DF'>";
              echo $row["tgl_bayar"];
              echo "</font>";
              echo "</td>";
              echo "<td align='left' bgcolor='#E8D3DF'>";
              echo $row["total_bayar"];
              echo "</font>";
              echo "</td>";
              echo "<td align='left' bgcolor='#E8D3DF'>";
            } ?>
          </tbody>
        </table><br>
        <div class='pull-right'>
          Cikarang Pusat, 03 juli 2021 <br>
          <b>
            <center>Manager Marketing</center>
          </b>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <b>
            <center>MIFTAKHUL</center>
          </b>
        </div>
      </div>
    </div>
  </div>
  </div>
  </div>
</body>

</html>