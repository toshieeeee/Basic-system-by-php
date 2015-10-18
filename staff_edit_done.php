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
	$staff_name=$_POST['name'];
	$staff_pass=$_POST['pass'];

	//サニタイジング
	$staff_name=htmlspecialchars($staff_name);
	$staff_pass=htmlspecialchars($staff_pass);

	//DBに接続

	$user = 'root';
	$password = 'root';
	$db = 'mysql:dbname=shop';
	$host = 'localhost';
	$port = 8889;
	$dbh = new PDO($db,$user,$password);
	$dbh->query('SET NAMES utf8');


	//SQLでコード追加
	$sql = 'UPDATE mst_staff SET name=?,password=? WHERE code=?';
	$stmt = $dbh->prepare($sql);
	$data[] = $staff_name;
	$data[] = $staff_pass;
	$data[] = $staff_code;
	$stmt->execute($data);

	$dbh = null;//DBから切断

}

catch(Exception $e){

	print'ただいま障害発生中でございます';
	exit();
}


?>
修正しました<br><br>
<a href="staff_list.php">戻る</a>
</body>

</html>