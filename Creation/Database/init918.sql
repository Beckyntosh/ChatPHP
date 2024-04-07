CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT NOT NULL
);

CREATE TABLE reviews (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT NOT NULL,
    rating INT NOT NULL,
    comment TEXT NOT NULL,
    FOREIGN KEY (product_id) REFERENCES products(id)
);

INSERT INTO products (name, description) VALUES
('Product A', 'Description A'),
('Product B', 'Description B'),
('Product C', 'Description C'),
('Product D', 'Description D'),
('Product E', 'Description E'),
('Product F', 'Description F'),
('Product G', 'Description G'),
('Product H', 'Description H'),
('Product I', 'Description I'),
('Product J', 'Description J');

INSERT INTO reviews (product_id, rating, comment) VALUES
(1, 4, 'Good product'),
(1, 3, 'Average product'),
(2, 5, 'Excellent product'),
(3, 2, 'Not satisfied'),
(4, 1, 'Poor quality'),
(5, 5, 'Highly recommended'),
(6, 3, 'Could be better'),
(7, 4, 'Impressed with the results'),
(8, 2, 'Disappointed with the purchase'),
(9, 5, 'Best product ever');
