CREATE TABLE IF NOT EXISTS code_reviews (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    feature_name VARCHAR(50) NOT NULL,
    code LONGTEXT NOT NULL,
    status ENUM('pending', 'reviewed') NOT NULL DEFAULT 'pending',
    review LONGTEXT,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO code_reviews (feature_name, code) VALUES ('Feature A', 'Code A');
INSERT INTO code_reviews (feature_name, code) VALUES ('Feature B', 'Code B');
INSERT INTO code_reviews (feature_name, code) VALUES ('Feature C', 'Code C');
INSERT INTO code_reviews (feature_name, code) VALUES ('Feature D', 'Code D');
INSERT INTO code_reviews (feature_name, code) VALUES ('Feature E', 'Code E');
INSERT INTO code_reviews (feature_name, code) VALUES ('Feature F', 'Code F');
INSERT INTO code_reviews (feature_name, code) VALUES ('Feature G', 'Code G');
INSERT INTO code_reviews (feature_name, code) VALUES ('Feature H', 'Code H');
INSERT INTO code_reviews (feature_name, code) VALUES ('Feature I', 'Code I');
INSERT INTO code_reviews (feature_name, code) VALUES ('Feature J', 'Code J');
