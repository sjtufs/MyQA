
<head>
	<style type="text/css">
	p.pos_abs
		{
		position:static;
		left:310px;
		bottom:40px
		}
	input.pos_abc
		{
		position:static;
		left:600px;
		bottom:20px
		}
</style>
<title>Q Detail</title>
</head>  
    
<?php include('./includes/header.html'); 

if((isset($_GET['id']))&&(is_numeric($_GET['id'])))
{
	$qid=$_GET['id'];
	require_once('./mysql_connect.php');
	$query="SELECT q_votes as votes, DATE_FORMAT(asktime,'%M %d, %Y') as dr,question_content as content From questions WHERE question_id=$qid";
	$result = @mysql_query ($query);	

		
	echo '<table align="center" cellspacing="0" cellpadding="5">
	<tr><td align="left"><b>Votes</b></td>
	<td align="left">	</td>
	<td align="left"><b>Content</b></td>
	<td align="left"><b>Ask Date</b></td></tr>';
		
	$row = mysql_fetch_array($result, MYSQL_ASSOC);	
	echo '<tr><td align="left"><font size="10">' . $row['votes'] . '</font></td>
		<td align="left">
		<a href="handle_q_vote_detail.php?id=' . $qid . '" title="Vote">+</a>
		<input type="hidden" name="submitted" value="TRUE" />
		</td>
		<td align="left">' . $row['content'] . '</td>
		<td align="left">' . $row['dr'] . '</td>
		<td><p><br><br></p></td>
		';
		
	require_once('./mysql_connect.php');
	$query="SELECT a_votes as votes, DATE_FORMAT(answertime,'%M %d, %Y') as dr,answer_content as content,answerer as answerer,answer_id as id  From answers WHERE father_id=$qid   ORDER BY a_votes DESC";
	$result = @mysql_query ($query);	
	$num = mysql_num_rows($result);	
	if($num>0)
		{
		echo '<table align="center" cellspacing="0" cellpadding="5">
		<tr><td align="left"><b>Votes</b></td>
		<td align="left">	</td>
		<td align="left"><b>Content</b></td>
		<td align="left"><b>Answerer</b></td>
		<td align="left"><b>Date</b></td></tr>';

		while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
			echo '<tr><td align="left"><font size="7">' . $row['votes'] . '</font></td>
			<td align="left">
			<a href="handle_a_vote.php?id=' . $row['id'] . '" title="Vote">+</a>
			<input type="hidden" name="submitted" value="TRUE" />
			</td>
			<td align="left">' . $row['content'] . '</td>
			<td align="left"><b>' . $row['answerer'] . '</b></td>
			<td align="left">' . $row['dr'] . '</td></tr>';}
		
		echo '</table>';	
		}
}

echo '
<form action ="handle_answer.php?id='.$qid.'" method ="post"> 
<p align="center" class="pos_abs"><textarea name="answer" rows="20" cols="80"></textarea></p>
<p  align="center"><input class="pos_abc" type ="submit" value="Answer it"/> </p>
</form> 
';

?>

