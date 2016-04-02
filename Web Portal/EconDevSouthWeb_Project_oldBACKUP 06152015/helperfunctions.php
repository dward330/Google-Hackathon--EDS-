<?php
	session_start();
	$db_connect = mysql_connect("dev-db.cd6byyjzs6xl.us-west-2.rds.amazonaws.com", "admin", "adminpassword") or die(mysql_error());
	mysql_select_db("Econ_Dev_South", $db_connect);
	
	
	function checkLogin(){
		// your code here
		if (!isset($_SESSION['Loggedin'])){
			$_SESSION['error_message'] = "You need to login first!";
			header('Location: http://EDSAppLB-1862368837.us-west-2.elb.amazonaws.com/WebPortal.php');
			exit;
		}
		else{
			if($_SESSION['Loggedin'] == 1){
				//your fine to stay
			}
			else{
				$_SESSION['error_message'] = "You need to login first to view that page!";
				header('Location: http://EDSAppLB-1862368837.us-west-2.elb.amazonaws.com/WebPortal.php');
				exit;
			}
	
		}
	}
	
	function logout(){
		$_SESSION['Loggedin'] = 0;
		$_SESSION['error_message'] = "";
		session_destroy();
		header('Location: http://EDSAppLB-1862368837.us-west-2.elb.amazonaws.com/WebPortal.php');
	}
?>