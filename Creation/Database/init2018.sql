CREATE TABLE vector_files (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    file_name VARCHAR(255) NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO vector_files (file_name) VALUES ('Company_Logo1.svg');
INSERT INTO vector_files (file_name) VALUES ('Company_Logo2.ai');
INSERT INTO vector_files (file_name) VALUES ('Company_Logo3.eps');
INSERT INTO vector_files (file_name) VALUES ('Design1.svg');
INSERT INTO vector_files (file_name) VALUES ('Design2.ai');
INSERT INTO vector_files (file_name) VALUES ('Design3.eps');
INSERT INTO vector_files (file_name) VALUES ('Logo1.svg');
INSERT INTO vector_files (file_name) VALUES ('Logo2.ai');
INSERT INTO vector_files (file_name) VALUES ('Logo3.eps');
INSERT INTO vector_files (file_name) VALUES ('Graphic1.svg');