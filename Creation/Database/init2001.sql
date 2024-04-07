CREATE TABLE IF NOT EXISTS Images (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    filepath VARCHAR(255) NOT NULL,
    upload_time TIMESTAMP
);

INSERT INTO Images (filename, filepath) VALUES ('landscape1.jpg', 'uploads/landscape1.jpg');
INSERT INTO Images (filename, filepath) VALUES ('landscape2.jpg', 'uploads/landscape2.jpg');
INSERT INTO Images (filename, filepath) VALUES ('landscape3.jpg', 'uploads/landscape3.jpg');
INSERT INTO Images (filename, filepath) VALUES ('landscape4.jpg', 'uploads/landscape4.jpg');
INSERT INTO Images (filename, filepath) VALUES ('landscape5.jpg', 'uploads/landscape5.jpg');
INSERT INTO Images (filename, filepath) VALUES ('landscape6.jpg', 'uploads/landscape6.jpg');
INSERT INTO Images (filename, filepath) VALUES ('landscape7.jpg', 'uploads/landscape7.jpg');
INSERT INTO Images (filename, filepath) VALUES ('landscape8.jpg', 'uploads/landscape8.jpg');
INSERT INTO Images (filename, filepath) VALUES ('landscape9.jpg', 'uploads/landscape9.jpg');
INSERT INTO Images (filename, filepath) VALUES ('landscape10.jpg', 'uploads/landscape10.jpg');
