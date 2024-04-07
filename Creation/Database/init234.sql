CREATE TABLE IF NOT EXISTS code_reviews (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
filename VARCHAR(255) NOT NULL,
review_status VARCHAR(50),
submission_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
code TEXT
);

INSERT INTO code_reviews (filename, review_status, code) VALUES ('file1.txt', 'pending', 'Code snippet 1');
INSERT INTO code_reviews (filename, review_status, code) VALUES ('file2.txt', 'pending', 'Code snippet 2');
INSERT INTO code_reviews (filename, review_status, code) VALUES ('file3.txt', 'pending', 'Code snippet 3');
INSERT INTO code_reviews (filename, review_status, code) VALUES ('file4.txt', 'pending', 'Code snippet 4');
INSERT INTO code_reviews (filename, review_status, code) VALUES ('file5.txt', 'pending', 'Code snippet 5');
INSERT INTO code_reviews (filename, review_status, code) VALUES ('file6.txt', 'pending', 'Code snippet 6');
INSERT INTO code_reviews (filename, review_status, code) VALUES ('file7.txt', 'pending', 'Code snippet 7');
INSERT INTO code_reviews (filename, review_status, code) VALUES ('file8.txt', 'pending', 'Code snippet 8');
INSERT INTO code_reviews (filename, review_status, code) VALUES ('file9.txt', 'pending', 'Code snippet 9');
INSERT INTO code_reviews (filename, review_status, code) VALUES ('file10.txt', 'pending', 'Code snippet 10');