<?php
$data;
// get contents of a file into a string
		$name = $_POST['stuName'];
		$sec = $_POST['batch'];
		$rn = $_POST['roll'];
		$ct = $_POST['visa'];
		$ct_option =$_POST['ctype'];
	if(isset($_POST['submit']))
	{
		$name = $_POST['stuName'];
		$sec = $_POST['batch'];
		$rn = $_POST['roll'];
		$ct = $_POST['visa'];
		$ct_option =$_POST['ctype'];	
		
		$data =array($name,$sec,$rn,$ct,$ct_option);
			}else{}
		
FUNCTION hello(){
 GLOBAL $name,$sec,$rn,$ct,$ct_option;
 $wFile =fopen('user_detail.txt','w');
 fwrite($wFile,"Student Name:". $name ."\n");
 fwrite($wFile,"Student Section:". $sec ."\n");
 fwrite($wFile,"Student Roll Number:". $rn ."\n" );
 fwrite($wFile,"Student Card Number :". $ct ."\n");
 fwrite($wFile,"Used Card Type:". $ct_option ."\n");
 fclose($wFile);	
 ECHO "All information Has Been SAVED as a File ! ";
 }	
?>

<head>
<style>
	#center{
		padding-left:100px;
		height:800px;
		width:600px;
	}
</style>
<script>
function echoHello(){
 alert("<?PHP hello(); ?>");
 }
 
</script>
</head>
<body>
<fieldset>
	<h5 align="right"><a href="1.php">Back</a></h5>
	<table id="center"></table>
	<p>Welcome !<?php echo $name;?> &nbsp;Your Information Has Been Recorded ..</p>
	<br/>
	<h4>NAME:</h4><?php if(isset($name)){echo $name;}?><br/>
	<h3>Section:</h3><?php if(isset($name)) {echo $sec;}?><br/>
	<h3>Roll Number </h3><?php if(isset($name)){ echo $rn;}?><br/>
	<h3>Card Number :</h3><?php if(isset($name)){ echo $ct . "(" . $ct_option. ")";}?><br/>
	<button type="Button" onclick="echoDet()">View Detail</button>
	<button type="Button" onclick="echoHello()">write to a file </button>
</fieldset>
<body>

