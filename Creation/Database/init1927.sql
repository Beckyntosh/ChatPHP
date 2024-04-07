CREATE TABLE IF NOT EXISTS code_reviews (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(30) NOT NULL,
code TEXT NOT NULL,
submitted_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
status VARCHAR(10) NOT NULL DEFAULT 'pending'
);

INSERT INTO code_reviews (title, code) VALUES ('Feature X review', 'Example code for feature X');
INSERT INTO code_reviews (title, code) VALUES ('Bug fix review', 'Code for fixing bug');
INSERT INTO code_reviews (title, code) VALUES ('New functionality review', 'Code for new feature');
INSERT INTO code_reviews (title, code) VALUES ('Optimization review', 'Code optimization');
INSERT INTO code_reviews (title, code) VALUES ('Security review', 'Code security check');
INSERT INTO code_reviews (title, code) VALUES ('UI enhancement review', 'Code for UI improvements');
INSERT INTO code_reviews (title, code) VALUES ('Performance review', 'Code performance analysis');
INSERT INTO code_reviews (title, code) VALUES ('Database schema review', 'Code for database schema changes');
INSERT INTO code_reviews (title, code) VALUES ('API integration review', 'Code for API integration');
INSERT INTO code_reviews (title, code) VALUES ('Test coverage review', 'Code for test coverage improvements');
