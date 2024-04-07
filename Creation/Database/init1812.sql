CREATE TABLE IF NOT EXISTS text_uploads (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    file_name VARCHAR(255) NOT NULL,
    file_path VARCHAR(255) NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO text_uploads (file_name, file_path) VALUES ('document1.txt', 'uploads/document1.txt');
INSERT INTO text_uploads (file_name, file_path) VALUES ('document2.txt', 'uploads/document2.txt');
INSERT INTO text_uploads (file_name, file_path) VALUES ('document3.txt', 'uploads/document3.txt');
INSERT INTO text_uploads (file_name, file_path) VALUES ('document4.txt', 'uploads/document4.txt');
INSERT INTO text_uploads (file_name, file_path) VALUES ('document5.txt', 'uploads/document5.txt');
INSERT INTO text_uploads (file_name, file_path) VALUES ('document6.txt', 'uploads/document6.txt');
INSERT INTO text_uploads (file_name, file_path) VALUES ('document7.txt', 'uploads/document7.txt');
INSERT INTO text_uploads (file_name, file_path) VALUES ('document8.txt', 'uploads/document8.txt');
INSERT INTO text_uploads (file_name, file_path) VALUES ('document9.txt', 'uploads/document9.txt');
INSERT INTO text_uploads (file_name, file_path) VALUES ('document10.txt', 'uploads/document10.txt');
