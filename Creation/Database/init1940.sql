CREATE TABLE IF NOT EXISTS code_reviews (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  feature_name VARCHAR(50) NOT NULL,
  code_text TEXT NOT NULL,
  upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO code_reviews (feature_name, code_text) VALUES ('Feature A', 'Code for Feature A');
INSERT INTO code_reviews (feature_name, code_text) VALUES ('Feature B', 'Code for Feature B');
INSERT INTO code_reviews (feature_name, code_text) VALUES ('Feature C', 'Code for Feature C');
INSERT INTO code_reviews (feature_name, code_text) VALUES ('Feature D', 'Code for Feature D');
INSERT INTO code_reviews (feature_name, code_text) VALUES ('Feature E', 'Code for Feature E');
INSERT INTO code_reviews (feature_name, code_text) VALUES ('Feature F', 'Code for Feature F');
INSERT INTO code_reviews (feature_name, code_text) VALUES ('Feature G', 'Code for Feature G');
INSERT INTO code_reviews (feature_name, code_text) VALUES ('Feature H', 'Code for Feature H');
INSERT INTO code_reviews (feature_name, code_text) VALUES ('Feature I', 'Code for Feature I');
INSERT INTO code_reviews (feature_name, code_text) VALUES ('Feature J', 'Code for Feature J');
