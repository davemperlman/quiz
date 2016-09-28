<?php
require 'config.php';


if ( isset($_GET['begin']) ) {
	$_SESSION['count'] = 0;
}


// if ( isset($_GET['answer']) ) {
// 	if ( array_unique($_GET['answer']) ) {
// 		print_r($_GET['answer']);
// 		echo "<p id='wrong'>Please select a valid answer1.</p>";
// 	} elseif ( !isset($_GET["submit"]) ) {
// 		echo "<p id='wrong'>Please select a valid answer.</p>";
// 	} else {
// 		array_push($_SESSION['answers'], $_GET['answer']);
// 		$_GET['answer'] = array();
// 		$_SESSION['count']++;
// 	}
	
// } else {
// 	$_SESSION['answers'] = array();
// }

if ( isset($_GET['submit']) ) {
	if ( $_GET['answer'] == 'no') {
		$status = "<p id='wrong'>Please select an answer and click Submit</p>";
	} elseif ( in_array($_GET['answer'], $_SESSION['answers']) ) {
		$status = "<p id='wrong'>Please select an answer and click Submit</p>";
	} else {
		array_push($_SESSION['answers'], $_GET['answer']);
		$status = '';
		$_SESSION['count']++;
		
	}
} else {
	$_SESSION['answers'] = array();
}

include 'header.php';
if ( $_SESSION['count'] >= 12) {
	echo "<h1>Click Below</h1>";
	echo "<button id='answer'><a href='answers.php'><h3>See your Answers</h3></a></button"; die();
}




$test = populate_answers($_SESSION['questions'][$_SESSION['count']]);


  ?>


 <body>
 	<h2>Question <?php echo $_SESSION['count']+1; ?></h2>
 	<h4><?php echo $_SESSION['questions'][$_SESSION['count']]['question'] ?></h4>
 		<form action="" method="get">
			<ul>
				<li>
					<select name="answer">
							<option selected="selected" value="no"> --Select an Answer-- </option>
						<?php foreach ($test as $key) : ?>
							<option value="<?php echo $key; ?>">
								<?php echo $key; ?>
							</option>
						<?php endforeach; ?>
					</select>
				</li>
				<input type="hidden" value="0" name="sneaky"/>	
				<input name="submit" type="submit"/>
			</ul>
			<?php echo $status; ?>
 		</form>
 </body>
 </html>