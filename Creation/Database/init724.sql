CREATE TABLE products (
    product_id INT AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(255) NOT NULL
);

CREATE TABLE ratings (
    rating_id INT AUTO_INCREMENT PRIMARY KEY,
    rating INT NOT NULL,
    product_id INT NOT NULL,
    user_id INT NOT NULL,
    FOREIGN KEY (product_id) REFERENCES products(product_id)
);

INSERT INTO products (product_name) VALUES ('Product A'), ('Product B'), ('Product C'), ('Product D'), ('Product E'), ('Product F'), ('Product G'), ('Product H'), ('Product I'), ('Product J');

INSERT INTO ratings (rating, product_id, user_id) VALUES (3, 1, 1), (4, 2, 2), (5, 3, 3), (2, 4, 4), (3, 5, 5), (4, 6, 6), (5, 7, 7), (1, 8, 8), (2, 9, 9), (3, 10, 10);
