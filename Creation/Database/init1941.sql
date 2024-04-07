CREATE TABLE IF NOT EXISTS code_reviews (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
feature_name VARCHAR(30) NOT NULL,
code LONGTEXT NOT NULL,
review LONGTEXT,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO code_reviews (feature_name, code) VALUES ('Feature A', 'Source code A');
INSERT INTO code_reviews (feature_name, code) VALUES ('Feature B', 'Source code B');
INSERT INTO code_reviews (feature_name, code) VALUES ('Feature C', 'Source code C');
INSERT INTO code_reviews (feature_name, code) VALUES ('Feature D', 'Source code D');
INSERT INTO code_reviews (feature_name, code) VALUES ('Feature E', 'Source code E');
INSERT INTO code_reviews (feature_name, code) VALUES ('Feature F', 'Source code F');
INSERT INTO code_reviews (feature_name, code) VALUES ('Feature G', 'Source code G');
INSERT INTO code_reviews (feature_name, code) VALUES ('Feature H', 'Source code H');
INSERT INTO code_reviews (feature_name, code) VALUES ('Feature I', 'Source code I');
INSERT INTO code_reviews (feature_name, code) VALUES ('Feature J', 'Source code J');