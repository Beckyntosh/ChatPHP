CREATE TABLE IF NOT EXISTS code_reviews (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  feature_name VARCHAR(50) NOT NULL,
  code_text TEXT NOT NULL,
  status VARCHAR(20) DEFAULT 'pending',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO code_reviews (feature_name, code_text) VALUES ('Feature A', 'Sample code A');
INSERT INTO code_reviews (feature_name, code_text) VALUES ('Feature B', 'Sample code B');
INSERT INTO code_reviews (feature_name, code_text) VALUES ('Feature C', 'Sample code C');
INSERT INTO code_reviews (feature_name, code_text) VALUES ('Feature D', 'Sample code D');
INSERT INTO code_reviews (feature_name, code_text) VALUES ('Feature E', 'Sample code E');
INSERT INTO code_reviews (feature_name, code_text) VALUES ('Feature F', 'Sample code F');
INSERT INTO code_reviews (feature_name, code_text) VALUES ('Feature G', 'Sample code G');
INSERT INTO code_reviews (feature_name, code_text) VALUES ('Feature H', 'Sample code H');
INSERT INTO code_reviews (feature_name, code_text) VALUES ('Feature I', 'Sample code I');
INSERT INTO code_reviews (feature_name, code_text) VALUES ('Feature J', 'Sample code J');
