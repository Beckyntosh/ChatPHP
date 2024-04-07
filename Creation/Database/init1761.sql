CREATE TABLE IF NOT EXISTS scanned_documents (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(255) NOT NULL,
size INT NOT NULL,
type VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO scanned_documents (name, size, type) VALUES ('document1.jpg', 1024, 'image/jpeg');
INSERT INTO scanned_documents (name, size, type) VALUES ('document2.jpeg', 2048, 'image/jpeg');
INSERT INTO scanned_documents (name, size, type) VALUES ('document3.gif', 3072, 'image/gif');
INSERT INTO scanned_documents (name, size, type) VALUES ('document4.png', 4096, 'image/png');
INSERT INTO scanned_documents (name, size, type) VALUES ('document5.jpg', 5120, 'image/jpeg');
INSERT INTO scanned_documents (name, size, type) VALUES ('document6.jpeg', 6144, 'image/jpeg');
INSERT INTO scanned_documents (name, size, type) VALUES ('document7.gif', 7168, 'image/gif');
INSERT INTO scanned_documents (name, size, type) VALUES ('document8.png', 8192, 'image/png');
INSERT INTO scanned_documents (name, size, type) VALUES ('document9.jpg', 9216, 'image/jpeg');
INSERT INTO scanned_documents (name, size, type) VALUES ('document10.jpeg', 10240, 'image/jpeg');

