<?php
session_start(); // Start the session if it's not already started

include "../includes/db.php";

// Get the logged-in user session ID
$userSessionID = $_SESSION['user_id']; // Replace 'user_id' with the actual session variable name

// Get the start date and end date from the query parameters
$start_date = $_GET['start_date'];
$end_date = $_GET['end_date'];

// Prepare the SQL query
$query = "
SELECT total_coins_lr
FROM lightninground
WHERE user_id = :user_id AND timestamp >= :start_date AND timestamp < :end_date
";

$stmt = $conn->prepare($query);
$stmt->bindParam(':user_id', $userSessionID);
$stmt->bindParam(':start_date', $start_date);
$stmt->bindParam(':end_date', $end_date);

// Execute the query
$stmt->execute();

// Fetch all the rows into an array
$results = $stmt->fetchAll(PDO::FETCH_COLUMN);

// Close the database connection
$conn = null;

// Send the response as JSON
header('Content-Type: application/json');
echo json_encode($results);
?>
