<?php
include('../includes/functions.php');

$date = new DateTime();
$timezone = new DateTimeZone('America/Denver');
$date->setTimezone($timezone);
$date = $date->format("m-d-y h:i:s");

$myfile = fopen("surveyq2.txt", "a");
$callID = $_POST['CALL_ID'];
$callernum = $_POST['CALLER_ID_NUMBER'];
if (strlen($callernum) == 10)
{
	$callernum = "+1" . $callernum;
}
$callername = $_POST['CALLER_ID_NAME'];
$dialednum = $_POST['DIALED_NUMBER'];
$pbxID = $_POST['PBX_ID'];
$qscore = $_GET['Q2SCORE'];
$sqlquery = "UPDATE surveys SET q2 = '".$qscore."' WHERE id='".$callID."';";


fwrite($myfile, $callID . "\n");
fwrite($myfile, $callernum . "\n");
fwrite($myfile, $callername . "\n");
fwrite($myfile, $dialednum . "\n");
fwrite($myfile, $pbxID . "\n");
fwrite($myfile, $qscore . "\n\n");
fclose($myfile);

//define db connect parameters
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '1550');
define('DB', 'surveys');

//connect to db
$conn = mysqli_connect(HOST,USER,PASS,DB);

//write db queries
$sql = $sqlquery;

//run db queries
$results = mysqli_query($conn, $sql);

//CLOSE CONNECTION
mysqli_close($conn);

?>

