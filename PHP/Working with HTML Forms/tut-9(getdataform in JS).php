<?php include_once("headerSection.php") ?>

<script>
function clickHere()
{	//get text value.........................
	var getName = document.myform.name.value;
	document.getElementById("showName").innerHTML = getName;
	// get Radio button value ...........................
	var genderLen = document.myform.gender.length;
	for(i=0;i<genderLen;i++)
	{
		var checkGender = document.myform.gender[i].checked;
		if(checkGender)
		{
			var genValue=document.myform.gender[i].value;
		}
	}
	document.getElementById("showGender").innerHTML = genValue;
	// get Checkbox value ...........................
	var checkBoxLen = document.myform.dep.length;
	var depValue="";
	for(i=0;i<checkBoxLen;i++)
	{
		var checkCheckBox = document.myform.dep[i].checked;
		if(checkCheckBox)
		{
			depValue +=document.myform.dep[i].value;
		}
	}
	document.getElementById("showDept").innerHTML = depValue;
	
	var index = document.myform.coder.selectedIndex;
	var coderValue= document.myform.coder.options[index].value;
    document.getElementById("showCoder").innerHTML = coderValue;
}

</script>
<table class="tblone">
    <tr>
        <td colspan="2" align="center"> Output</td>
    </tr>
    <tr>
        <td>Name </td>
        <td> <span id="showName"> </span></td>
    </tr>
    <tr>
        <td>Gender </td>
        <td> <span id="showGender"> </span></td>
    </tr>
    <tr>
        <td>Department </td>
        <td> <span id="showDept"> </span></td>
    </tr>
    <tr>
        <td>Coder </td>
        <td> <span id="showCoder"> </span></td>
    </tr>

</table>
 <form action="" name="myform" id="myform" onSubmit="clickHere(); return false;">
 	<table border="0">
    	<tr> 
        	<td>Name: </td>
            <td><input type="text" name="name" required> </td>
        </tr>
        <tr> 
        	<td>Gender: </td>
            <td>
            	<input type="radio" name="gender" value="Male" > Male
            	<input type="radio" name="gender" value="Female" >Female
            </td>
        </tr>
        <tr> 
        	<td>Department: </td>
            <td>
            	<input type="checkbox" name="dep" value="CSE" > CSE
            	<input type="checkbox" name="dep" value="Math" >Math
                <input type="checkbox" name="dep" value="Physics" >Physics
            </td>
        </tr>
        <tr> 
        	<td>Coder: </td>
            <td>
            	<select name="coder" required>
                	<option value="">Select One </option>
                    <option value="JAVA">JAVA </option>
                    <option value="HTML">HTML </option>
                    <option value="CSS">CSS </option>
                </select>
            </td>
        </tr>
         <tr> 
        	<td> </td>
            <td>
            	<input type="submit" name="submit" value="submit" >
            </td>
        </tr>
    
    </table>
 </form>  
    
    
    
    
    
     
        	
       
			
<?php include_once("footerSection.php") ?>