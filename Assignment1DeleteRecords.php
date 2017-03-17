<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Book lover website</title>
	</head>

	<body>
		<article class="container">
			<?php

				$conn = mysqli_connect('Connection Information go here', 'Connection Information go here', 'Connection Information go here', 'Connection Information go here') or die('Error connecting to MySQL server.');

				$sql = "SELECT * FROM bookClub";
				$result = mysqli_query($conn, $sql) or die('Error querying database.');

				echo '<table border="1"><tr><td>Title</td><td>Genre</td><td>Short review</td><td>Reviewer: Name</td><td>Review: Email</td><td>Purchase here</td></tr>';

				while ($row = mysqli_fetch_array($result)) {
					echo '<tr>
						<td>' . $row['book_title'] . '</td><td>' . $row['book_genre'] . '</td>
						<td>'.$row['book_review'].'</td><td>'.$row['person_name'].'</td><td>'.$row['person_email'].'</td><td>'.$row['website_URL'].'</td>
						<td><a href="deleteBook.php?bookID='.$row['bookID'].'"
						onclick="return confirm(\'Are you sure\');"> Delete</a></td>
						</tr>';
				}

				echo '<tr><td><a href="recordForBook.php"> Back </a></td></tr>';

				echo '</table>';

				mysqli_close($conn);
			?>
		</article>
	</body>
</html>
