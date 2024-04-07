CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS images (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT,
    image_name VARCHAR(255),
    image_path VARCHAR(255),
    FOREIGN KEY (product_id) REFERENCES products(id)
);

INSERT INTO products (product_name) VALUES ('Shirt'), ('Dress'), ('Jeans'), ('Jacket'), ('Skirt'), ('Sweater'), ('Trousers'), ('Blouse'), ('Coat'), ('Shorts');

INSERT INTO images (product_id, image_name, image_path) VALUES 
(1, 'shirt1.jpg', 'uploads/shirt1.jpg'),
(2, 'dress1.jpg', 'uploads/dress1.jpg'),
(3, 'jeans1.jpg', 'uploads/jeans1.jpg'),
(4, 'jacket1.jpg', 'uploads/jacket1.jpg'),
(5, 'skirt1.jpg', 'uploads/skirt1.jpg'),
(6, 'sweater1.jpg', 'uploads/sweater1.jpg'),
(7, 'trousers1.jpg', 'uploads/trousers1.jpg'),
(8, 'blouse1.jpg', 'uploads/blouse1.jpg'),
(9, 'coat1.jpg', 'uploads/coat1.jpg'),
(10, 'shorts1.jpg', 'uploads/shorts1.jpg');
