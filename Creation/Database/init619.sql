CREATE TABLE certificates (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    product_id INT NOT NULL,
    path VARCHAR(255) NOT NULL
);

INSERT INTO certificates (user_id, product_id, path) VALUES (1, 101, 'cert_1.pdf');
INSERT INTO certificates (user_id, product_id, path) VALUES (2, 102, 'cert_2.pdf');
INSERT INTO certificates (user_id, product_id, path) VALUES (3, 103, 'cert_3.pdf');
INSERT INTO certificates (user_id, product_id, path) VALUES (4, 104, 'cert_4.pdf');
INSERT INTO certificates (user_id, product_id, path) VALUES (5, 105, 'cert_5.pdf');
INSERT INTO certificates (user_id, product_id, path) VALUES (6, 106, 'cert_6.pdf');
INSERT INTO certificates (user_id, product_id, path) VALUES (7, 107, 'cert_7.pdf');
INSERT INTO certificates (user_id, product_id, path) VALUES (8, 108, 'cert_8.pdf');
INSERT INTO certificates (user_id, product_id, path) VALUES (9, 109, 'cert_9.pdf');
INSERT INTO certificates (user_id, product_id, path) VALUES (10, 110, 'cert_10.pdf');
