-- --------------------------------------------------------
-- Step 1: Create the Database
-- --------------------------------------------------------
-- Database name: GROUP1
CREATE DATABASE IF NOT EXISTS GROUP1 CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE GROUP1;

-- --------------------------------------------------------
-- Step 2: Create the Users Table
-- --------------------------------------------------------
-- The `password` column is large enough to store the securely hashed password (up to 255 characters).

CREATE TABLE IF NOT EXISTS users (
    id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL, -- Stores the secure hash
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------
-- Step 3: Create a Dedicated MySQL User (Security Best Practice)
-- --------------------------------------------------------
-- Replace 'web_user' and 'STRONG_PASSWORD_HERE' with your secure credentials.
-- DO NOT use this password anywhere in your public repository.
CREATE USER 'web_user'@'localhost' IDENTIFIED BY 'STRONG_PASSWORD_HERE';

-- Grant this user all privileges on the GROUP1 database
GRANT ALL PRIVILEGES ON GROUP1.* TO 'web_user'@'localhost';

FLUSH PRIVILEGES;
-- --------------------------------------------------------