<?php
session_start();

$buttonPrint = null;
$buttonHapus = null;

if(isset($_POST["btn"])) {
  $nama = $_POST["nama"];
  $nis = $_POST["nis"];
  $rayon = $_POST["rayon"];
  $dataAwal = false;

  if (isset ($_SESSION["data_siswa"])) {
    foreach ($_SESSION ["data_siswa"] as $data) {
      if ($data["nis"] == $nis) {
        $dataAwal = true;
        break;
      }
    }
  }

  if ($dataAwal) {
    echo "<h3>Data ini sudah ada, tidak dapat menduplikat!</h3>";
  } else {
    $_SESSION["data_siswa"][] = [
      "nama" => $nama,
      "nis" => $nis,
      "rayon" => $rayon,
    ];
  }
}

if (isset ($_SESSION["data_siswa"]) && !empty($_SESSION["data_siswa"])) {
  $buttonPrint = '<a href="print.php" class="btn btn-primary">Print Data</a>';
  $buttonHapus = '<a href="hapusall.php" class="btn btn-danger">Hapus Data</a>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Siswa</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-ZenhBwPWqAZlvtjEOBqp##qPJ8YRvEKQYe8N2zT9DI201ZbGpMK8VHvczvfHEfB== crossorigin="anonymous">
</head>
<style>
        table table-striped {
            width: 50%;
            border-collapse: collapse;
            margin: 25px 0;
            font-size: 18px;
            text-align: left;
        }
        th, td {
            padding: 12px;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>

<body>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">

        <center>
          <h1>Edit Data Siswa</h1>
        </center>

        <form action="" method="post" class="mb-3">
          <div class="form-group">
            <label for="nama">Nama Siswa</label>
            <input type="text" name="nama" id="nama" required class="form-control">
          </div>

          <div class="form-group">
            <label for="nis">NIS</label>
            <input type="number" name="nis" id="nis" required class="form-control">
          </div>

          <div class="form-group">
            <label for="rayon">Rayon</label>
            <input type="text" name="rayon" id="rayon" required class="form-control">
          </div>

          <button type="submit" name="btn" id="btn" class="btn btn-primary">Input Data</button>
        </form>

        <div class="d-flex justify-content-between">
        <a href="print.php" class="btn">Print Data</a>
        <a href="hapusall.php" class="btn btn-danger">Hapus Data</a>
        </div>

        <center>
          <table class="table table-striped">
            <td>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NIS</th>
                <th>Rayon</th>
                <th>Aksi</th>
              </tr>
            </td>
            <body>
            <?php $i = 1;?>
            <?php if(isset($_SESSION["data_siswa"]) && is_array($_SESSION["data_siswa"]) ) :?>
            <?php foreach($_SESSION["data_siswa"] as $key => $item) :?>
              <tr>
                <td><?= $i++ ;?></td>
                <td><?= htmlspecialchars($item["nama"]);?></td>
                <td><?= htmlspecialchars($item["nis"]);?></td>
                <td><?= htmlspecialchars($item["rayon"]);?></td>
                <td>
                  <button class="btn btn-info"><a href="hapus.php?id=<?= $key ;?>">Hapus</a></button>
                  <button class="btn btn-info"><a href="detail.php?id=<?= $key ;?>">Detail</a></button>
                  <button class="btn btn-info"><a href="edit.php?id=<?= $key ;?>">Tambah</a></button>
                </td>
                </tr>
                 <?php endforeach;?>
                 <?php endif;?>
            </table>
        </center>
        <table>
            <script>
                document.getElementById('btn').addEventListener('click', function (){
                    window.print();
                })
            </script>
        </table>
</body>
</html>
