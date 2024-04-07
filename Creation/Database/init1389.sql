CREATE TABLE orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_type VARCHAR(100) NOT NULL,
    custom_size VARCHAR(50) NOT NULL
);

INSERT INTO orders (product_type, custom_size) VALUES ('wooden dining table', 'custom-sized');
INSERT INTO orders (product_type, custom_size) VALUES ('skateboard', 'standard');
INSERT INTO orders (product_type, custom_size) VALUES ('coffee table', 'large');
INSERT INTO orders (product_type, custom_size) VALUES ('bookshelf', 'small');
INSERT INTO orders (product_type, custom_size) VALUES ('office chair', 'adjustable');
INSERT INTO orders (product_type, custom_size) VALUES ('bed frame', 'queen-sized');
INSERT INTO orders (product_type, custom_size) VALUES ('desk', 'L-shaped');
INSERT INTO orders (product_type, custom_size) VALUES ('sofa', '3-seater');
INSERT INTO orders (product_type, custom_size) VALUES ('dining chairs', 'set of 4');
INSERT INTO orders (product_type, custom_size) VALUES ('rug', '8x10');
