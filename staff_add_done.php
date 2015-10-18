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
	$staff_name=$_POST['name'];
	$staff_pass=$_POST['pass'];

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
	$sql = 'INSERT INTO mst_staff(name,password) VALUES(?,?)';
	$stmt = $dbh->prepare($sql);
	$data[] = $staff_name;
	$data[] = $staff_pass;
	$stmt->execute($data);

	$dbh = null;//DBから切断

	print $staff_name;
	print'さんを追加しました<br>';

}

catch(Exception $e){

	print'ただいま障害発生中でございます';
	exit();
}


?>

<a href="staff_list.php">戻る</a>
</body>

</html>