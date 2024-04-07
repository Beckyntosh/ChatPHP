CREATE TABLE IF NOT EXISTS code_reviews (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(255) NOT NULL,
code TEXT NOT NULL,
author VARCHAR(255),
submission_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO code_reviews (title, code, author) VALUES ('Feature A', 'Sample code A', 'Alice');
INSERT INTO code_reviews (title, code, author) VALUES ('Feature B', 'Sample code B', 'Bob');
INSERT INTO code_reviews (title, code, author) VALUES ('Feature C', 'Sample code C', 'Charlie');
INSERT INTO code_reviews (title, code, author) VALUES ('Feature D', 'Sample code D', 'David');
INSERT INTO code_reviews (title, code, author) VALUES ('Feature E', 'Sample code E', 'Eve');
INSERT INTO code_reviews (title, code, author) VALUES ('Feature F', 'Sample code F', 'Frank');
INSERT INTO code_reviews (title, code, author) VALUES ('Feature G', 'Sample code G', 'Grace');
INSERT INTO code_reviews (title, code, author) VALUES ('Feature H', 'Sample code H', 'Hannah');
INSERT INTO code_reviews (title, code, author) VALUES ('Feature I', 'Sample code I', 'Ian');
INSERT INTO code_reviews (title, code, author) VALUES ('Feature J', 'Sample code J', 'Jane');