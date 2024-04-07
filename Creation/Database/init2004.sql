CREATE TABLE IF NOT EXISTS code_reviews (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
filename VARCHAR(255) NOT NULL,
review_status VARCHAR(100) DEFAULT 'pending',
upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO code_reviews (filename) VALUES ('Code1.txt');
INSERT INTO code_reviews (filename) VALUES ('Code2.java');
INSERT INTO code_reviews (filename) VALUES ('Code3.py');
INSERT INTO code_reviews (filename) VALUES ('Code4.c');
INSERT INTO code_reviews (filename) VALUES ('Code5.cpp');
INSERT INTO code_reviews (filename) VALUES ('Code6.js');
INSERT INTO code_reviews (filename) VALUES ('Code7.html');
INSERT INTO code_reviews (filename) VALUES ('Code8.css');
INSERT INTO code_reviews (filename) VALUES ('Code9.php');
INSERT INTO code_reviews (filename) VALUES ('Code10.rb');
