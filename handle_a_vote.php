<?php
if ( (isset($_GET['id'])) && (is_numeric($_GET['id'])) ) 
	{
	$id = $_GET['id'];
	require_once('./mysql_connect.php');
	$query = "UPDATE answers SET a_votes=a_votes+1 WHERE answer_id=$id ";		
	$result = @mysql_query ($query);
	require_once('./mysql_connect.php');
	$query = "SELECT father_id as fid FROM answers WHERE answer_id=$id ";		
	$result = @mysql_query ($query);
	$row = mysql_fetch_array($result, MYSQL_ASSOC);
	}
	header('Location:./qa_q_detail.php?id='.$row['fid'].'');
?>