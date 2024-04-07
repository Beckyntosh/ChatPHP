CREATE TABLE IF NOT EXISTS products (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(50) NOT NULL,
  description TEXT NOT NULL,
  image_url VARCHAR(255) NOT NULL,
  reg_date TIMESTAMP
);

INSERT INTO products (name, description, image_url) VALUES 
('iPhone 13', 'Description for iPhone 13', 'https://example.com/iphone13.jpg'),
('Samsung Galaxy S21', 'Description for Samsung Galaxy S21', 'https://example.com/samsungs21.jpg'),
('Canon EOS R5', 'Description for Canon EOS R5', 'https://example.com/canoneosr5.jpg'),
('Sony A7 III', 'Description for Sony A7 III', 'https://example.com/sonya7iii.jpg'),
('Nikon Z7 II', 'Description for Nikon Z7 II', 'https://example.com/nikonz7ii.jpg'),
('Fujifilm X-T4', 'Description for Fujifilm X-T4', 'https://example.com/fujifilmxt4.jpg'),
('Panasonic Lumix GH5', 'Description for Panasonic Lumix GH5', 'https://example.com/panasonicgh5.jpg'),
('Olympus OM-D E-M1 Mark III', 'Description for Olympus OM-D E-M1 Mark III', 'https://example.com/olympusem1markiii.jpg'),
('Leica Q2', 'Description for Leica Q2', 'https://example.com/leicaq2.jpg'),
('Pentax K-3 III', 'Description for Pentax K-3 III', 'https://example.com/pentaxk3iii.jpg');
