CREATE TABLE IF NOT EXISTS code_reviews (
  id INT AUTO_INCREMENT PRIMARY KEY,
  feature_name VARCHAR(255) NOT NULL,
  code TEXT NOT NULL,
  submitted_by VARCHAR(255),
  submission_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
INSERT INTO code_reviews (feature_name, code, submitted_by) VALUES ('Feature1', 'Code1', 'User1');
INSERT INTO code_reviews (feature_name, code, submitted_by) VALUES ('Feature2', 'Code2', 'User2');
INSERT INTO code_reviews (feature_name, code, submitted_by) VALUES ('Feature3', 'Code3', 'User3');
INSERT INTO code_reviews (feature_name, code, submitted_by) VALUES ('Feature4', 'Code4', 'User4');
INSERT INTO code_reviews (feature_name, code, submitted_by) VALUES ('Feature5', 'Code5', 'User5');
INSERT INTO code_reviews (feature_name, code, submitted_by) VALUES ('Feature6', 'Code6', 'User6');
INSERT INTO code_reviews (feature_name, code, submitted_by) VALUES ('Feature7', 'Code7', 'User7');
INSERT INTO code_reviews (feature_name, code, submitted_by) VALUES ('Feature8', 'Code8', 'User8');
INSERT INTO code_reviews (feature_name, code, submitted_by) VALUES ('Feature9', 'Code9', 'User9');
INSERT INTO code_reviews (feature_name, code, submitted_by) VALUES ('Feature10', 'Code10', 'User10');
