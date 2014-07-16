<?php
$host="localhost"; //replace with database hostname 
$username="root"; //replace with database username 
$password=""; //replace with database password 
$db_name="a9070541_db"; //replace with database name
//$con  = new mysqli($host, $username, $password, $db_name); 
// $con = mysqli_connect($host, $username, $password, $db_name); 
$con=mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

// Evaluo que todo llegue bien
if(isset($_POST['sql']) && isset($_POST['F']))
{
    if($_POST['F']==1){// INSERCION :D
	
	$tabla = $_POST['tabla'];
	$sql = $_POST['sql'];
    $data=stripslashes($sql);
	$sql2 = "INSERT INTO `".$db_name."`.`".$tabla."` ".$data.";"; 
    $result = mysql_query($sql2);
 
	if($result){
    echo "0";
		}
	else{
    echo "1";
    echo mysql_error();
		}
	
	}

	if($_POST['F']==2){// SELECT :D
	
	//$tabla = $_POST['tabla'];
	$sql = ($_POST['sql']);

	//result = mysql_query($sql);
	$data=stripslashes($sql);
	
	$sth = mysql_query($data);
	$rows = array(); 
	while($r = mysql_fetch_assoc($sth)) {
	$rows[] = $r; 
	} 
	echo json_encode($rows);

$json = array();
if($sth){
}
else
{
    echo "1";
}



    }
  // UPDATE
  
  if($_POST['F']==3){// UPDATE :D
	
	$tabla = $_POST['tabla'];
	$sql = $_POST['sql'];
	
    $data=stripslashes($sql);
	//UPDATE  `a9070541_DB`.`emp_info` SET  `log` =  'ccd' WHERE  `emp_info`.`employee_no` =5 LIMIT 1 ;
	$sql2 = "UPDATE `".$db_name."`.`".$tabla."` set ".$data.";"; 
    $result = mysql_query($sql2);
 
	if($result){
    echo "0";
		}
	else{
    echo "1";
    echo mysql_error();
		}
	
	}
	
	// DELETE
	
	if($_POST['F']==4){// DELETE :D
	
	$tabla = $_POST['tabla'];
	$sql = $_POST['sql'];
	
    $data=stripslashes($sql);
	
	$sql2 = "".$data.";"; 
    $result = mysql_query($sql2);
 
	if($result){
    echo "0";
		}
	else{
    echo "1";
    echo mysql_error();
		}
	
	}
  
  
}
else
{
 echo "404";
}




//Fuera del la condicion
mysql_close($con);
?>