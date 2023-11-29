<?php

$myfile = fopen("testfile.txt", "w");
$callID = "CallID = " . $_POST['CALL_ID'] . "\n";
$callernum = "Caller Number = " . $_POST['CALLER_ID_NUMBER'] . "\n";
$callername = "Caller Name = " . $_POST['CALLER_ID_NAME'] . "\n";
$dialednum = "Dialed Number = " . $_POST['DIALED_NUMBER'] . "\n";
$dnis = "DNIS = " . $_POST['DNIS'] . "\n";

fwrite($myfile, $callID);
fwrite($myfile, $callernum);
fwrite($myfile, $callername);
fwrite($myfile, $dialednum);
fwrite($myfile, $dnis);
fclose($myfile);


?>