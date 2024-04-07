CREATE TABLE IF NOT EXISTS uploaded_files (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    sentiment VARCHAR(255) NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO uploaded_files (filename, sentiment) VALUES ('document1.txt', 'Positive');
INSERT INTO uploaded_files (filename, sentiment) VALUES ('document2.txt', 'Negative');
INSERT INTO uploaded_files (filename, sentiment) VALUES ('document3.txt', 'Neutral');
INSERT INTO uploaded_files (filename, sentiment) VALUES ('document4.txt', 'Positive');
INSERT INTO uploaded_files (filename, sentiment) VALUES ('document5.txt', 'Positive');
INSERT INTO uploaded_files (filename, sentiment) VALUES ('document6.txt', 'Negative');
INSERT INTO uploaded_files (filename, sentiment) VALUES ('document7.txt', 'Neutral');
INSERT INTO uploaded_files (filename, sentiment) VALUES ('document8.txt', 'Positive');
INSERT INTO uploaded_files (filename, sentiment) VALUES ('document9.txt', 'Negative');
INSERT INTO uploaded_files (filename, sentiment) VALUES ('document10.txt', 'Positive');
