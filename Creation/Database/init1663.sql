CREATE TABLE customers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    contact_number VARCHAR(20) NOT NULL,
    address VARCHAR(255) NOT NULL,
    registered_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO customers (name, email, contact_number, address, registered_at) VALUES 
('John Doe', 'johndoe@example.com', '1234567890', '123 Main St, City, Country', '2024-04-01 08:00:00'),
('Jane Smith', 'janesmith@example.com', '9876543210', '456 Elm St, City, Country', '2024-04-02 09:00:00'),
('Alex Johnson', 'alexjohnson@example.com', '5551112222', '789 Oak St, City, Country', '2024-04-03 10:00:00'),
('Sarah Brown', 'sarahbrown@example.com', '7778889999', '321 Pine St, City, Country', '2024-04-04 11:00:00'),
('Michael White', 'michaelwhite@example.com', '4443332222', '654 Birch St, City, Country', '2024-04-05 12:00:00'),
('Emily Davis', 'emilydavis@example.com', '2223334444', '987 Cedar St, City, Country', '2024-04-06 13:00:00'),
('David Lee', 'davidlee@example.com', '8889990000', '159 Willow St, City, Country', '2024-04-07 14:00:00'),
('Olivia Clark', 'oliviaclark@example.com', '6665554444', '741 Maple St, City, Country', '2024-04-08 15:00:00'),
('Daniel King', 'danielking@example.com', '1239876543', '963 Oak St, City, Country', '2024-04-09 16:00:00'),
('Sophia Turner', 'sophiaturner@example.com', '6549873210', '357 Pine St, City, Country', '2024-04-10 17:00:00');
