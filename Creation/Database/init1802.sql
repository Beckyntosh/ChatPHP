CREATE TABLE IF NOT EXISTS uploaded_files (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
filename VARCHAR(255) NOT NULL,
analysis TEXT,
upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO uploaded_files (filename, analysis) VALUES ('document1.txt', 'Positive');
INSERT INTO uploaded_files (filename, analysis) VALUES ('document2.txt', 'Negative');
INSERT INTO uploaded_files (filename, analysis) VALUES ('document3.txt', 'Neutral');
INSERT INTO uploaded_files (filename, analysis) VALUES ('document4.txt', 'Positive');
INSERT INTO uploaded_files (filename, analysis) VALUES ('document5.txt', 'Negative');
INSERT INTO uploaded_files (filename, analysis) VALUES ('document6.txt', 'Positive');
INSERT INTO uploaded_files (filename, analysis) VALUES ('document7.txt', 'Neutral');
INSERT INTO uploaded_files (filename, analysis) VALUES ('document8.txt', 'Neutral');
INSERT INTO uploaded_files (filename, analysis) VALUES ('document9.txt', 'Positive');
INSERT INTO uploaded_files (filename, analysis) VALUES ('document10.txt', 'Negative');
