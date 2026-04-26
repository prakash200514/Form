<h1> Premium Auth System with OTP Verification </h1>

A robust, highly animated, and premium user authentication system built with PHP, MySQL, and PHPMailer. This system features mandatory email OTP (One-Time Password) verification to ensure secure user registration.

 🚀 Features

- **Premium UI/UX**: Featuring glassmorphism, animated backgrounds, and dynamic cartoon characters.
- **Secure Registration**: User signup with password hashing (Bcrypt).
- **Email OTP Verification**: Mandatory verification step using SMTP (PHPMailer).
- **Secure Login**: Session-based authentication system.
- **Responsive Dashboard**: User-specific dashboard upon successful login.
- **Security**: PDO-based database interactions to prevent SQL injection.
- **Logging**: Integrated debug logging for OTP and SMTP processes.

🛠️ Technology Stack

- **Backend**: PHP 8.x
- **Database**: MySQL
- **Frontend**: HTML5, CSS3 (Vanilla), JavaScript
- **Email Delivery**: PHPMailer
- **Server**: XAMPP / WAMP / Apache

## 📋 Prerequisites

- PHP >= 7.4
- MySQL Server
- Composer (for PHPMailer dependencies)
- Gmail Account (for SMTP) with App Password enabled

## 🔧 Installation & Setup

1. **Clone the Repository**:
   ```bash
   git clone <repository-url>
   cd "Signup FORM"
   ```

2. **Database Setup**:
   - Open PHPMyAdmin or your MySQL client.
   - Create a database named `otp_verification_system`.
   - Import the `setup_db.sql` file provided in the root directory.

3. **Configure Environment**:
   - Open `config.php`.
   - Update the Database credentials:
     ```php
     define('DB_HOST', 'localhost');
     define('DB_NAME', 'otp_verification_system');
     define('DB_USER', 'root');
     define('DB_PASS', 'your_password');
     ```
   - Update the SMTP credentials (using Gmail App Password):
     ```php
     define('SMTP_USER', 'your_email@gmail.com');
     define('SMTP_PASS', 'your_app_password');
     ```

4. **Install Dependencies**:
   If the `vendor` folder is missing, run:
   ```bash
   composer install
   ```

5. **Run the Application**:
   - Move the project to your web server directory (e.g., `C:\xampp\htdocs\`).
   - Access it via `http://localhost/Signup%20FORM/index.php`.

## 📂 Project Structure

- `index.php` - Entry point with premium animations.
- `register.php` - User registration logic and UI.
- `verify.php` - OTP verification interface.
- `login.php` - Secure login page.
- `dashboard.php` - Protected user area.
- `functions.php` - Core logic for OTP generation and email sending.
- `config.php` - Global configuration and database connection.
- `style.css` - Custom design system and animations.
- `setup_db.sql` - Database schema and table structures.

## 🛡️ Security Features

- **Password Hashing**: Uses `password_hash()` for secure storage.
- **SQL Injection Prevention**: Uses PDO Prepared Statements.
- **Session Management**: Secure session handling for authenticated users.
- **OTP Expiry**: Temporary OTP storage with expiration logic.

## 📝 License

This project is open-source and available under the [MIT License](LICENSE).

---
Built with ❤️ by **PRAKASH**
