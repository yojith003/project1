<!-- PHP code to establish connection with the localserver -->
<?php require 'resCal.php'; 
include '../dbconn.php';
//c
if(array_key_exists('name',$_GET)){
	$input = $_GET['name'];
	$sem = 'all';
	$resarrsubcodeidx = result($input,$sem,$conn);
	$resultarray = $resarrsubcodeidx[0];
	$subcodeindex = $resarrsubcodeidx[1];
	$gpabacklogs = gpa($input,$sem,$conn);
	$sgpa = $gpabacklogs[0];
	$backlogs = $gpabacklogs[1];
	$stuflag = 0;
}
else{
	$sem = $_POST["Semester"];
	$input = $_POST["register"];
	$resarrsubcodeidx = result($input,$sem,$conn);
	$resultarray = $resarrsubcodeidx[0];
	$subcodeindex = $resarrsubcodeidx[1];
	$gpabacklogs = gpa($input,$sem,$conn);
	$sgpa = $gpabacklogs[0];
	$backlogs = $gpabacklogs[1];
	$stuflag = 1;
}
	
?>
<!-- HTML code to display data in tabular format -->
<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="../UI/sample.css">
<head>
	<meta charset="UTF-8">
	<title>Student Details</title>
	<!-- CSS FOR STYLING THE PAGE -->
	<style>
		table {
			margin: 0 auto;
			font-size: large;
			border: 1px solid black;
		}

		h1 {
			text-align: center;
			color: #006600;
			font-size: xx-large;
			font-family: 'Gill Sans', 'Gill Sans MT',
			' Calibri', 'Trebuchet MS', 'sans-serif';
		}

		td {
			background-color: #E4F5D4;
			border: 1px solid black;
		}

		th,
		td {
			font-weight: bold;
			border: 1px solid black;
			padding: 10px;
			text-align: center;
		}

		td {
			font-weight: lighter;
		}
		.gpa {
			text-align: center;
			color: #006600;
			font-size: xx-large;
			font-family: 'Gill Sans', 'Gill Sans MT',
			' Calibri', 'Trebuchet MS', 'sans-serif';
		}
	</style>
</head>

<body>
	<section>
	<?php
	if($stuflag==0){
		require '../Counsellor/_nav.php';
	}
	else{
		echo '<h1>Student Results</h1>';
	}
	  ?>
		<p class = "gpa" >GPA is <?php echo $sgpa?> Noof Backlogs <?php echo $backlogs?></p>
		
		<!-- TABLE CONSTRUCTION -->
		<table>
			<tr>
				<th>Register No</th>
				<th>Subject Code</th>
				<th>Subject Name</th>
				<th>Internals</th>
                <th>Grade</th>
				<th>Credits</th>
				<th>Semester</th>
                <th>Date</th>
			</tr>
			<!-- PHP CODE TO FETCH DATA FROM ROWS -->
			<?php
				// LOOP TILL END OF DATA
				$j=0;
				for($i=0;$i<count($resultarray);$i++)
				{
			?>
			<tr>
				<!-- FETCHING DATA FROM EACH
					ROW OF EVERY COLUMN -->
				<td><?php echo $resultarray[$i][0];?></td>
				<td><?php echo $resultarray[$i][1];?></td>
				<td><?php echo $resultarray[$i][2];?></td>
				<td><?php echo $resultarray[$i][3];?></td>
                <td><?php echo $resultarray[$i][4];?></td>
				<td><?php echo $resultarray[$i][5];?></td>
				<td><?php echo $resultarray[$i][6];?></td>
				<td><?php echo $resultarray[$i][7];?></td>
				
				
				<?php
				$j++;
				
				?>

			</tr>
			<?php
				}
			?>
		</table>
	</section>
</body>

</html>
