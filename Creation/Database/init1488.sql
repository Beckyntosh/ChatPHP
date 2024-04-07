CREATE TABLE clients (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone VARCHAR(255) NOT NULL
);

INSERT INTO clients (name, email, phone) VALUES
('Acme Corp', 'acme@example.com', '1234567890'),
('XYZ Company', 'xyz@example.com', '0987654321'),
('Best Inc', 'best@example.com', '5555555555'),
('Top Co', 'top@example.com', '9998887777'),
('Great Corp', 'great@example.com', '4443332222'),
('Super Ltd', 'super@example.com', '7777777777'),
('Alpha Corp', 'alpha@example.com', '2223334444'),
('Beta Ltd', 'beta@example.com', '9999999999'),
('Omega Co', 'omega@example.com', '1231231234'),
('Fantastic Inc', 'fantastic@example.com', '4567890123');
