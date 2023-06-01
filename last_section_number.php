<?php
// last_section_number.php

// Connect to your database (Replace 'database_name', 'username', and 'password' with your database credentials)
$pdo = new PDO('mysql:host=localhost;dbname=hollybible', 'root', '1234');

// Prepare and execute the SQL query to retrieve the last section number
$stmt = $pdo->prepare('SELECT MAX(section_number) AS last_section_number FROM bible_books WHERE book_name = ? AND chapter_number = ?');
$stmt->execute([$_POST['bookName'], $_POST['chapterNumber']]);

// Fetch the result
$result = $stmt->fetch(PDO::FETCH_ASSOC);

// Return the last section number or 0 if no result found
$lastSectionNumber = isset($result['last_section_number']) ? $result['last_section_number'] : 0;
echo $lastSectionNumber;


?>