<title>Answering</title>
<style type="text/css">
	p.margin {margin: 0cm 4cm 0cm 4cm}
</style>
<?php include('./includes/header.html');?>

<?php
$content=$_POST['answer'];
$fid=$_GET['id'];
require_once('./mysql_connect.php');
$query="INSERT INTO answers (answer_content,a_votes,answertime,father_id)VALUES('$content' , '0' , NOW(),'$fid')";
$result=@mysql_query($query);
?>

<p align="center"><font size="5">Successful!</font></p>
<p align="center">Your answer is:</p>
<?php echo '<i><p align="center" class="margin">'.$_POST['answer'].'</p></i>' ?>
<br><br>
<?php echo '
<form action="./qa_q_detail.php?id='.$fid.'" method="post">
<div align="center"><input type="submit" name="submit" value="Go back to Question" /></div>
</form>
'; ?>
<?php include('./includes/footer.html'); ?>

