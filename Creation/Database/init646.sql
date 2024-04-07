CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fileName VARCHAR(255) NOT NULL,
    path VARCHAR(255) NOT NULL
);

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    productName VARCHAR(255) NOT NULL,
    price DECIMAL(10,2) NOT NULL
);

INSERT INTO users (fileName, path) VALUES ('file1.pdf', 'uploads/file1.pdf');
INSERT INTO users (fileName, path) VALUES ('file2.pdf', 'uploads/file2.pdf');
INSERT INTO users (fileName, path) VALUES ('file3.pdf', 'uploads/file3.pdf');
INSERT INTO users (fileName, path) VALUES ('file4.pdf', 'uploads/file4.pdf');
INSERT INTO users (fileName, path) VALUES ('file5.pdf', 'uploads/file5.pdf');
INSERT INTO users (fileName, path) VALUES ('file6.pdf', 'uploads/file6.pdf');
INSERT INTO users (fileName, path) VALUES ('file7.pdf', 'uploads/file7.pdf');
INSERT INTO users (fileName, path) VALUES ('file8.pdf', 'uploads/file8.pdf');
INSERT INTO users (fileName, path) VALUES ('file9.pdf', 'uploads/file9.pdf');
INSERT INTO users (fileName, path) VALUES ('file10.pdf', 'uploads/file10.pdf');

INSERT INTO products (productName, price) VALUES ('Product1', 10.99);
INSERT INTO products (productName, price) VALUES ('Product2', 20.50);
INSERT INTO products (productName, price) VALUES ('Product3', 15.75);
INSERT INTO products (productName, price) VALUES ('Product4', 30.00);
INSERT INTO products (productName, price) VALUES ('Product5', 25.49);
INSERT INTO products (productName, price) VALUES ('Product6', 5.99);
INSERT INTO products (productName, price) VALUES ('Product7', 8.75);
INSERT INTO products (productName, price) VALUES ('Product8', 12.00);
INSERT INTO products (productName, price) VALUES ('Product9', 18.99);
INSERT INTO products (productName, price) VALUES ('Product10', 22.50);

