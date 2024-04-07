CREATE TABLE IF NOT EXISTS file_uploads (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  filename VARCHAR(255) NOT NULL,
  analysis TEXT,
  upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO file_uploads (filename, analysis) VALUES ('document1.txt', 'Positive');
INSERT INTO file_uploads (filename, analysis) VALUES ('document2.txt', 'Positive');
INSERT INTO file_uploads (filename, analysis) VALUES ('document3.txt', 'Negative');
INSERT INTO file_uploads (filename, analysis) VALUES ('document4.txt', 'Neutral');
INSERT INTO file_uploads (filename, analysis) VALUES ('document5.txt', 'Positive');
INSERT INTO file_uploads (filename, analysis) VALUES ('document6.txt', 'Negative');
INSERT INTO file_uploads (filename, analysis) VALUES ('document7.txt', 'Neutral');
INSERT INTO file_uploads (filename, analysis) VALUES ('document8.txt', 'Positive');
INSERT INTO file_uploads (filename, analysis) VALUES ('document9.txt', 'Negative');
INSERT INTO file_uploads (filename, analysis) VALUES ('document10.txt', 'Neutral');