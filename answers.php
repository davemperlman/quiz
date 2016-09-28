
<?php
require 'config.php';
include 'header.php';
if ( count($_SESSION['answers']) < 12 ) {
	//header('location: index.php');
}

echo "<h3>Your Answers: </h3>"; 

$i = 0;
$corrects = 0;
foreach ($_SESSION['questions'] as $key) {
	if ( $key['correct_answer'] == $_SESSION['answers'][$i] ) {
		echo "<li id='correct'>" . $key['question'] . "</li>";
		echo "<strong>" . $_SESSION['answers'][$i] . "</strong>";
		$corrects++;
		$i++;
	} else {
		echo "<li id='wrong'>" . $key['question'] . "</li>";
		echo "<strong>" . $_SESSION['answers'][$i] . "</strong>";
		$i++;
	}
	
}
$results = round( ($corrects/12)*100, 2);
echo "<p>You scored %$results.</p>";




 session_destroy();
 $_SESSION = array();

echo "<a href='index.php'> Try Again </a>";

 ?>