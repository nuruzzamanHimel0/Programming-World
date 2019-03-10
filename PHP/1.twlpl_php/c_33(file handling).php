<?php include_once("pages/header.php"); ?>

<h2 style="text-align: center;"> File Handling Class:33,34</h2>

<?php 
	
	//echo readfile("text.txt");
	
	// 1. open all file from your text.txt ..............................
	// $fileopen = fopen("text.txt","r") or die("File not found");
	echo fread($fileopen, filesize("text.txt"));
	// fclose($fileopen);

	// 2 . open one line from your text.txt file............................

	// $fileopen = fopen("text.txt", "r") or die("File not found");
	// echo fgets($fileopen);
	// fclose($fileopen);

	// 3 . open first character from your text.txt file............................

	// $fileopen = fopen("text.txt", "r") or die("File not found");
	// echo fgetc($fileopen);
	// fclose($fileopen);

	// 4. File read otherwise file will be end..............

	$fileopen = fopen("file/text.txt", "r");
	while (!feof($fileopen)) {
		echo fgets($fileopen)."<br>";
	}
	fclose($fileopen);

?>

<?php include_once("pages/footer.php"); ?>