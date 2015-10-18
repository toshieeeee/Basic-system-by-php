<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>

<?php

try{

$staff_code = $_GET['staffcode'];

//DBに接続

	$user = 'root';
	$password = 'root';
	$db = 'mysql:dbname=shop';
	$host = 'localhost';
	$port = 8889;
	$dbh = new PDO($db,$user,$password);//newで実体化
	$dbh->query('SET NAMES utf8');//PDOのqueryメソッド

	$sql = 'SELECT name FROM mst_staff WHERE code=?';//SQL文
	$stmt = $dbh->prepare($sql);//準備
	$data[] = $staff_code;
	$stmt->execute($data);

	$rec = $stmt->fetch(PDO::FETCH_ASSOC);//fetchメソッド・オブジェクトから実際の値を取り出す
	//PDO::FETCH_ASSOC: は、結果セットに 返された際のカラム名で添字を付けた配列を返します。

	$staff_name = $rec['name']; 

	$dbh = null;

}

catch(Exception $e){

	print '障害が発生しています';
	exit();
}
?>

スタッフ情報参照<br>
<br>
スタッフコード<br>
<?php print $staff_code;?><br>
スタッフ名<br>

<?php print $staff_name;?>

<br>
<br>	


	<input type="button" onclick="history.back()" value="戻る">
	
	
</form>





</body>
</html>