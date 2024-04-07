CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    description TEXT,
    category VARCHAR(100),
    price DECIMAL(10, 2),
    stock_quantity INT
);

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30),
    name VARCHAR(30),
    email VARCHAR(50),
    password VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS voice_recordings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    file_path VARCHAR(255),
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO products (name, description, category, price, stock_quantity) VALUES
('Skateboard Deck', 'High-quality skateboard deck for tricks', 'Skateboard', 59.99, 100),
('Skateboard Wheels', 'Durable wheels for smooth rides', 'Skateboard Accessories', 29.99, 50),
('Skateboard Trucks', 'Solid trucks for stability and control', 'Skateboard Accessories', 39.99, 70),
('Skateboard Grip Tape', 'Grip tape for traction and control', 'Skateboard Accessories', 9.99, 150),
('Skateboard Bearings', 'Smooth bearings for speed', 'Skateboard Accessories', 19.99, 80);

INSERT INTO users (username, name, email, password) VALUES
('skater123', 'John Doe', 'john.doe@example.com', 'password123'),
('sk8rgirl', 'Jane Smith', 'jane.smith@example.com', 'letmein'),
('trick_master', 'Mike Johnson', 'mike.johnson@example.com', 'iloveskateboarding');

INSERT INTO voice_recordings (user_id, file_path) VALUES
(1, 'uploads/trick_description1.mp3'),
(2, 'uploads/trick_description2.mp3'),
(3, 'uploads/trick_description3.mp3');
