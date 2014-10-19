<!DOCTYPE html>
<html>
<head>
	<title>Cloud</title>
	<style type="text/css">
	body {

		margin: 0px auto;
		width: 450px;
		vertical-align: center;
		margin-top: 200px;
	}
	</style>
</head>
<body>
<strong>Temp</strong>
	<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="GET">
		<input type="date" name="date">
		<input type="submit">
	</form>
<?php

$con = mysqli_connect("localhost","root","","cloud");
if(mysqli_connect_errno()) {
	echo "Failed to connect";
}
if (isset($_GET['date'])) {
	# code...
	$date = $_GET['date'];
	$q = "Select * from record where Date = '$date'";
	$result = mysqli_query($con,$q);
	echo "<table><th>Sno</th><th>Temparature</th><th>Date</th>";
	while ($row = mysqli_fetch_array($result)) {
		echo "<tr><td>".$row['Sno']."</td><td>".$row['temp']."</td><td>".$row['Date']."</td></tr>";
	}
	echo "</table>"; 
	}?>
	<script type="text/javascript">

	</script>
</body>
</html>