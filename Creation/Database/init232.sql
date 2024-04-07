CREATE TABLE IF NOT EXISTS code_reviews (
    id INT AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    code LONGTEXT NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO code_reviews (filename, code) VALUES ('file1.txt', 'This is the code for file 1');
INSERT INTO code_reviews (filename, code) VALUES ('file2.txt', 'This is the code for file 2');
INSERT INTO code_reviews (filename, code) VALUES ('file3.txt', 'This is the code for file 3');
INSERT INTO code_reviews (filename, code) VALUES ('file4.txt', 'This is the code for file 4');
INSERT INTO code_reviews (filename, code) VALUES ('file5.txt', 'This is the code for file 5');
INSERT INTO code_reviews (filename, code) VALUES ('file6.txt', 'This is the code for file 6');
INSERT INTO code_reviews (filename, code) VALUES ('file7.txt', 'This is the code for file 7');
INSERT INTO code_reviews (filename, code) VALUES ('file8.txt', 'This is the code for file 8');
INSERT INTO code_reviews (filename, code) VALUES ('file9.txt', 'This is the code for file 9');
INSERT INTO code_reviews (filename, code) VALUES ('file10.txt', 'This is the code for file 10');
