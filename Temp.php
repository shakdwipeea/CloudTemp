
<?php

$con = mysqli_connect("localhost","root","","cloud");

if(mysqli_connect_errno()) {
	echo "Failed to connect";
}

if (isset($_GET['temp'])) {
	# code...
	$temp = $_GET['temp'];
	$d = date('Y-m-d');
	if(!mysqli_query($con,"Insert into record (temp,Date) values ('" .$temp. "','".$d."')")) {
		die('Error');
	}

	echo 'Record added';

} 

else {
	$result = mysqli_query($con,"Select * from record");
	echo "<table>";
	while ($row = mysqli_fetch_array($result)) {
		echo "<tr><td>".$row['Sno']."</td><td>".$row['temp']."</td></tr>";
	}
	echo "</table>";
}


	mysqli_close($con); ?>