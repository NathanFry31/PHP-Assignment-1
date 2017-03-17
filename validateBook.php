<?php

$servername = "Connection Information go here";
$username = "Connection Information go here";
$password = "Connection Information go here";
$dbname = "Connection Information go here";

$book_title = $_POST['book_title'];
$book_genre = $_POST['book_genre'];
$book_review = $_POST['book_review'];
$person_name = $_POST['person_name'];
$person_email = $_POST['person_email'];
$website_URL = $_POST['website_URL'];

$formOK = true;

if (empty($_POST['book_title'])) {
    echo 'Please enter the book title </n>';
    $formOK = false;
	}

if (empty($_POST["book_genre"])) {
    echo 'Please enter the book genre </n>';
	$formOK = false;
  }

  if (empty($_POST["book_review"])) {
      echo 'Please enter the book genre </n>';
  	$formOK = false;
    }

if (empty($_POST["person_name"])) {
    echo 'Please enter your full name </n>';
	$formOK = false;
  }

if (empty($_POST["person_email"])) {
	 echo 'Please enter your email </n>';
	 $formOK = false;
	   }

 if (empty($_POST["website_URL"])) {
			echo 'Please enter the book store website URL </n>';
		   $formOK = false;
		  }
  try {

      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


      $stmt = $conn->prepare("INSERT INTO bookClub (bookTitle, bookGenre, bookReview, personName, personEmail, storeURL)
      VALUES (:book_title, :book_genre, :book_review, :person_name, :person_email, :website_URL)");
      $stmt->bindParam(':book_title', $book_title);
      $stmt->bindParam(':book_genre', $book_genre);
	  $stmt->bindParam(':book_review', $book_review);
	  $stmt->bindParam(':person_name', $person_name);
	  $stmt->bindParam(':person_email', $person_email);
	  $stmt->bindParam(':website_URL', $website_URL);


      $stmt->execute();

      echo "New record successfully created";
      }
  catch(PDOException $e)
      {
      echo "Error: " . $e->getMessage();
      }
  $conn = null;
?>
