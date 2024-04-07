CREATE TABLE IF NOT EXISTS vector_files (
    id INT AUTO_INCREMENT PRIMARY KEY,
    file_name VARCHAR(255) NOT NULL,
    original_name VARCHAR(255) NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO vector_files (file_name, original_name) VALUES ('uploads/file1.svg', 'Company Logo');
INSERT INTO vector_files (file_name, original_name) VALUES ('uploads/file2.ai', 'Skateboard Design 1');
INSERT INTO vector_files (file_name, original_name) VALUES ('uploads/file3.eps', 'Logo Design');
INSERT INTO vector_files (file_name, original_name) VALUES ('uploads/file4.svg', 'Vector Artwork');
INSERT INTO vector_files (file_name, original_name) VALUES ('uploads/file5.ai', 'Graphic Design');
INSERT INTO vector_files (file_name, original_name) VALUES ('uploads/file6.eps', 'Illustration');
INSERT INTO vector_files (file_name, original_name) VALUES ('uploads/file7.svg', 'Vector Logo');
INSERT INTO vector_files (file_name, original_name) VALUES ('uploads/file8.ai', 'Skateboard Design 2');
INSERT INTO vector_files (file_name, original_name) VALUES ('uploads/file9.eps', 'Company Branding');
INSERT INTO vector_files (file_name, original_name) VALUES ('uploads/file10.svg', 'Artistic Design');
