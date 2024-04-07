CREATE TABLE IF NOT EXISTS code_reviews (
    id INT AUTO_INCREMENT PRIMARY KEY,
    feature_name VARCHAR(255) NOT NULL,
    code_text TEXT NOT NULL,
    submitted DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS comments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    review_id INT NOT NULL,
    commenter VARCHAR(255) NOT NULL,
    comment TEXT NOT NULL,
    commented_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY(review_id) REFERENCES code_reviews(id) ON DELETE CASCADE
);

INSERT INTO code_reviews (feature_name, code_text) VALUES ('Feature 1', 'Source code for Feature 1');
INSERT INTO code_reviews (feature_name, code_text) VALUES ('Feature 2', 'Source code for Feature 2');
INSERT INTO code_reviews (feature_name, code_text) VALUES ('Feature 3', 'Source code for Feature 3');
INSERT INTO code_reviews (feature_name, code_text) VALUES ('Feature 4', 'Source code for Feature 4');
INSERT INTO code_reviews (feature_name, code_text) VALUES ('Feature 5', 'Source code for Feature 5');
INSERT INTO code_reviews (feature_name, code_text) VALUES ('Feature 6', 'Source code for Feature 6');
INSERT INTO code_reviews (feature_name, code_text) VALUES ('Feature 7', 'Source code for Feature 7');
INSERT INTO code_reviews (feature_name, code_text) VALUES ('Feature 8', 'Source code for Feature 8');
INSERT INTO code_reviews (feature_name, code_text) VALUES ('Feature 9', 'Source code for Feature 9');
INSERT INTO code_reviews (feature_name, code_text) VALUES ('Feature 10', 'Source code for Feature 10');