<?php include_once("pages/header.php"); ?>

<h2 style="text-align: center;"> File Create ANd Write</h2>

<?php 
	// create or append new file and wite new file name is new.txt
	$createFile = fopen("file/new.txt","w") or die("File not created");
	fwrite($createFile,"My name is Himel <br>");
	fwrite($createFile,"My name is Kamal <br>");
	fclose($createFile);
	// open file and show in your browser
	$fileOpen = fopen("file/new.txt","r");
	while(!feof($fileOpen))
	{
		echo fgets($fileOpen);
	}
		fclose($fileOpen);
?>
<?php include_once("pages/footer.php"); ?>