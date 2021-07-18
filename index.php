<?php include("config.php"); ?>


<?php include("secure.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Toko</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link href="style.css" rel="stylesheet" />
</head>

<body>
    <div class="navbar">
        <h3 class="admin">Welcome Administrator </h3>
    </div>
    <div class="sidebar">
        <div class="nav">
            <p style="color:white;">Welcome
                <?php echo $_SESSION['username']; ?>!
            </p>
        </div>
        <a href="index.php"><button class="btnt"><i style="margin-right: 5px" class="fa fa-home"></i>Home</button><br></a>
        <a href="add_produk.php"><button class="btnt"><i style="margin-right: 5px" class="glyphicon glyphicon-shopping-cart"></i></button><br></a>
        <a href="add_pembeli.php"><button class="btnt"><i style="margin-right: 5px" class="fa fa-user"></i></button><br></a>
        <a href="add_transaksi.php"><button class="btnt"><i style="margin-right: 5px" class="glyphicon glyphicon-transfer"></i></button><br></a>
        <a href="laporan.php"><button class="btnt"><i style="margin-right: 5px" class="glyphicon glyphicon-file"></i></button><br></a>
        <a href="logout.php"><button class="btnn"><i style="margin-right: 5px" class="glyphicon glyphicon-log-out"></i></button><br></a>
    </div>
    <div class="wrapper">
    </div>
    <h3 class="data">Data Pembeli</h3>

    <table width='50%' border=1>
        <thead>
            <tr>
                <th>ID Pembeli</th>
                <th>Nama Pembeli</th>
                <th>Alamat</th>
                <th>No Telp</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <?php
        include("config.php");
        $sql = 'SELECT * FROM  pembeli';
        $query = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($query)) {
        ?>
            <tbody>
                <tr>
                    <td><?php echo $row['id_pembeli'] ?></td>
                    <td><?php echo $row['nama_pembeli'] ?></td>
                    <td><?php echo $row['alamat'] ?></td>
                    <td><?php echo $row['no_telp'] ?></td>
                    <td><a class="glyphicon glyphicon-edit" style='font-size:24px;color:blue' href="edit_pembeli.php?id=<?= $row['id_pembeli']; ?>"></a>
                        <a class="glyphicon glyphicon-trash" style='font-size:24px;color:red' href="delete.php?id=<?= $row['id_pembeli']; ?>"></a>
                    </td>
                </tr>
            </tbody>
        <?php
        }
        ?>
    </table>
    <h3 class="data">Data Produk</h3>

    <table width='50%' border=1>
        <thead>
            <tr>
                <th>ID produk</th>
                <th>Nama produk</th>
                <th>kategori</th>
                <th>harga</th>
                <th>stock</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <?php
        include("config.php");
        $sql = 'SELECT * FROM  produk';
        $query = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($query)) {
        ?>
            <tbody>
                <tr>
                    <td><?php echo $row['id_produk'] ?></td>
                    <td><?php echo $row['nama_produk'] ?></td>
                    <td><?php echo $row['kategori'] ?></td>
                    <td><?php echo $row['harga'] ?></td>
                    <td><?php echo $row['stok'] ?></td>
                    <td><a class="glyphicon glyphicon-edit" style='font-size:24px;color:blue' href="edit_produk.php?id=<?= $row['id_produk']; ?>"></a>
                        <a class="glyphicon glyphicon-trash" style='font-size:24px;color:red' href="delete.php?id=<?= $row['id_produk']; ?>"></a>
                    </td>
                </tr>
            </tbody>
        <?php
        }
        ?>
    </table>
    <h3 class="data">Data Transaksi</h3>

    <table width='70%' border=1>
        <thead>
            <tr>
                <th>ID Transaksi</th>
                <th>ID Pembeli</th>
                <th>ID Produk</th>
                <th>Tanggal bayar</th>
                <th>Total harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <?php
        include("config.php");
        $sql = 'SELECT * FROM  transaksi';
        $query = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($query)) {
        ?>
            <tbody>
                <tr>
                    <td><?php echo $row['id_transaksi'] ?></td>
                    <td><?php echo $row['id_pembeli'] ?></td>
                    <td><?php echo $row['id_produk'] ?></td>
                    <td><?php echo $row['tgl_bayar'] ?></td>
                    <td><?php echo $row['total_bayar'] ?></td>
                    <td><a class="glyphicon glyphicon-edit" style='font-size:24px;color:blue' href="edit_transaksi.php?id=<?= $row['id_transaksi']; ?>"></a>
                        <a class="glyphicon glyphicon-trash" style='font-size:24px;color:red' href="delete.php?id=<?= $row['id_transaksi']; ?>"></a>
                    </td>
                </tr>
            </tbody>
        <?php
        }
        ?>
    </table>
</body>
<footer>

</footer>

</html>