<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>

<?php

try{
	//データを変数に格納
	$staff_code=$_POST['code'];

	//DBに接続

	$user = 'root';
	$password = 'root';
	$db = 'mysql:dbname=shop';
	$host = 'localhost';
	$port = 8889;
	$dbh = new PDO($db,$user,$password);
	$dbh->query('SET NAMES utf8');


	//SQLでコード追加
	$sql = 'DELETE FROM mst_staff WHERE code=?';
	$stmt = $dbh->prepare($sql);
	$data[] = $staff_code;
	$stmt->execute($data);

	$dbh = null;//DBから切断

}

catch(Exception $e){

	print'ただいま障害発生中でございます';
	exit();
}


?>
削除しました。<br><br>
<a href="staff_list.php">戻る</a>
</body>

</html>