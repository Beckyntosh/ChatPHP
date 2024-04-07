CREATE TABLE IF NOT EXISTS documents (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
filename VARCHAR(255) NOT NULL,
upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO documents (filename) VALUES ('driver1.jpg');
INSERT INTO documents (filename) VALUES ('driver2.png');
INSERT INTO documents (filename) VALUES ('driver3.jpg');
INSERT INTO documents (filename) VALUES ('driver4.png');
INSERT INTO documents (filename) VALUES ('driver5.jpg');
INSERT INTO documents (filename) VALUES ('driver6.png');
INSERT INTO documents (filename) VALUES ('driver7.jpg');
INSERT INTO documents (filename) VALUES ('driver8.png');
INSERT INTO documents (filename) VALUES ('driver9.jpg');
INSERT INTO documents (filename) VALUES ('driver10.jpg');