CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    brand VARCHAR(255) NOT NULL,
    description TEXT,
    image VARCHAR(255)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO products (name, brand, description, image) VALUES ('Sunglasses1', 'Brand1', 'Description1', 'image1.jpg');
INSERT INTO products (name, brand, description, image) VALUES ('Sunglasses2', 'Brand2', 'Description2', 'image2.jpg');
INSERT INTO products (name, brand, description, image) VALUES ('Sunglasses3', 'Brand3', 'Description3', 'image3.jpg');
INSERT INTO products (name, brand, description, image) VALUES ('Sunglasses4', 'Brand4', 'Description4', 'image4.jpg');
INSERT INTO products (name, brand, description, image) VALUES ('Sunglasses5', 'Brand5', 'Description5', 'image5.jpg');
INSERT INTO products (name, brand, description, image) VALUES ('Sunglasses6', 'Brand6', 'Description6', 'image6.jpg');
INSERT INTO products (name, brand, description, image) VALUES ('Sunglasses7', 'Brand7', 'Description7', 'image7.jpg');
INSERT INTO products (name, brand, description, image) VALUES ('Sunglasses8', 'Brand8', 'Description8', 'image8.jpg');
INSERT INTO products (name, brand, description, image) VALUES ('Sunglasses9', 'Brand9', 'Description9', 'image9.jpg');
INSERT INTO products (name, brand, description, image) VALUES ('Sunglasses10', 'Brand10', 'Description10', 'image10.jpg');
