CREATE TABLE IF NOT EXISTS vector_designs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    file_name VARCHAR(255) NOT NULL,
    uploaded_on DATETIME DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO vector_designs (file_name) VALUES ('logo1.svg');
INSERT INTO vector_designs (file_name) VALUES ('logo2.ai');
INSERT INTO vector_designs (file_name) VALUES ('design1.eps');
INSERT INTO vector_designs (file_name) VALUES ('design2.svg');
INSERT INTO vector_designs (file_name) VALUES ('logo3.ai');
INSERT INTO vector_designs (file_name) VALUES ('design3.eps');
INSERT INTO vector_designs (file_name) VALUES ('logo4.svg');
INSERT INTO vector_designs (file_name) VALUES ('design4.ai');
INSERT INTO vector_designs (file_name) VALUES ('design5.eps');
INSERT INTO vector_designs (file_name) VALUES ('design6.ai');
