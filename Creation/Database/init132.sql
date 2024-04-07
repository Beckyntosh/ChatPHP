CREATE TABLE custom_orders (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  customer_name VARCHAR(50) NOT NULL,
  email VARCHAR(50),
  details TEXT NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO custom_orders (customer_name, email, details) VALUES
('John Doe', 'johndoe@example.com', 'Need a custom dress for wedding event'),
('Jane Smith', 'janesmith@example.com', 'Custom jewelry order for anniversary'),
('Michael Johnson', 'michaeljohnson@example.com', 'Customized furniture for new apartment'),
('Sarah Brown', 'sarahbrown@example.com', 'Custom painting for living room'),
('David Wilson', 'davidwilson@example.com', 'Custom cake design for birthday party'),
('Emily Taylor', 'emilytaylor@example.com', 'Custom floral arrangements for event'),
('Daniel Martinez', 'danielmartinez@example.com', 'Custom logo design for business'),
('Anna White', 'annawhite@example.com', 'Custom print order for art project'),
('Peter Lee', 'peterlee@example.com', 'Custom software development services'),
('Laura Garcia', 'lauragarcia@example.com', 'Unique handmade gift for special occasion');