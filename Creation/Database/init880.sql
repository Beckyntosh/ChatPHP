CREATE TABLE IF NOT EXISTS meetings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user VARCHAR(100),
    product VARCHAR(100),
    date DATE
);

-- Insert values into meetings table
INSERT INTO meetings (user, product, date) VALUES 
('John Doe', 'Football', '2023-10-15'),
('Alice Smith', 'Basketball', '2023-10-20'),
('Mike Johnson', 'Tennis', '2023-10-25'),
('Sarah Williams', 'Soccer', '2023-10-30'),
('Chris Brown', 'Golf', '2023-11-05'),
('Emily Davis', 'Swimming', '2023-11-10'),
('Alex White', 'Running', '2023-11-15'),
('Jessica Lee', 'Cycling', '2023-11-20'),
('Kevin Harris', 'Boxing', '2023-11-25'),
('Laura Taylor', 'Hiking', '2023-11-30');
