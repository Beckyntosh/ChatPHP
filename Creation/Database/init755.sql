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

INSERT INTO products (name, description, category, price, stock_quantity) VALUES
('Handbag 1', 'Stylish handbag in black color', 'Fashion', 59.99, 50),
('Handbag 2', 'Elegant red handbag with gold accents', 'Luxury', 79.99, 30),
('Handbag 3', 'Casual denim handbag with zipper', 'Casual', 29.99, 80),
('Handbag 4', 'Leather handbag with adjustable strap', 'Classic', 69.99, 40),
('Handbag 5', 'Trendy shoulder handbag in pastel colors', 'Trendy', 49.99, 60);

INSERT INTO users (username, name, email, password) VALUES
('john123', 'John Doe', 'john@example.com', 'password123'),
('jane456', 'Jane Smith', 'jane@example.com', 'securepass'),
('mike789', 'Mike Johnson', 'mike@example.com', 'mikepass'),
('sarah11', 'Sarah Lee', 'sarah@example.com', 'sarah123'),
('admin01', 'Admin User', 'admin@example.com', 'adminpass');