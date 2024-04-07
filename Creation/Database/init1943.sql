CREATE TABLE IF NOT EXISTS code_reviews (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    code TEXT NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO code_reviews (title, code) VALUES ('Review 1', 'Code 1');
INSERT INTO code_reviews (title, code) VALUES ('Review 2', 'Code 2');
INSERT INTO code_reviews (title, code) VALUES ('Review 3', 'Code 3');
INSERT INTO code_reviews (title, code) VALUES ('Review 4', 'Code 4');
INSERT INTO code_reviews (title, code) VALUES ('Review 5', 'Code 5');
INSERT INTO code_reviews (title, code) VALUES ('Review 6', 'Code 6');
INSERT INTO code_reviews (title, code) VALUES ('Review 7', 'Code 7');
INSERT INTO code_reviews (title, code) VALUES ('Review 8', 'Code 8');
INSERT INTO code_reviews (title, code) VALUES ('Review 9', 'Code 9');
INSERT INTO code_reviews (title, code) VALUES ('Review 10', 'Code 10');
