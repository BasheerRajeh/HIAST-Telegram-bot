# HIAST Telegram Bot - Admin Page

![HIAST Logo](https://hiast.edu.sy/sites/default/files/hiast-logo-ar4_0_3.png)

## Project Description

This PHP application is built using Laravel 7 and is designed to create a Telegram Bot Admin Page for the Higher Institute for Applied Sciences and Technology (HIAST) (https://hiast.edu.sy/). The Telegram bot provides various services for students, making their university life more convenient and accessible.

## Features

- User-friendly interface for managing the Telegram bot
- Integration with HIAST's existing systems and databases
- Secure authentication and authorization for admins
- Wide range of student services, including course registration, exam schedules, and more

## Database Structure

The database structure for this application can be found at the following link: https://github.com/BasheerRajeh/HIAST-Telegram-bot/blob/main/database.png

## Installation & Setup

1. Clone the repository:
   ```
   git clone https://github.com/BasheerRajeh/HIAST-Telegram-bot.git
   ```
2. Navigate to the project folder and install the required dependencies using Composer:
   ```
   cd HIAST-Telegram-bot
   composer install
   ```
3. Create a copy of the `.env.example` file and rename it to `.env`:
   ```
   cp .env.example .env
   ```
4. Generate an application encryption key:
   ```
   php artisan key:generate
   ```
5. Configure your database settings in the `.env` file.

6. Migrate and seed the database:
   ```
   php artisan migrate --seed
   ```
7. Set up a local development server:
   ```
   php artisan serve
   ```
8. Visit `http://127.0.0.1:8000` in your web browser to access the admin panel.

## Usage

1. Log in to the admin panel using the credentials provided during installation.

2. Navigate to the Telegram bot management section to add, edit, or remove bot functionalities.

3. Use the provided tools to monitor and manage student services, such as course registrations and exam schedules.

4. Keep track of important metrics and statistics to ensure the smooth operation of the Telegram bot.

## Contributing

Contributions are welcome. To contribute, please follow these steps:

1. Fork the project repository.

2. Create a new branch for your feature or bug fix.

3. Commit your changes and push them to your fork.

4. Open a pull request with a clear description of your changes.

## License

This project is licensed under the [MIT License](https://opensource.org/licenses/MIT).
