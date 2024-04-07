CREATE TABLE IF NOT EXISTS file_hashes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    hash VARCHAR(255) NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

INSERT INTO file_hashes (filename, hash) VALUES ('image1.jpg', 'hash1');
INSERT INTO file_hashes (filename, hash) VALUES ('image2.png', 'hash2');
INSERT INTO file_hashes (filename, hash) VALUES ('image3.jpeg', 'hash3');
INSERT INTO file_hashes (filename, hash) VALUES ('image4.gif', 'hash4');
INSERT INTO file_hashes (filename, hash) VALUES ('image5.jpg', 'hash5');
INSERT INTO file_hashes (filename, hash) VALUES ('image6.png', 'hash6');
INSERT INTO file_hashes (filename, hash) VALUES ('image7.jpeg', 'hash7');
INSERT INTO file_hashes (filename, hash) VALUES ('image8.gif', 'hash8');
INSERT INTO file_hashes (filename, hash) VALUES ('image9.jpg', 'hash9');
INSERT INTO file_hashes (filename, hash) VALUES ('image10.png', 'hash10');
