CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);

CREATE TABLE reviews (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    product_id INT NOT NULL,
    rating INT NOT NULL,
    content TEXT,
    FOREIGN KEY (user_id) REFERENCES products(id),
    FOREIGN KEY (product_id) REFERENCES products(id)
);

INSERT INTO products (name) VALUES ('Product A');
INSERT INTO products (name) VALUES ('Product B');
INSERT INTO products (name) VALUES ('Product C');
INSERT INTO products (name) VALUES ('Product D');
INSERT INTO products (name) VALUES ('Product E');
INSERT INTO products (name) VALUES ('Product F');
INSERT INTO products (name) VALUES ('Product G');
INSERT INTO products (name) VALUES ('Product H');
INSERT INTO products (name) VALUES ('Product I');
INSERT INTO products (name) VALUES ('Product J');
