<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8" />
		<title>CTF Write-ups</title>
		<link href="../../styles/prism.css" rel="stylesheet" />
		<link href="../../styles/style.css" rel="stylesheet" />
		<script src="../../scripts/jquery-2.1.1.min.js"></script>
		<script src="../../scripts/lesson.js"></script>
	</head>
	
	<body>
		<h1>CSC CTF Write-ups</h1>
		
		<?php if( !isset( $_POST['semester'] ) ) { ?>
		<h3>What are Write-ups?</h3>
		<p>CTF write-ups are detailed step-by-step solutions for a challenge. They also include methodology, rationale, references, and tools used. Reading these write-ups is a great way to learn about concepts that you could not figure out or see other ways of accomplishing the same tasks. At CSC, we encourage your team to complete write-ups for every challenge you team solves that is 400 or more points. These write-ups will be available for club members after their respective challenges close.</p>
		
		<h3>Submitting a Write-up</h3>
		<p>If you have completed a challenge valued at 400 or more points, you can send CSC a write-up. Write-ups should be a word document or a PDF. Be sure to also include the challenge files (if the challenge had a downloadable file) and any programs you created. Also, remember that write-ups are a set of instructions for others to follow. They must be clear and replicable. If you have any questions, feel free to ask or use other write-ups as templates.</p>

		<h3>Opening a Write-up</h3>
		<p>All write-ups posted here are in PDF format. Please obtain the latest version of Adobe Reader to open them. Some of them will contain attachments that you can extract from the PDF file. PDFs usually do not allow the extraction of zips, Python files, or executables. To bypass this, please modify the Trust Settings as shown on <a href="https://www.adobe.com/devnet-docs/acrobatetk/tools/AppSec/attachments.html" target="_blank">PDF Attachments</a>. If you are too lazy to do that (and you have Adobe Reader 11), simply run this file <a href="adobe.reg" download>adobe.reg</a> on your Windows computer.</p>
		
		<?php } else {
		
		include( '../../config.php' );
		
		$database = Database::getConnection();

		$title = $database->query
		(
			"SELECT DISTINCT(writeups.challenge) AS challenge FROM writeups WHERE writeups.hidden != 1 AND writeups.semester = '" . $database->real_escape_string( $_POST['semester'] ) . "' ORDER BY writeups.challenge ASC"
		);
		
		if( mysqli_num_rows( $title ) === 0 || !$title )
		{
			echo "<p>Invalid semester or no write-ups are released yet.</p>";
		}
		else
		{
			while( $answer = mysqli_fetch_assoc( $title ) )
			{	
				echo "<h3>" . $answer['challenge'] . "</h3>";
				echo "<ul>";
				
				$challenge = $answer['challenge'];
				
				$sub = $database->query
				(
					"SELECT writeups.challenge, writeups.filename, writeups.teamname, writeups.semester FROM writeups WHERE writeups.challenge = '$challenge' AND writeups.hidden != 1 ORDER BY writeups.teamname ASC"
				);
				
				while( $list = mysqli_fetch_assoc( $sub ) )
				{
					echo '<li>' . $list['teamname'] . ' - <a href="http://archive.camscsc.org/download.php?s=' . $list['semester'] . '&f=' . $list['filename'] . '">' . $list['filename'] . '</a></li>';
				}
				
				echo "</ul>";
			}
		}
		
		}?>
		
		<br>	
		<figure>
		<form action="#" method="post">
			Semester:
			<select name="semester">
			<option value="2014f">2014 Fall</option>
			<option value="2015s">2015 Spring</option>
			<option value="2015f">2015 Fall</option>
			</select>
			<input type="submit" value="Submit">
		</form>
		</figure>
		
		<script src="../../scripts/prism.js"></script>
		<?php include('../../footer.php')?>
	</body>
</html>