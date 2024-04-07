CREATE TABLE IF NOT EXISTS code_reviews (
    id INT AUTO_INCREMENT PRIMARY KEY,
    feature_name VARCHAR(255) NOT NULL,
    source_code TEXT NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO code_reviews (feature_name, source_code) VALUES ('Feature A', 'Source code A');
INSERT INTO code_reviews (feature_name, source_code) VALUES ('Feature B', 'Source code B');
INSERT INTO code_reviews (feature_name, source_code) VALUES ('Feature C', 'Source code C');
INSERT INTO code_reviews (feature_name, source_code) VALUES ('Feature D', 'Source code D');
INSERT INTO code_reviews (feature_name, source_code) VALUES ('Feature E', 'Source code E');
INSERT INTO code_reviews (feature_name, source_code) VALUES ('Feature F', 'Source code F');
INSERT INTO code_reviews (feature_name, source_code) VALUES ('Feature G', 'Source code G');
INSERT INTO code_reviews (feature_name, source_code) VALUES ('Feature H', 'Source code H');
INSERT INTO code_reviews (feature_name, source_code) VALUES ('Feature I', 'Source code I');
INSERT INTO code_reviews (feature_name, source_code) VALUES ('Feature J', 'Source code J');
