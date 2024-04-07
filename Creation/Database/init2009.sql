CREATE TABLE IF NOT EXISTS vector_uploads (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    file_name VARCHAR(255) NOT NULL,
    upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO vector_uploads (file_name) VALUES ('company_logo1.ai');
INSERT INTO vector_uploads (file_name) VALUES ('company_logo2.eps');
INSERT INTO vector_uploads (file_name) VALUES ('company_logo3.svg');
INSERT INTO vector_uploads (file_name) VALUES ('company_logo4.pdf');
INSERT INTO vector_uploads (file_name) VALUES ('company_logo5.ai');
INSERT INTO vector_uploads (file_name) VALUES ('company_logo6.eps');
INSERT INTO vector_uploads (file_name) VALUES ('company_logo7.svg');
INSERT INTO vector_uploads (file_name) VALUES ('company_logo8.pdf');
INSERT INTO vector_uploads (file_name) VALUES ('company_logo9.ai');
INSERT INTO vector_uploads (file_name) VALUES ('company_logo10.eps');
