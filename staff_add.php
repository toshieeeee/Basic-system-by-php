<body>
	
	<p>スタッフ追加</p>

	<form method='post' action='staff_add_check.php'>
		スタッフ名を入力してください<br>
		<input type='text' name='name' style='width=200px'><br>

		パスワードを入力してください <br>
		<input type='password' name='pass' style='width=100px'><br>

		パスワードを再度入力してください <br>
		<input type='password' name='pass2' style='width=100px'><br>

		<input type='button' onclick='history.back()' value='戻る'>
		<input type='submit' value='OK'>
		
	</form>
</body>