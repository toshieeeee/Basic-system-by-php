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
	$staff_pass2=$_POST['pass2'];

	//サニタイジング
	$staff_name=htmlspecialchars($staff_name);
	$staff_pass=htmlspecialchars($staff_pass);
	$staff_pass2=htmlspecialchars($staff_pass2);

	if($staff_name==''){
	print"スタッフ名が入力されていません</br>";}
	else{
	print'スタッフ名:';
	print $staff_name;
	print'<br>';
	}


	if($staff_pass==''){
	print"PASSが入力されていません</br>";
	}

	if($staff_pass!=$staff_pass2){
		print"PASSが一致しません</br>";
	}

	if($staff_name==""||$staff_pass==""||$staff_pass2!=$staff_pass){
		print"<form>";
		print'<input type="button" onclick="history.back()" value="戻る">';
		print"</form>";
	}
	else{
		$staff_pass=md5($staff_pass);
		print'<form method="post" action="staff_add_done.php">';
		print'<input type="hidden" name="name" value="'.$staff_name.'">';
		print'<input type="hidden" name="pass" value="'.$staff_pass.'">';
		print'<br>';
		print'<input type="button" onclick="history.back()" value="戻る">';
		print'<input type="submit" value="OK">';
		print'</form>';
	}

	//DBに接続

	$user = 'root';
	$password = 'root';
	$db = 'mysql:dbname=shop';
	$host = 'localhost';
	$port = 8889;
	$dbh = new PDO($db,$user,$password);
	$dbh->query('SET NAMES utf8');


	//SQLでコード追加
	$sql = 'INSERT INTO mst_staff(name,password) VALUES (?,?)';
	$stmt = $dbh->prepare($sql);
	$data[] = $staff_name;
	$data[] = $staff_pass;
	$stmt->execute($data);
	$dbh = null;//DBから切断
}

catch(Exception $e){

	print'ただいま障害発生中でございます';
	exit();
}


?>

<a href="staff_list.php">戻る</a>
</body>

</html>