CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    google_id VARCHAR(30) NOT NULL,
    name VARCHAR(50),
    email VARCHAR(50),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO users (google_id, name, email) VALUES
('123456789', 'Alice Smith', 'alice@gmail.com'),
('987654321', 'Bob Johnson', 'bob@yahoo.com'),
('654123789', 'Charlie Brown', 'charlie@hotmail.com'),
('321987654', 'Diana Miller', 'diana@example.com'),
('789654123', 'Eva White', 'eva@domain.com'),
('456789123', 'Frank Black', 'frank@mail.com'),
('987123456', 'Grace Lee', 'grace@gmail.com'),
('123789456', 'Henry Davis', 'henry@yahoo.com'),
('654789123', 'Ivy Chang', 'ivy@hotmail.com'),
('987456321', 'Jack Martin', 'jack@example.com');
