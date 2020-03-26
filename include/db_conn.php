<?php



include_once 'dbsettings.php';

$conn=false;
$message = "";

function conndb() {
	global $conn, $dbserver, $dbname, $dbpassword, $dbusername;
    global $message;
	
	$conn = mysqli_connect($dbserver, $dbusername, $dbpassword);

	if (!$conn)
         $message = "Cannot connect to server";
	else if (!@mysqli_select_db($conn, $dbname))
		$message = "Cannot select database";
	
	if ($message)
		die($message);
}


function executeQuery($query) {
	global $conn;
	
	if(!$conn)
		conndb();

	$result = mysqli_query($conn, $query);
	
	closedb();
		
	if(!$result)
		$message = "Error while executing query.<br/>Mysql Error: " . mysqli_error($conn);
	else
		return $result;
}

function closedb() {
    global $conn;
	
    if(!$conn)
		mysqli_close($conn);
}
?>
