CREATE TABLE file_uploads (
    id INT AUTO_INCREMENT PRIMARY KEY,
    file_name VARCHAR(255) NOT NULL,
    file_size INT NOT NULL,
    file_type VARCHAR(50) NOT NULL,
    content TEXT NOT NULL
);

INSERT INTO file_uploads (file_name, file_size, file_type, content) VALUES ('file1.txt', 100, 'txt', 'File content 1');
INSERT INTO file_uploads (file_name, file_size, file_type, content) VALUES ('file2.json', 200, 'json', 'File content 2');
INSERT INTO file_uploads (file_name, file_size, file_type, content) VALUES ('file3.txt', 150, 'txt', 'File content 3');
INSERT INTO file_uploads (file_name, file_size, file_type, content) VALUES ('file4.json', 180, 'json', 'File content 4');
INSERT INTO file_uploads (file_name, file_size, file_type, content) VALUES ('file5.txt', 220, 'txt', 'File content 5');
INSERT INTO file_uploads (file_name, file_size, file_type, content) VALUES ('file6.json', 250, 'json', 'File content 6');
INSERT INTO file_uploads (file_name, file_size, file_type, content) VALUES ('file7.txt', 130, 'txt', 'File content 7');
INSERT INTO file_uploads (file_name, file_size, file_type, content) VALUES ('file8.json', 170, 'json', 'File content 8');
INSERT INTO file_uploads (file_name, file_size, file_type, content) VALUES ('file9.txt', 190, 'txt', 'File content 9');
INSERT INTO file_uploads (file_name, file_size, file_type, content) VALUES ('file10.json', 210, 'json', 'File content 10');
