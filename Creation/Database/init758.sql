CREATE TABLE users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    file_name VARCHAR(255) NOT NULL
);

-- Insert 10 values into the users table
INSERT INTO users (file_name) VALUES ('file1.xml');
INSERT INTO users (file_name) VALUES ('file2.xml');
INSERT INTO users (file_name) VALUES ('file3.xml');
INSERT INTO users (file_name) VALUES ('file4.xml');
INSERT INTO users (file_name) VALUES ('file5.xml');
INSERT INTO users (file_name) VALUES ('file6.xml');
INSERT INTO users (file_name) VALUES ('file7.xml');
INSERT INTO users (file_name) VALUES ('file8.xml');
INSERT INTO users (file_name) VALUES ('file9.xml');
INSERT INTO users (file_name) VALUES ('file10.xml');