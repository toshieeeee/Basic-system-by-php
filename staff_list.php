<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>

<?php

try{
	$user = 'root';
	$password = 'root';
	$db = 'mysql:dbname=shop';
	$host = 'localhost';
	$port = 8889;
	$dbh = new PDO($db,$user,$password);
	$dbh->query('SET NAMES utf8');

	//SQLでコード追加
	$sql = 'SELECT code,name FROM mst_staff WHERE 1';
	$stmt = $dbh->prepare($sql);
	$stmt->execute();

	//DBから切断
	$dbh = null;

	print 'スタッフ一覧<br><br>';
	print'<form method="post" action="staff_branch.php">';

	while (true) {
		
		$rec = $stmt->fetch(PDO::FETCH_ASSOC);

		if($rec==false){
			break;
		}
		print'<input type="radio" name="staffcode" value="'.$rec['code'].'">';
		print $rec['name'];
		print ':';
		print'</br>';
	}	
		print'<input type="submit" name="add" value="追加">';
		print'<input type="submit" name="edit" value="修正">';
		print'<input type="submit" name="delete" value="削除">';
		print'</form>';
}

catch(Exception $e){

	print'障害が発生しています';
	exit();

}

?>


</body>

</html>