CREATE TABLE IF NOT EXISTS vector_designs (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    file_name VARCHAR(255) NOT NULL,
    uploaded_on TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO vector_designs (file_name) VALUES ('logo1.svg');
INSERT INTO vector_designs (file_name) VALUES ('logo2.ai');
INSERT INTO vector_designs (file_name) VALUES ('logo3.eps');
INSERT INTO vector_designs (file_name) VALUES ('design1.svg');
INSERT INTO vector_designs (file_name) VALUES ('design2.ai');
INSERT INTO vector_designs (file_name) VALUES ('design3.eps');
INSERT INTO vector_designs (file_name) VALUES ('image1.svg');
INSERT INTO vector_designs (file_name) VALUES ('image2.ai');
INSERT INTO vector_designs (file_name) VALUES ('image3.eps');
INSERT INTO vector_designs (file_name) VALUES ('artwork1.svg');
