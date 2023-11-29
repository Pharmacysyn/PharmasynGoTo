<?php

function getQ1Summary()
{
$sqlquery = 'SELECT ROUND(AVG(NULLIF(q1 ,0)),2) from surveys;';

//connect to db
$conn = mysqli_connect(HOST,USER,PASS,DB);

//write db queries
$sql = $sqlquery;

//run db queries
$results = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_array($results, MYSQLI_ASSOC))
{
	echo "<tr><td></td><td></td><td></td>";
	echo "<td>The average Score for Q1 is: " . $row['ROUND(AVG(NULLIF(q1 ,0)),2)'] . "</td>";
}

//CLOSE CONNECTION
mysqli_close($conn);

}

function getQ2Summary()
{
$sqlquery = 'SELECT ROUND(AVG(NULLIF(q2 ,0)),2) from surveys;';

//connect to db
$conn = mysqli_connect(HOST,USER,PASS,DB);

//write db queries
$sql = $sqlquery;

//run db queries
$results = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_array($results, MYSQLI_ASSOC))
{
	echo "<td>The average Score for Q2 is: " . $row['ROUND(AVG(NULLIF(q2 ,0)),2)'] . "</td>";
}

//CLOSE CONNECTION
mysqli_close($conn);

}

function getQ3Summary()
{
$sqlquery = 'SELECT ROUND(AVG(NULLIF(q3 ,0)),2) from surveys;';

//connect to db
$conn = mysqli_connect(HOST,USER,PASS,DB);

//write db queries
$sql = $sqlquery;

//run db queries
$results = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_array($results, MYSQLI_ASSOC))
{
	echo "<td>The average Score for Q3 is: " . $row['ROUND(AVG(NULLIF(q3 ,0)),2)'] . "</td>";
	echo "</tr>";
}

//CLOSE CONNECTION
mysqli_close($conn);

}

function getResults()
{
//sql querry to run to gather results
$sqlquery = 'SELECT * from surveys ORDER BY datetime;';


//define db connect parameters
define('HOST', '<sql host>');
define('USER', '<username>');
define('PASS', '<password>');
define('DB', 'surveys');


//connect to db
$conn = mysqli_connect(HOST,USER,PASS,DB);

//write db queries
$sql = $sqlquery;


//run db queries
$results = mysqli_query($conn, $sql);




while ($row = mysqli_fetch_array($results, MYSQLI_ASSOC))
{
	echo "<tr>";
	echo "<td>" . $row['datetime'] . "</td>";
	echo "<td>" . $row['cname'] . "</td>";
	echo "<td>" . $row['cnum'] . "</td>";
	echo "<td>" . $row['q1'] . "</td>";
	echo "<td>" . $row['q2'] . "</td>";
	echo "<td>" . $row['q3'] . "</td>";
	echo "</tr>";

}

//CLOSE CONNECTION
mysqli_close($conn);
}
?>



<!doctype html>
<html lang="en">
	<head>
	<meta charset="utf-8"/>
	<title>POST-CALL SURVEY RESULTS</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<style>
		table {
		font-family: arial, sans-serif;
		border-collapse: collapse;
		width: 100%;
		}
		
		td, th {
		border: 2px solid #0D0D0D;
		text-align: left;
		padding: 8px;
		}
		
		tr:nth-child(even) {
		background-color: #FAFAAA;
		}
	</style>
	</head>
	<body> 
	<div class="container">
		<img src="./img/logo.svg">
		<center><h1>POST-CALL SURVEY RESULTS</h1></center>
	</div>
	<br><br>
	<div class="table">
	<table>
		<tr>
			<th>DATE/TIME</th>
			<th>CALLER NAME</th>
			<th>CALLER ID</th>
			<th>Question 1</th>
			<th>Question 2</th>
			<th>Question 3</th>
		</tr>
		<?php
			getResults();
			getQ1Summary();
			getQ2Summary();
			getQ3Summary();
		?>
	</table>
	</div>
	</body>
</html>