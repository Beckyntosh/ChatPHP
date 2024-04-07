CREATE TABLE IF NOT EXISTS contacts (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50),
phone VARCHAR(20),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO contacts (firstname, lastname, email, phone) VALUES
('John', 'Doe', 'johndoe@example.com', '123-456-7890'),
('Jane', 'Smith', 'janesmith@example.com', '987-654-3210'),
('Alice', 'Johnson', 'alicejohnson@example.com', '555-123-4567'),
('Bob', 'Brown', 'bobbrown@example.com', '999-888-7777'),
('Sarah', 'Clark', 'sarahclark@example.com', '444-555-6666'),
('Michael', 'White', 'michaelwhite@example.com', '111-222-3333'),
('Emily', 'Davis', 'emilydavis@example.com', '777-666-5555'),
('Chris', 'Lee', 'chrislee@example.com', '888-999-0000'),
('Laura', 'Wilson', 'laurawilson@example.com', '222-333-4444'),
('Daniel', 'Martinez', 'danielmartinez@example.com', '666-777-8888');
