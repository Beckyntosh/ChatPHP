CREATE TABLE code_reviews (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    feature_name VARCHAR(30) NOT NULL,
    code TEXT NOT NULL,
    status VARCHAR(10) DEFAULT 'PENDING',
    reg_date TIMESTAMP
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
