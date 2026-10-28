-- Run this once in phpMyAdmin (on the ezyro_42941493_portfolio database)
-- to create the table that stores admin login accounts.

CREATE TABLE IF NOT EXISTS admins (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    created_at DATETIME NOT NULL
);
