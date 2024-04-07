CREATE TABLE IF NOT EXISTS vector_designs (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
filename VARCHAR(255) NOT NULL,
upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO vector_designs (filename) VALUES ('logo1.svg');
INSERT INTO vector_designs (filename) VALUES ('logo2.ai');
INSERT INTO vector_designs (filename) VALUES ('logo3.eps');
INSERT INTO vector_designs (filename) VALUES ('toy1.svg');
INSERT INTO vector_designs (filename) VALUES ('toy2.ai');
INSERT INTO vector_designs (filename) VALUES ('toy3.eps');
INSERT INTO vector_designs (filename) VALUES ('art1.svg');
INSERT INTO vector_designs (filename) VALUES ('art2.ai');
INSERT INTO vector_designs (filename) VALUES ('art3.eps');
INSERT INTO vector_designs (filename) VALUES ('design1.svg');