# User Registration with MongoDB

This project implements a simple user registration form using PHP and MongoDB. The form captures user details and validates input before storing them in a MongoDB database.

## Features

- User input validation
- Prevents duplicate ID numbers
- Displays registered users
- Responsive design

## Technologies Used

- PHP
- MongoDB
- HTML/CSS

## Installation Instructions

To set up this project locally, follow these steps:

### Prerequisites

- PHP 7.0 or higher
- Composer
- MongoDB installed and running locally

### Steps to Install

1. **Clone the Repository**
   ```bash
   git clone https://github.com/yourusername/repo-name.git
   cd repo-name

Install Dependencies Make sure you have Composer installed. Run the following command to install the required packages:
composer install

### Set Up MongoDB

Ensure your MongoDB server is running.
You can start MongoDB using:
``bash
mongod

The project will use a database named user_data and a collection named users. Ensure they are created or will be created automatically by the code.

### Run the Application
Run the Application Place the project files in your web server's root directory (e.g., htdocs for XAMPP). Access the application via your web browser at:
[pgp -S localhost:8000](http://localhost/path-to-your-project/index.php
)

### Usage
Fill in the user registration form with the required details.
Ensure the ID number is exactly 13 digits and the date of birth is in the format dd/mm/YYYY.
Click the POST button to submit the form.
If the ID number already exists, a notification will inform you, and the form will be repopulated with previously entered data.







