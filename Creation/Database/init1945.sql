CREATE TABLE IF NOT EXISTS code_reviews (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    feature_name VARCHAR(50) NOT NULL,
    source_code TEXT NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO code_reviews (feature_name, source_code) VALUES ('Feature A', 'Sample code A');
INSERT INTO code_reviews (feature_name, source_code) VALUES ('Feature B', 'Sample code B');
INSERT INTO code_reviews (feature_name, source_code) VALUES ('Feature C', 'Sample code C');
INSERT INTO code_reviews (feature_name, source_code) VALUES ('Feature D', 'Sample code D');
INSERT INTO code_reviews (feature_name, source_code) VALUES ('Feature E', 'Sample code E');
INSERT INTO code_reviews (feature_name, source_code) VALUES ('Feature F', 'Sample code F');
INSERT INTO code_reviews (feature_name, source_code) VALUES ('Feature G', 'Sample code G');
INSERT INTO code_reviews (feature_name, source_code) VALUES ('Feature H', 'Sample code H');
INSERT INTO code_reviews (feature_name, source_code) VALUES ('Feature I', 'Sample code I');
INSERT INTO code_reviews (feature_name, source_code) VALUES ('Feature J', 'Sample code J');
