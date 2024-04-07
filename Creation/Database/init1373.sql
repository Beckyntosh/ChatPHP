CREATE TABLE orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    productName VARCHAR(255) NOT NULL,
    productSize VARCHAR(255) NOT NULL,
    quantity INT NOT NULL
);

INSERT INTO orders (productName, productSize, quantity) VALUES ('wooden dining table', '120x75 cm', 2);
INSERT INTO orders (productName, productSize, quantity) VALUES ('gaming chair', 'Large', 1);
INSERT INTO orders (productName, productSize, quantity) VALUES ('Nintendo Switch', 'Standard', 3);
INSERT INTO orders (productName, productSize, quantity) VALUES ('PlayStation 5', 'Standard', 1);
INSERT INTO orders (productName, productSize, quantity) VALUES ('Xbox Series X', 'Standard', 2);
INSERT INTO orders (productName, productSize, quantity) VALUES ('PC Gaming Mouse', 'Wired', 5);
INSERT INTO orders (productName, productSize, quantity) VALUES ('Game of Thrones Board Game', 'Standard', 1);
INSERT INTO orders (productName, productSize, quantity) VALUES ('Minecraft LEGO set', 'Small', 4);
INSERT INTO orders (productName, productSize, quantity) VALUES ('Nintendo Switch Pro Controller', 'Standard', 2);
INSERT INTO orders (productName, productSize, quantity) VALUES ('Call of Duty: Black Ops Cold War', 'PS4', 3);
