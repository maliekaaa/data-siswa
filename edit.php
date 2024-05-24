<?php
session_start();

$value = ["nama" => "", "nis" => "", "rayon" => ""];
$id = null;

if(isset($_GET["id"])) {
  $id = $_GET["id"];

  if(isset($_SESSION["data_siswa"][$id])) {
    $value = $_SESSION["data_siswa"][$id];
  } else {
    header("Location: index.php");
    exit;
  }
}

if(isset($_POST["btn"])) {
  if($id !== null) {
    $nama = $_POST["nama"];
    $nis = $_POST["nis"];
    $rayon = $_POST["rayon"];

    $_SESSION["data_siswa"][$id] = [
      "nama" => $nama,
      "nis" => $nis,
      "rayon" => $rayon
    ];

    header("Location: index.php");
    exit;
  } else {
    header("Location: index.php");
    exit;
  }
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
<body>

  <div class="container">
    <div class="row">
      <div class="col-md-6">
          <h1>Edit Data Siswa</h1>

        <form action="" method="post" class="mb-3">
          <div class="form-group">
            <label for="nama">Nama Siswa</label>
            <input type="text" name="nama" id="nama" value="<?= $value["nama"];?>" required class="form-control">
          </div>

          <div class="form-group">
            <label for="nis">NIS Siswa</label>
            <input type="number" name="nis" id="nis" value="<?= $value["nis"];?>" required class="form-control">
          </div>

          <div class="form-group">
            <label for="rayon">Rayon</label>
            <input type="text" name="rayon" id="rayon" value="<?= $value["rayon"];?>" required class="form-control">
          </div>

          <br>
          <button type="submit" name="btn" id="btn" class="btn btn-primary">Ubah Data</button>
        </form>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-SYyqXdpJnFDTLPQ4d+aCXOwkgxEV9vmV1Evr3fNfNEW0c8jweW0CKfdvuqQtkUfY" crossorigin="anonymous"></script>
</body>
</html>
