<?php include_once("headerSection.php") ?>

<script>
	
	function formFunction()
	{
		// get text value..............................
		var name = document.myForm.name.value;
		var showData = "Your name is : "+name;	
		document.getElementById("output").innerHTML = showData;
		
		// get radio button value.......................
		var genderLeng = document.myForm.gender.length;
		for(i=0 ; i<genderLeng;i++)
		{
			var checkResult = document.myForm.gender[i].checked;
			if(checkResult)
				{
				 var result = document.myForm.gender.value;	
				}
		}
		var showGender = "Gender is: "+result;
		document.getElementById("output1").innerHTML=showGender;
		
		//get checkbox values........................
		
		var lenChekBox =document.myForm.checkbox.length;
		var result="";
		for(j=0;j<lenChekBox;j++)
		{
			var checkBoxcheck =document.myForm.checkbox[j].checked;
			if(checkBoxcheck)
			{
				result += document.myForm.checkbox[j].value+",";
			}
		}
		var showcheckRes ="You have selected: "+result;
		document.getElementById("output2").innerHTML = showcheckRes;
	}
</script> 
    
    
   
    
    
 <div id="output"> Text Output:</div>  
<div id="output1"> Radio Output:</div>
<div id="output2"> CheckBox Output:</div>   
  
 <form action=""  name="myForm" id="myForm" onSubmit="formFunction(); return false;">
     Your name:<input type="text" name="name">
     <br>
 			<input type="radio" name="gender" value="Male" >Male
            <input type="radio" name="gender" value="Female" >Female
            <input type="radio" name="gender" value="Other" >Other
            <br>
            
            <input type="checkbox" name="checkbox" value="HTML" >HTML
            <input type="checkbox" name="checkbox" value="CSS" >CSS
            <input type="checkbox" name="checkbox" value="Javascript" >Javascript
              <br>
              
     <input type="submit" value="Submit" >
     <input type="reset" value="Reset" >
 
 </form>   
    
    
    
    
    
    
    
     
        	
       
			
<?php include_once("footerSection.php") ?>