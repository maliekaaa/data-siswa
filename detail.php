<?php 
session_start();
if(isset($_GET["id"])){
	$id = $_GET["id"];
	$detail = null;
	foreach($_SESSION["data_siswa"] as $key => $data){
		if($key == $id)
		{
			$detail = $data;
		}
	}

	if($detail == null){
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
	<title>Document</title>
</head>
<body>

	<h1><?= $detail["nama"];?></h1>
	<h1><?= $detail["nis"];?></h1>
	<h1><?= $detail["rayon"];?></h1>
	<a href="index.php">Kembali</a>
</body>
</html>