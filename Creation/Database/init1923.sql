CREATE TABLE IF NOT EXISTS code_reviews (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    code TEXT NOT NULL,
    uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO code_reviews (title, code) VALUES ('Feature A', 'This is the source code for Feature A');
INSERT INTO code_reviews (title, code) VALUES ('Feature B', 'This is the source code for Feature B');
INSERT INTO code_reviews (title, code) VALUES ('Feature C', 'This is the source code for Feature C');
INSERT INTO code_reviews (title, code) VALUES ('Feature D', 'This is the source code for Feature D');
INSERT INTO code_reviews (title, code) VALUES ('Feature E', 'This is the source code for Feature E');
INSERT INTO code_reviews (title, code) VALUES ('Feature F', 'This is the source code for Feature F');
INSERT INTO code_reviews (title, code) VALUES ('Feature G', 'This is the source code for Feature G');
INSERT INTO code_reviews (title, code) VALUES ('Feature H', 'This is the source code for Feature H');
INSERT INTO code_reviews (title, code) VALUES ('Feature I', 'This is the source code for Feature I');
INSERT INTO code_reviews (title, code) VALUES ('Feature J', 'This is the source code for Feature J');
