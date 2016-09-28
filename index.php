<?php
require 'config.php';

$_SESSION['questions'] = $data->get_questions();

include 'header.php';
?>


<body>
	<h1>This is My Quiz</h1>
	
	<form action="questions.php" method="get">
	<h2>Click Start to Begin</h2>
		<button name="begin">Start Quiz</button>
	</form>

</body>
</html>