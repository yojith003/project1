<?php
/*
$user = 'root';
$password = '';

// Database name is geeksforgeeks
$database = 'new';

// Server is localhost with
// port number 3306
$servername='localhost:3306';
$mysqli = new mysqli($servername, $user,
				$password, $database);

// Checking for connections
if ($mysqli->connect_error) {
	die('Connect Error (' .
	$mysqli->connect_errno . ') '.
	$mysqli->connect_error);
}
*/
function result($input,$sem,$mysqli){
    if($sem == 'all'){
        $sql = "SELECT DISTINCT subcode FROM $input;";
    }
    else{
        #echo $sem;
        $sql = "SELECT DISTINCT subcode FROM $input WHERE SEM = '" . $sem ."' ";
    }
    
    $result = $mysqli->query($sql);
    $row = $result->fetch_all();
    $subcodes = array();
    for ($i = 0; $i < count($row); $i++) {
        $subcodes[$i] = $row[$i][0];
    }
    $resultarray = array();
    $subcodeindex = array();
    $subcount = 0;
    for ($j = 0; $j < count($subcodes); $j++) {
        $sql = "SELECT * FROM $input WHERE SUBCODE='". $subcodes[$j] . "' ORDER BY MON_YEAR DESC;";
        $result = $mysqli->query($sql);
        $count = 0;
        while($row = $result->fetch_row()){
            array_push($resultarray,$row);
            $count++;
        }
        
        array_push($subcodeindex,$subcount);
        $subcount+=$count;
    }
    return [$resultarray, $subcodeindex];
}
function gpa($input,$sem,$mysqli){
    $resarrSubcodeidx = result($input,$sem,$mysqli);
    $resultarray = $resarrSubcodeidx[0];
    $subcodeindex = $resarrSubcodeidx[1];
    $backlogs = 0;
    $sgpa = 0;
    $creditsum = 0;
    $gpaflag = 0;
    for($i=0;$i<count($subcodeindex);$i++){
        $grade = mapping($resultarray[$subcodeindex[$i]][4]);
        $credits = $resultarray[$subcodeindex[$i]][5];
        $creditsum+=$credits;
        #echo $grade."<br>";
        $sgpa += $grade * $credits;
    
        if($grade == -1){
            $gpaflag = 1;
        }
        if($resultarray[$subcodeindex[$i]][4]=='F'){
            
            $backlogs++;
        }
    }
    if($gpaflag==1){
        $sgpa = 0;
    }
    if($creditsum!=0){
        $sgpa /= $creditsum; 
    }
    
    $sgpa = round($sgpa, 2);

    return [$sgpa,$backlogs];
    #echo $sgpa;
    #echo $backlogs;
}
function mapping($x)
{
	if ($x == 'F' or $x == 'ABSENT' or $x=='MP') {
		return -1;
	}
	if($x=='A+')
	return 10;
	else if ($x == 'A')
		return 9;
	else if ($x == 'B')
		return 8;
	else if ($x == 'C')
		return 7;
	else if ($x == 'D')
		return 6;
	else if ($x == 'E')
		return 5;
	else if ($x == 'COMPLE')
		return 0;
	else {
		return 0;
	}

}
/*
if(array_key_exists('name',$_GET)){
	$input = $_GET['name'];
	$sem = 'all';
}
else{
	$sem = $_POST["Semester"];
	$input = $_POST["register"];
}
*/
#$input = '20B81A0586';
#$sem = 'I B.TECH I Sem';

// Username is root


// SQL query to select data from database



?>