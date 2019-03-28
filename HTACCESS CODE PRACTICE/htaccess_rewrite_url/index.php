<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Rewrite</title>
</head>
<body>
	<h1>INDEX.PHP IS HERE...............</h1>

	<?php 

		function show_product($cat_id,$pro_id)
		{
			$products = array(
				array("cat_id"=>'1',"pro_id"=>'111',"name"=>'Mobile'),
				array("cat_id"=>'2',"pro_id"=>'112',"name"=>'Mobile'),
				array("cat_id"=>'3',"pro_id"=>'113',"name"=>'Mobile')
			);

			foreach ($products as $product) {
				if($product['cat_id']==$cat_id AND $product['pro_id']==$pro_id)
				{
					return $product;
				}
			}
		}

	?>

	<?php 

	if(isset($_GET['url']))
	{
		echo "<pre>";
		print_r($_GET);
		 $url = $_GET['url'];
		$url = explode("/",$url);
		print_r($url);

		if($url[0] == "product")
		{
			$cat_id = $url[1];
			$pro_id = $url[2];

			$pro_show = show_product($cat_id,$pro_id);
			if($pro_show)
			{
				echo "Product Found";
				print_r($pro_show);
			}
		}


	}

	?>





</body>
</html>