<?php
//search_data.php

// Connect to your database (Replace 'database_name', 'username', and 'password' with your database credentials)
$pdo = new PDO('mysql:host=localhost;dbname=hollybible', 'root', '1234');

// Retrieve the search words sent from the JavaScript code
$searchWords = json_decode(file_get_contents('php://input'), true);

// Prepare the SQL query to search for the given words in the database
$sql = 'SELECT * FROM bible_books WHERE';
$conditions = [];
$placeholders = [];

// Generate the conditions for each search word
foreach ($searchWords as $index => $word) {
    $conditions[] = 'sections LIKE ?';
    $placeholders[] = '%' . $word . '%';
}

// Join the conditions with 'OR' operator
$sql .= ' (' . implode(' OR ', $conditions) . ')';

// Prepare and execute the SQL query with the placeholders and search values
$stmt = $pdo->prepare($sql);
$stmt->execute($placeholders);

// Fetch the search results
$searchResults = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Return the search results as JSON response
echo json_encode($searchResults);


?>