USE my_db

-- Create users table
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(180) UNIQUE NOT NULL,
    email VARCHAR(180) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('User', 'Admin') NOT NULL DEFAULT 'User'
);

-- Insert default admin user
INSERT INTO users (username, email, password, role) VALUES ('admin', 'test@email.com', '1234', 'Admin');
INSERT INTO users (username, email, password, role) VALUES ('guest', 'testguest@email.com', '$2y$10$zEt23KOCJnFf2boJr4YHpO7j9dbYufzgPXGvoVe5LCIoYWkVNHZ52', 'User');

-- Create additional table and insert data
CREATE TABLE other_table (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL
);

INSERT INTO other_table (name) VALUES ('Some Data');
