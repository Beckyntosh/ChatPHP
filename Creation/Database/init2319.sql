CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    joinLoyaltyProgram BOOLEAN
);

INSERT INTO users (name, email, password, joinLoyaltyProgram) VALUES 
('John Doe', 'john.doe@example.com', 'password1', 1),
('Jane Smith', 'jane.smith@example.com', 'password2', 0),
('Alice Johnson', 'alice.johnson@example.com', 'password3', 1),
('Bob Brown', 'bob.brown@example.com', 'password4', 0),
('Eva Wilson', 'eva.wilson@example.com', 'password5', 1),
('Michael Lee', 'michael.lee@example.com', 'password6', 0),
('Sarah Taylor', 'sarah.taylor@example.com', 'password7', 1),
('Daniel Clark', 'daniel.clark@example.com', 'password8', 0),
('Olivia White', 'olivia.white@example.com', 'password9', 1),
('Ryan Martinez', 'ryan.martinez@example.com', 'password10', 0);
