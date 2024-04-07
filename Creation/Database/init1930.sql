CREATE TABLE IF NOT EXISTS code_reviews (
    id INT AUTO_INCREMENT PRIMARY KEY,
    feature_name VARCHAR(255) NOT NULL,
    source_code TEXT NOT NULL,
    reviewer_comments TEXT,
    submitted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO code_reviews (feature_name, source_code) VALUES ('Feature 1', 'Sample source code 1');
INSERT INTO code_reviews (feature_name, source_code) VALUES ('Feature 2', 'Sample source code 2');
INSERT INTO code_reviews (feature_name, source_code) VALUES ('Feature 3', 'Sample source code 3');
INSERT INTO code_reviews (feature_name, source_code) VALUES ('Feature 4', 'Sample source code 4');
INSERT INTO code_reviews (feature_name, source_code) VALUES ('Feature 5', 'Sample source code 5');
INSERT INTO code_reviews (feature_name, source_code) VALUES ('Feature 6', 'Sample source code 6');
INSERT INTO code_reviews (feature_name, source_code) VALUES ('Feature 7', 'Sample source code 7');
INSERT INTO code_reviews (feature_name, source_code) VALUES ('Feature 8', 'Sample source code 8');
INSERT INTO code_reviews (feature_name, source_code) VALUES ('Feature 9', 'Sample source code 9');
INSERT INTO code_reviews (feature_name, source_code) VALUES ('Feature 10', 'Sample source code 10');
