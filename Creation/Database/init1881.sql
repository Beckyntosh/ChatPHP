-- Create users table
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    UNIQUE KEY unique_email (email)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Create browsing history table
CREATE TABLE IF NOT EXISTS browsing_history (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    product_id INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Create products table
CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insert sample data into users table
INSERT INTO users (email, password) VALUES 
('user1@example.com', '$2y$10$2RnVjdhJghpN39nLiajnqOqFgWhQixtwh/kKQmXklQpAvtB63PC.O'),
('user2@example.com', '$2y$10$RRR7IWF6ykVeKPTEpwRomOjkXyPuX7Pd3eJuL0at8zzRwNRXQf9Fy'),
('user3@example.com', '$2y$10$Hb.L0zDGFy5oyeAeJBlysehem0TnOJBuTn8Iht6qJIDSwJWTTytde'),
('user4@example.com', '$2y$10$7LAhGZWUbLl9iOfTekQJ9eG8JWffcCFaPRq9qo.d2SspBdX7oC3LO'),
('user5@example.com', '$2y$10$V9yO07kduZExBLXSdTmV.eLujSEZch8eMN1W3PINRRBeA0149KO3O');

-- Insert sample data into products table
INSERT INTO products (title, description) VALUES 
('Pet Food', 'Premium pet food for optimum health'),
('Pet Toys', 'Interactive toys for fun playtime'),
('Pet Beds', 'Comfortable and cozy beds for pets'),
('Pet Grooming Kit', 'Tools and products for grooming your pet'),
('Pet Accessories', 'Stylish accessories for pets'),
('Pet Treats', 'Delicious treats for rewarding your pet'),
('Pet Collars', 'Stylish and durable collars for pets'),
('Pet Carriers', 'Convenient carriers for transporting pets'),
('Pet Bowls', 'Durable bowls for feeding pets'),
('Pet Training Pads', 'Absorbent pads for pet training');
