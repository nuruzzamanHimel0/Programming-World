<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	
	<script type="text/javascript">
		
	var days = ['sun','mon','tus','wed','thus','fri'];

	// var days[0] = 'sat';
	// var days[1] = 'mon';
	// var days[2] = 'tus';
	
	var lengthh = days.length;
	document.write("Length:"+lengthh+"<br>");

	document.write("days: \n");
	for (var i = 0; i < days.length; i++) {
		document.write(days[i]+" ")
	}
	document.write("<br>");

	</script>


	<script type="text/javascript">
		var days = new Array('sun','mon','tus','wed','thus','fri');
		document.write("days: \n");
		for (var i = 0; i < days.length; i++) {
			document.write(days[i]+" ")
		}
		document.write("<br>");
	</script>

	<p id="demo"></p>
	<p id="demo1"></p> 
	<p id="demo2"></p>
	<p id="demo3"></p>
	<p id="demo4"></p>
	<p id="demo5"></p>

	<p id='assArray'></p>

	<script type="text/javascript">
		var cars = new Array("Saab", "Volvo", "BMW");
		// edited..
		cars[0] ='Opel';

		document.getElementById("demo").innerHTML  = cars;

		// document.write("<br>");
		document.getElementById('demo1').innerHTML = cars[0];

		// document.write("<br>");
		document.getElementById('demo2').innerHTML = cars;

		// Associative Array
		var person = {'fname':'Nuruzzaman','lname':'himel','age':26};

		document.getElementById('demo4').innerHTML = person['fname'];

		//The best way to loop through an array is using a standard for loop:

		var fruits, text, flen;

		fruits = ["Banana", "Orange", "Apple", "Mango"];

		flen = fruits.length;

		text = "<ul>";
		for(var i =0;i<flen;i++)
		{
			text += "<li>"+fruits[i]+"</li>";
		}
		text += "</ul>";

		document.write(text);

		document.getElementById("demo5").innerHTML = text+"<br>";

		https://www.w3schools.com/js/js_arrays.asp
		

	</script>



</body>
</html>