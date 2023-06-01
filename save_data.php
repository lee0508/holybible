<?php
// save_data.php


// Retrieve the data sent from the JavaScript code
$data = json_decode(file_get_contents('php://input'), true);

// Connect to your database (Replace 'database_name', 'username', and 'password' with your database credentials)
$pdo = new PDO('mysql:host=localhost;dbname=hollybible', 'root', '1234');

// Prepare and execute the SQL query to insert the data
$stmt = $pdo->prepare('INSERT INTO bible_books (book_name, chapter_number, section_number, sections) VALUES (?, ?, ?, ?)');
$stmt->execute([$data['bookName'], $data['chapterNumber'], $data['sectionNumber'], $data['sections']]);

// Return a response (You can customize this based on your requirements)
$response = "Data saved successfully!";
echo json_encode($response);
?>