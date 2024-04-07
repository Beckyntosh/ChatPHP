CREATE TABLE IF NOT EXISTS contacts (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    phone VARCHAR(20),
    reg_date TIMESTAMP
);

INSERT INTO contacts (firstname, lastname, email, phone, reg_date) VALUES
('John', 'Doe', 'john.doe@example.com', '1234567890', CURRENT_TIMESTAMP),
('Jane', 'Smith', 'jane.smith@example.com', '9876543210', CURRENT_TIMESTAMP),
('Mike', 'Johnson', 'mike.johnson@example.com', '4567891230', CURRENT_TIMESTAMP),
('Sarah', 'Williams', 'sarah.williams@example.com', '7890123456', CURRENT_TIMESTAMP),
('Chris', 'Brown', 'chris.brown@example.com', '2345678901', CURRENT_TIMESTAMP),
('Emily', 'Jones', 'emily.jones@example.com', '8901234567', CURRENT_TIMESTAMP),
('David', 'Taylor', 'david.taylor@example.com', '5678901234', CURRENT_TIMESTAMP),
('Jessica', 'Anderson', 'jessica.anderson@example.com', '0123456789', CURRENT_TIMESTAMP),
('Michael', 'Clark', 'michael.clark@example.com', '6789012345', CURRENT_TIMESTAMP),
('Maria', 'Martinez', 'maria.martinez@example.com', '3456789012', CURRENT_TIMESTAMP);
