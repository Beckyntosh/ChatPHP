CREATE TABLE IF NOT EXISTS uploads (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
filename VARCHAR(255) NOT NULL,
analysis TEXT,
upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO uploads (filename, analysis) VALUES ('file1.txt', 'Example analysis result');
INSERT INTO uploads (filename, analysis) VALUES ('file2.txt', 'Example analysis result');
INSERT INTO uploads (filename, analysis) VALUES ('file3.txt', 'Example analysis result');
INSERT INTO uploads (filename, analysis) VALUES ('file4.txt', 'Example analysis result');
INSERT INTO uploads (filename, analysis) VALUES ('file5.txt', 'Example analysis result');
INSERT INTO uploads (filename, analysis) VALUES ('file6.txt', 'Example analysis result');
INSERT INTO uploads (filename, analysis) VALUES ('file7.txt', 'Example analysis result');
INSERT INTO uploads (filename, analysis) VALUES ('file8.txt', 'Example analysis result');
INSERT INTO uploads (filename, analysis) VALUES ('file9.txt', 'Example analysis result');
INSERT INTO uploads (filename, analysis) VALUES ('file10.txt', 'Example analysis result');