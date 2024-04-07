CREATE TABLE IF NOT EXISTS uploaded_files (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Inserting values into the uploaded_files table
INSERT INTO uploaded_files (filename) VALUES ('Project Alpha.zip');
INSERT INTO uploaded_files (filename) VALUES ('Document1.zip');
INSERT INTO uploaded_files (filename) VALUES ('Report.zip');
INSERT INTO uploaded_files (filename) VALUES ('Presentation.zip');
INSERT INTO uploaded_files (filename) VALUES ('Photos.zip');
INSERT INTO uploaded_files (filename) VALUES ('Data.zip');
INSERT INTO uploaded_files (filename) VALUES ('Notes.zip');
INSERT INTO uploaded_files (filename) VALUES ('Project Beta.zip');
INSERT INTO uploaded_files (filename) VALUES ('Assignment.zip');
INSERT INTO uploaded_files (filename) VALUES ('Research.zip');
