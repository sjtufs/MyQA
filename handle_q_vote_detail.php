<?php
if ( (isset($_GET['id'])) && (is_numeric($_GET['id'])) ) 
	{
	$id = $_GET['id'];
	require_once('./mysql_connect.php');
	$query = "UPDATE questions SET q_votes=q_votes+1 WHERE question_id=$id ";		
	$result = @mysql_query ($query);
	}
	header('Location:./qa_q_detail.php?id='.$id.'');
?>