<?php include('./includes/header.html');?>
<title>MYQA Home</title>
<p align="center"><font size="12">?</font></p>
<form action="./handle_question.php" method="post">
<p align="center"><textarea name="question" rows="20" cols="50"></textarea></p>
	<div align="center"><input type="submit" name="submit" value="Ask a question" /></div>
</form>

<?php
include ('./includes/footer.html');
?>