CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    google_id VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    first_name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO users (google_id, email, first_name, last_name) VALUES 
('123456', 'example1@gmail.com', 'John', 'Doe'),
('789012', 'example2@gmail.com', 'Jane', 'Smith'),
('345678', 'example3@gmail.com', 'Alice', 'Johnson'),
('901234', 'example4@gmail.com', 'Robert', 'Williams'),
('567890', 'example5@gmail.com', 'Emily', 'Brown'),
('123890', 'example6@gmail.com', 'Michael', 'Jones'),
('098765', 'example7@gmail.com', 'Sarah', 'Davis'),
('654321', 'example8@gmail.com', 'Kevin', 'Martinez'),
('765432', 'example9@gmail.com', 'Laura', 'Garcia'),
('321098', 'example10@gmail.com', 'Jason', 'Rodriguez');
