<?php include("config.php"); ?>
<?php include("header.php"); ?>

<body>
    <?php
    include 'config.php';
    $q = mysqli_query($conn, "SELECT max(id_transaksi) as idTerbesar FROM transaksi");
    $data = mysqli_fetch_array($q);
    $kodeBarang = $data['idTerbesar'];


    $urutan = (int) substr($kodeBarang, 3, 3);


    $urutan++;


    $huruf = "TSR";
    $kodeBarang = $huruf . sprintf("%04s", $urutan);
    ?>
    <form action="add_transaksi.php" method="post" style="text-align:center;">
        <label>
            ID Transaksi</label><br>
        <input type="text" class="input" name="id_transaksi" value="<?php echo $kodeBarang ?>" readonly><br>
        <label>Nama Pembeli</label><br>
        <select class="input" name="nama_pembeli">
            <?php
            $sql = mysqli_query($conn, "SELECT * FROM pembeli");
            while ($data = mysqli_fetch_assoc($sql)) {
                echo '<option value="' . $data["id_pembeli"] . '">' . $data["nama_pembeli"] . '</option>';
            }
            ?>
        </select><br>
        <label>Nama Produk</label><br>
        <select class="input" name="nama_produk">
            <?php
            $sql = mysqli_query($conn, "SELECT * FROM produk");
            while ($data = mysqli_fetch_assoc($sql)) {
                echo '<option value="' . $data["id_produk"] . '">' . $data["nama_produk"] . ', Rp.' . $data["harga"] . ',- net' . '</option>';
            }
            ?>
        </select><br>

        <label>
            Tanggal Bayar</label><br>
        <input type="text" class="input" id="date" name="tgl_bayar"><br>

        <label>
            Total Harga</label><br>
        <input type="text" class="input" name="total_harga"><br>

        <br>
        <input type="submit" class="btn btn-success" name="submit" value="simpan">
    </form>
    <?php
    if (isset($_POST['submit'])) {
        $id_transaksi = $_POST['id_transaksi'];
        $tgl_bayar = $_POST['tgl_bayar'];
        $total_harga = $_POST['total_harga'];

        include("config.php");

        $insert = mysqli_query($conn, "INSERT INTO transaksi VALUES('','$_POST[nama_pembeli]','$_POST[nama_produk]','$_POST[tgl_bayar]','$_POST[total_harga]')");

        if ($insert) {
            echo "transaction added successfully. <a href='index.php'>View Users</a>";
        } else {
            echo "transaction failed try again!!!";
        }
    }
    ?>
</body>
<?php include("footer.php"); ?>