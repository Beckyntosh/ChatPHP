CREATE TABLE IF NOT EXISTS code_reviews (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    file_name VARCHAR(255) NOT NULL,
    code_content LONGTEXT NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO code_reviews (file_name, code_content) VALUES ('file1.php', 'Sample code content for file 1');
INSERT INTO code_reviews (file_name, code_content) VALUES ('file2.js', 'Sample code content for file 2');
INSERT INTO code_reviews (file_name, code_content) VALUES ('file3.html', 'Sample code content for file 3');
INSERT INTO code_reviews (file_name, code_content) VALUES ('file4.css', 'Sample code content for file 4');
INSERT INTO code_reviews (file_name, code_content) VALUES ('file5.php', 'Sample code content for file 5');
INSERT INTO code_reviews (file_name, code_content) VALUES ('file6.js', 'Sample code content for file 6');
INSERT INTO code_reviews (file_name, code_content) VALUES ('file7.html', 'Sample code content for file 7');
INSERT INTO code_reviews (file_name, code_content) VALUES ('file8.css', 'Sample code content for file 8');
INSERT INTO code_reviews (file_name, code_content) VALUES ('file9.php', 'Sample code content for file 9');
INSERT INTO code_reviews (file_name, code_content) VALUES ('file10.js', 'Sample code content for file 10');
