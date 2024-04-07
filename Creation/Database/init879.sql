CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    license VARCHAR(255)
);

CREATE TABLE reviews (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    text TEXT,
    productId INT
);

INSERT INTO users (license) VALUES ('uploads/file1.jpg');
INSERT INTO users (license) VALUES ('uploads/file2.jpg');
INSERT INTO users (license) VALUES ('uploads/file3.jpg');
INSERT INTO users (license) VALUES ('uploads/file4.jpg');
INSERT INTO users (license) VALUES ('uploads/file5.jpg');
INSERT INTO users (license) VALUES ('uploads/file6.jpg');
INSERT INTO users (license) VALUES ('uploads/file7.jpg');
INSERT INTO users (license) VALUES ('uploads/file8.jpg');
INSERT INTO users (license) VALUES ('uploads/file9.jpg');
INSERT INTO users (license) VALUES ('uploads/file10.jpg');

INSERT INTO reviews (name, text, productId) VALUES ('User1', 'Good product', 1);
INSERT INTO reviews (name, text, productId) VALUES ('User2', 'Very useful', 2);
INSERT INTO reviews (name, text, productId) VALUES ('User3', 'Highly recommended', 3);
INSERT INTO reviews (name, text, productId) VALUES ('User4', 'Great quality', 4);
INSERT INTO reviews (name, text, productId) VALUES ('User5', 'Fast delivery', 5);
INSERT INTO reviews (name, text, productId) VALUES ('User6', 'Impressed', 6);
INSERT INTO reviews (name, text, productId) VALUES ('User7', 'Satisfied customer', 7);
INSERT INTO reviews (name, text, productId) VALUES ('User8', 'Excellent service', 8);
INSERT INTO reviews (name, text, productId) VALUES ('User9', 'Amazing experience', 9);
INSERT INTO reviews (name, text, productId) VALUES ('User10', 'Will buy again', 10);
