CREATE TABLE IF NOT EXISTS uploaded_zip_files (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    file_name VARCHAR(255) NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO uploaded_zip_files (file_name) VALUES ('Project Alpha.zip');
INSERT INTO uploaded_zip_files (file_name) VALUES ('Research Documents.zip');
INSERT INTO uploaded_zip_files (file_name) VALUES ('Presentation Files.zip');
INSERT INTO uploaded_zip_files (file_name) VALUES ('Data Analysis.zip');
INSERT INTO uploaded_zip_files (file_name) VALUES ('Thesis Draft.zip');
INSERT INTO uploaded_zip_files (file_name) VALUES ('Conference Papers.zip');
INSERT INTO uploaded_zip_files (file_name) VALUES ('Literature Review.zip');
INSERT INTO uploaded_zip_files (file_name) VALUES ('Experiment Results.zip');
INSERT INTO uploaded_zip_files (file_name) VALUES ('Project Beta.zip');
INSERT INTO uploaded_zip_files (file_name) VALUES ('Case Studies.zip');
