CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP
);

CREATE TABLE IF NOT EXISTS coupons (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED,
    code VARCHAR(10),
    discount INT(3),
    FOREIGN KEY (user_id) REFERENCES users(id)
);

INSERT INTO users (firstname, lastname, email) VALUES 
('John', 'Doe', 'john.doe@example.com'),
('Alice', 'Smith', 'alice.smith@example.com'),
('Bob', 'Johnson', 'bob.johnson@example.com'),
('Emma', 'Brown', 'emma.brown@example.com'),
('Mike', 'Wilson', 'mike.wilson@example.com'),
('Sara', 'Jones', 'sara.jones@example.com'),
('Chris', 'Taylor', 'chris.taylor@example.com'),
('Laura', 'Davis', 'laura.davis@example.com'),
('Kevin', 'Miller', 'kevin.miller@example.com'),
('Rachel', 'White', 'rachel.white@example.com');

INSERT INTO coupons (user_id, code, discount) VALUES 
(1, 'WELCOME123', 10),
(2, 'WELCOME234', 10),
(3, 'WELCOME345', 10),
(4, 'WELCOME456', 10),
(5, 'WELCOME567', 10),
(6, 'WELCOME678', 10),
(7, 'WELCOME789', 10),
(8, 'WELCOME890', 10),
(9, 'WELCOME901', 10),
(10, 'WELCOME012', 10);
