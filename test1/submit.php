<?php
require 'vendor/autoload.php';


error_reporting(E_ALL);
ini_set('display_errors', 1);

try {
    $mongoClient = new MongoDB\Client("mongodb://localhost:27017"); 
    // echo "<p>MongoDB connected successfully!</p>";
} catch (Exception $e) {
    echo "<p class='error'>Connection failed: " . htmlspecialchars($e->getMessage()) . "</p>";
    exit();
}

// Select the database and collection
$collection = $mongoClient->user_data->users;

// Get form data
$name = $_POST['name'] ?? ''; 
$surname = $_POST['surname'] ?? '';
$id_number = $_POST['id_number'] ?? '';
$dob = $_POST['dob'] ?? '';

// Check form fields
$errors = [];

// Check ID Number
if (!preg_match("/^\d{13}$/", $id_number)) {
    $errors[] = "ID Number must be exactly 13 digits.";
}

// Check Date of Birth format
if (!preg_match("/^\d{2}\/\d{2}\/\d{4}$/", $dob)) {
    $errors[] = "Date of Birth must be in the format dd/mm/YYYY.";
}

// Check if there are validation errors
if (!empty($errors)) {
    echo "<div class='error'>";
    echo "<h3>Validation Errors:</h3><ul>";
    foreach ($errors as $error) {
        echo "<li>" . htmlspecialchars($error) . "</li>";
    }
    echo "</ul>";
    echo "<a href='index.php'>Go back to the form</a>";
    echo "</div>";
    exit();
}

// Check for duplicate ID Number
$duplicate = $collection->findOne(['id_number' => $id_number]);

if ($duplicate) {
    echo "<p class='error'>This ID Number already exists. <a href='index.php'>Go back</a></p>";
    exit();
}

// Insert the data into MongoDB
$result = $collection->insertOne([
    'name' => $name,
    'surname' => $surname,
    'id_number' => $id_number,
    'date_of_birth' => $dob
]);

// Check the result of the insertion
if ($result->getInsertedCount() == 1) {
    echo "<p class='success'>User registered successfully!</p>";

    // Fetch and display all registered users
    $users = $collection->find();
    echo "<h2>Registered Users:</h2>";
    echo "<table>
            <tr>
                <th>Name</th>
                <th>Surname</th>
                <th>ID Number</th>
                <th>Date of Birth</th>
            </tr>";
    foreach ($users as $user) {
        echo "<tr>
                <td>" . htmlspecialchars($user['name']) . "</td>
                <td>" . htmlspecialchars($user['surname']) . "</td>
                <td>" . htmlspecialchars($user['id_number']) . "</td>
                <td>" . htmlspecialchars($user['date_of_birth']) . "</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "<p class='error'>Failed to register user.</p>";
}
?>

<!-- CSS  -->
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f9f9f9;
        margin: 20px;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    h2 {
        color: #333;
    }
    .error {
        color: red;
        background-color: #ffe6e6;
        padding: 10px;
        border: 1px solid red;
        border-radius: 5px;
        margin-bottom: 20px;
    }
    .success {
        color: green;
        background-color: #e6ffe6;
        padding: 10px;
        border: 1px solid green;
        border-radius: 5px;
        margin-bottom: 20px;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }
    th, td {
        border: 1px solid #ccc;
        padding: 8px;
        text-align: left;
    }
    th {
        background-color: #f2f2f2;
    }
    a {
        color: blue;
        text-decoration: underline;
    }
    a:hover {
        text-decoration: none;
    }
</style>
