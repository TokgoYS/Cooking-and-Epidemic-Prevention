<?php
	require_once("dbtools.inc.php");
	$link = create_connection();
	session_start();
	
	$jNo = $_SESSION["id"];
	
	$sql = "DELETE FROM journal WHERE jNo=".$jNo;
	execute_sql($link, "db_c108193104", $sql);
	
	$sql1 = "DELETE FROM applys WHERE reply_jNo=".$jNo;
	execute_sql($link, "db_c108193104", $sql1);
	
	header("location:myNews.php");

?>