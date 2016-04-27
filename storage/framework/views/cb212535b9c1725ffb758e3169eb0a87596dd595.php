<!DOCTYPE html>
<html>
<head>
	<title>form</title>
</head>
<body>
	<form action="fich_res" method="POST">
		<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
		<input type="text" name="name" placeholder="enter your name">
		<input type="submit">
	</form>
</body>
</html>