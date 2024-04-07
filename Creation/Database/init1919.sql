CREATE TABLE IF NOT EXISTS code_reviews (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(30) NOT NULL,
    code TEXT NOT NULL,
    comment TEXT,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO code_reviews (title, code) VALUES ('Feature A', 'function a(){console.log("Feature A code")}');
INSERT INTO code_reviews (title, code) VALUES ('Feature B', 'class b{constructor(){console.log("Feature B code")}}');
INSERT INTO code_reviews (title, code) VALUES ('Feature C', 'function c(){console.log("Feature C code")}');
INSERT INTO code_reviews (title, code) VALUES ('Feature D', 'function d(){console.log("Feature D code")}');
INSERT INTO code_reviews (title, code) VALUES ('Feature E', 'function e(){console.log("Feature E code")}');
INSERT INTO code_reviews (title, code) VALUES ('Feature F', 'function f(){console.log("Feature F code")}');
INSERT INTO code_reviews (title, code) VALUES ('Feature G', 'class g{constructor(){console.log("Feature G code")}}');
INSERT INTO code_reviews (title, code) VALUES ('Feature H', 'function h(){console.log("Feature H code")}');
INSERT INTO code_reviews (title, code) VALUES ('Feature I', 'function i(){console.log("Feature I code")}');
INSERT INTO code_reviews (title, code) VALUES ('Feature J', 'function j(){console.log("Feature J code")}');
