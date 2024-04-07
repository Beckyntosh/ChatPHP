CREATE TABLE IF NOT EXISTS licenses (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
filename VARCHAR(255) NOT NULL,
upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO licenses (filename) VALUES ("example1.jpg");
INSERT INTO licenses (filename) VALUES ("example2.png");
INSERT INTO licenses (filename) VALUES ("example3.jpeg");
INSERT INTO licenses (filename) VALUES ("example4.jpg");
INSERT INTO licenses (filename) VALUES ("example5.png");
INSERT INTO licenses (filename) VALUES ("example6.gif");
INSERT INTO licenses (filename) VALUES ("example7.jpg");
INSERT INTO licenses (filename) VALUES ("example8.png");
INSERT INTO licenses (filename) VALUES ("example9.jpeg");
INSERT INTO licenses (filename) VALUES ("example10.jpg");
