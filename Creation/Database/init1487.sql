CREATE TABLE clients (
    id INT AUTO_INCREMENT PRIMARY KEY,
    clientName VARCHAR(50) NOT NULL,
    contactName VARCHAR(50) NOT NULL,
    contactEmail VARCHAR(50) NOT NULL,
    contactPhone VARCHAR(20) NOT NULL
);

INSERT INTO clients (clientName, contactName, contactEmail, contactPhone) VALUES 
('Acme Corp', 'John Doe', 'johndoe@example.com', '123-456-7890'),
('XYZ Corp', 'Jane Smith', 'janesmith@example.com', '987-654-3210'),
('ABC Inc', 'Alice Johnson', 'alicejohnson@example.com', '456-789-0123'),
('123 Company', 'Bob Brown', 'bobbrown@example.com', '321-654-9870'),
('Tech Solutions', 'Sarah Green', 'sarahgreen@example.com', '789-012-3456'),
('Innovative Co', 'Tom White', 'tomwhite@example.com', '654-987-0123'),
('Global Enterprises', 'Emily Black', 'emilyblack@example.com', '235-453-6345'),
('Beta Corp', 'Mark Davis', 'markdavis@example.com', '987-345-1236'),
('New Ventures', 'Laura Hill', 'laurahill@example.com', '098-456-1237'),
('Future Ltd', 'Mike Grey', 'mikegrey@example.com', '657-098-2314');
