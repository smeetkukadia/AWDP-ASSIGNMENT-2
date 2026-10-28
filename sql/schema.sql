-- Run this once in phpMyAdmin (on the ezyro_42941493_portfolio database)
-- to create the table that stores contact form submissions.

CREATE TABLE IF NOT EXISTS contact_messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL,
    message TEXT NOT NULL,
    created_at DATETIME NOT NULL
);
