# Investment Management Application

This is a Laravel-based application to help users manage their investments. The app supports managing different types of investments including Fixed Deposits, Properties, and Stocks. It also provides a dashboard with a pie chart visualization of the total investments in each category.

## Features

- **Manage Fixed Deposits**: Add, edit, and delete fixed deposit records.
- **Manage Properties**: Add, edit, and delete property records.
- **Track Stocks**: Add, edit, and delete stock records with purchase price and quantity.
- **Dashboard**: Visual representation of total investments with pie charts.

## Installation

To get started with the project, follow these steps:

### 1. Clone the Repository
Clone the repository to your local machine using Git:

git clone https://github.com/jay262422/php_laravel_task.git

### 2. Install Dependencies
Navigate to the project folder and install the required dependencies:

cd investment-manag
composer install

### 3. Set Up Environment
Create a `.env` file by copying the example file and configuring your environment variables:

cp .env.example .env

Then, generate the application key:

php artisan key:generate

### 4. Database Setup
Make sure your database is set up correctly and then run the migrations to create the necessary tables:

php artisan migrate

### 5. Serve the Application
You can now start the application locally:

php artisan serve

The application will be available at `http://localhost:8000`.

## License
This project is open-source and available under the [MIT License](LICENSE).
