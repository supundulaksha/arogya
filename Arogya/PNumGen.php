<?php
	session_start();
	if(isset($_SESSION['un'])){
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">Location
<title>Arogya Health Care Hospital</title>
</head>

<body>
<?php
	$conn = mysqli_connect('localhost', 'root', '', 'arogya');
	if($conn) {
		$queLastID = "SELECT MAX(SerialNo) AS MaxSerialNo FROM patient";
		$NRID = mysqli_query($conn, $queLastID);
		if(mysqli_num_rows($NRID) > 0) {
			$val = mysqli_fetch_assoc($NRID);
			
			$id = $val['MaxSerialNo'];
			$id += 1;
		} else {
			$id = 1;
		}
		$pid = 'PAT-' . $id;
		$_SESSION['pid'] = $pid;
		
		header("Location: PatientReg.php");
	} 
	else {
		echo 'Error 303!<br>Database is Not Connected!<br><a href="loginform1.html"><img src="imgs/back.png"></a>';
	}
}
?>
</body>
</html>