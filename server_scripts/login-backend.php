<?php
include("../connect.php");
include('../log.php');
session_start();

$logs = new Log();

if($_SERVER['REQUEST_METHOD'] === 'POST')
{
  try{
    $MatricNo = mysqli_real_escape_string($conn, $_POST['matricno']);
    $Password = mysqli_real_escape_string($conn, $_POST['password']);

    // creating a hash (cryptography) function for password
    // $Key = "ADULT".$Password."XTRA";
    // $Hash = hash('sha512',$Key);
    // $Password = md5($Hash, true);

    // selecting data from database
		$sql = "SELECT * FROM student WHERE matricno = '$MatricNo' and password = '$Password'";
    $result = mysqli_query($conn, $sql);
    //get records from table:
    $record = mysqli_fetch_assoc($result);

    $Row = mysqli_num_rows($result);
		if($Row == 1)
		{
      //using username as my session parser
      $_SESSION['matricno'] = $MatricNo;
      $logs->successLog($MatricNo, $Password);
      echo json_encode(array('success' => 1));
      echo "<script>alert('Login successful');window.location='StudentPortal';</script>";
		}else{
      $logs->failedLog($MatricNo, $Password);
      echo "<script>alert('invalid login credentials, try again');</script>";
		}
	
}
catch(Exception $e )
{
	echo 'message'. $e->getMessage();
}
}

?>