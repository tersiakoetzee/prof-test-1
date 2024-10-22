<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MongoDB User Form</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 20px;
            display: flex;
            flex-direction: column; 
            justify-content: center; 
            align-items: center; 
            height: 100vh;
            box-sizing: border-box;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            width: 100%; 
        }
        form {
            background: seashell;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 300px;
        }
        label {
            margin-bottom: 5px;
            display: block;
            font-weight: bold;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button {
            width: 48%;
            padding: 10px;
            border: none;
            border-radius: 4px;
            background-color: blue;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button[type="reset"] {
            background-color: orange;
        }
        button:hover {
            background-color: blue; 
        }
        button[type="reset"]:hover {
            background-color: red; 
        }
    </style>
</head>
<body>
    <h2>User Registration Form</h2>
    <form method="POST" action="submit.php">
        <label for="name">Name:</label>
        <input type="text" name="name" required>

        <label for="surname">Surname:</label>
        <input type="text" name="surname" required>

        <label for="id_number">ID Number:</label>
        <input type="text" name="id_number" required>

        <label for="dob">Date of Birth (dd/mm/YYYY):</label>
        <input type="text" name="dob" required>

        <button type="submit">POST</button>
        <button type="reset">CANCEL</button>
    </form>
</body>
</html>

