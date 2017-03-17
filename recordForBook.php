<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>The Vinyl Database App</title>
	</head>

	<body>
		<article class="container">
			<?php

				$conn = mysqli_connect('Connection Information go here', 'Connection Information go here', 'Connection Information go here', 'Connection Information go here') or die('Error connecting to MySQL Database');

				$sql = "SELECT * FROM bookClub";
				$result = mysqli_query($conn, $sql) or die('Error querying database.');

				echo '<table border="1"><tr><td>Book Title</td><td>Book Genre</td><td>Book Review</td><td>Person Name</td><td>Person Email</td><td>Website URL</td><td>Delete Book</td></tr>';

				while ($row = mysqli_fetch_array($result)) {
					echo '<tr>
						<td>' . $row['bookTitle'] . '</td><td>' . $row['bookGenre'] . '</td> <td>'.$row['bookReview'].'</td> <td>'.$row['personName'].'</td> <td>'.$row['personEmail'].'</td><td>'.$row['storeURL'].'</td>
						</tr>';
				}
				echo '<tr><td><a href="Assignment1DeleteRecords.php"> Delete Books</a></td></tr>';
				echo '</table>';

				mysqli_close($conn);
			?>
		</article>
	</body>
</html>
