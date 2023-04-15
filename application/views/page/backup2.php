<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Backup dan Restore 2</title>
	<link rel="stylesheet" href="">
</head>
<body>

	Menu Backup <br>

	<br>

	<a href="<?php echo base_url(); ?>Backup2/backup" title="Backup Database">Klik untuk Backup Database</a> <br>
	
<br><br>
	Menu Restore <br>

	<br>

	<form action="<?php echo base_url(); ?>Backup2/restore" method="POST" enctype='multipart/form-data'>

		<input type="file" name="datafile" title="Pilih FIle">

		<input type="submit" value="Klik untuk restore">
		
		
	</form>
</body>
</html>