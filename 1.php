<html>
<head><title></title>
<script>
var ERROR =0;
function checkName(){
	var n = document.regForm.stuName.value;
	var nPat =/^([a-zA-Z]{3,30})/;
	document.regForm.stuName.style.backgroundColor = "white";
	if(nPat.test(n)){
		document.regForm.stuName.style.backgroundColor = "yellow";
		ERROR=0;
		return true;
	}else{
		document.regForm.stuName.style.backgroundColor = "red";
		ERROR+=1;
		return false;
	}
}

function checkROLL(){
	var batch = document.regForm.batch.value;
	
	if(batch == "MCA"){
		var rPat =/^(m|M)\d{6}(ca|CA)$/;
		var r = document.regForm.roll.value;
		if(rPat.test(r) && r.length===9){
			document.regForm.roll.style.backgroundColor = "yellow";
			ERROR=0;
			return true;
		}else{
			document.regForm.roll.style.backgroundColor = "red";
			ERROR +=1;
			return false;
		}
	}else if(batch == "BTECH"){
		var r = document.regForm.roll.value;
		var bPat =/^(b|B)\d{6}([a-zA-Z]{2})$/;
		if(bPat.test(r)&& r.length===9){
			document.regForm.roll.style.backgroundColor = "yellow";
			ERROR=0;
			return true;
		}else{
			document.regForm.roll.style.backgroundColor = "red";
			ERROR +=1;
			return false;
		}
		
	}else if(batch == "MTECH"){
		var r = document.regForm.roll.value;
		var mPat =/^(m|M)\d{6}[a-zA-Z]{2}$/;
		if(mPat.test(r) && r.length===9){
			document.regForm.roll.style.backgroundColor = "yellow";
			ERROR=0;
			return true;
		}else{
			document.regForm.roll.style.backgroundColor = "red";
			ERROR +=1;
			return false;
		}	
	}
}

function checkCard(){
	var card_value =document.getElementById("VISA").value;
	if(document.regForm.ctype.value=="visa"){
		if(/^[4]\d{15}/.test(card_value) && card_value.length===16){
			document.getElementById("VISA").style.backgroundColor = "yellow";
			ERROR=0;
			return true;
		}else{
			document.getElementById("VISA").style.backgroundColor = "red";
			ERROR+=1;
			return false;
		}	
	}else if(document.regForm.ctype.value=="master"){		
		var regVisa =/^[8]\d{15}/;
		if(regVisa.test(card_value)  && card_value.length===16){
			document.getElementById("VISA").style.backgroundColor = "yellow";
			ERROR=0;
			return true;
		}else{
			document.getElementById("VISA").style.backgroundColor = "red";
			ERROR+=1;
			return false;
		}
	}else if(checkROLL()){
		return true;
	}
	else {return false;}
	
}

function checkERROR(event){	
	var r = document.regForm.roll.value;
	var n = document.regForm.stuName.value;
	if(checkName() &&checkROLL() && checkCard()){
		if(r=="" && n==""){
			alert("Fields Required Cant Be Empty");
			return false;	
		}else if(ERROR){
			alert("Fix Errors First then Submit ");
			return false;
		}else{
		   var ans = confirm("Are You Sure want To Submit All Detail ");
		   if(ans){
			 return true;
		   }else{
			return false;   
		   }
	   }				
	}
	else{
		alert("Invalid Info ");
		return false;
	}
	
}


</script>
</head>
<body>
<form name="regForm" action="2.php" method="POST">
<fieldset>
<table>
	<tr>
	<td>Student Name</td>
	<td><input type="text" name="stuName" onkeyup="checkName()"></td>
	</tr>
	<tr>
		<td>Student Batch</td>
		<td><select name="batch">
			<option>MCA</option>
			<option>MTECH</option>
			<option>BTECH</option>
		</select></td>
	</tr>
	<tr>
		<td>Student Roll No.</td>
		<td><input type="text" name="roll" onkeyup="checkROLL()"></td>
	</tr>
	<tr>
		<td>Card Type :</td>
		<td>
		Visa<input type="radio" name="ctype" value="visa" maxlength="16" onchange="checkROLL()">
		Master<input type="radio" name="ctype" value="master" maxlength="8"  onchange="checkROLL()">
		<br/>
		<input type="text" name="visa" id="VISA" placeholder="Card Number" onchange="checkCard()">
		</td>		
	</tr>
	<tr>
		<td><button type="reset">RESET FORM</button></td>
		<td><input  type="submit" onclick="return checkERROR()" name="submit"></td>
	</tr>
</table>
</fieldset>	
</form>
</body>
</html>