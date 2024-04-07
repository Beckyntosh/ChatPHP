CREATE TABLE IF NOT EXISTS text_files (
    id INT AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    content LONGTEXT NOT NULL,
    summary TEXT NOT NULL,
    upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO text_files (filename, content, summary) VALUES ('file1.txt', 'Lorem Ipsum Content 1', 'Lorem Ipsum Content 1 Summary');
INSERT INTO text_files (filename, content, summary) VALUES ('file2.txt', 'Lorem Ipsum Content 2', 'Lorem Ipsum Content 2 Summary');
INSERT INTO text_files (filename, content, summary) VALUES ('file3.txt', 'Lorem Ipsum Content 3', 'Lorem Ipsum Content 3 Summary');
INSERT INTO text_files (filename, content, summary) VALUES ('file4.txt', 'Lorem Ipsum Content 4', 'Lorem Ipsum Content 4 Summary');
INSERT INTO text_files (filename, content, summary) VALUES ('file5.txt', 'Lorem Ipsum Content 5', 'Lorem Ipsum Content 5 Summary');
INSERT INTO text_files (filename, content, summary) VALUES ('file6.txt', 'Lorem Ipsum Content 6', 'Lorem Ipsum Content 6 Summary');
INSERT INTO text_files (filename, content, summary) VALUES ('file7.txt', 'Lorem Ipsum Content 7', 'Lorem Ipsum Content 7 Summary');
INSERT INTO text_files (filename, content, summary) VALUES ('file8.txt', 'Lorem Ipsum Content 8', 'Lorem Ipsum Content 8 Summary');
INSERT INTO text_files (filename, content, summary) VALUES ('file9.txt', 'Lorem Ipsum Content 9', 'Lorem Ipsum Content 9 Summary');
INSERT INTO text_files (filename, content, summary) VALUES ('file10.txt', 'Lorem Ipsum Content 10', 'Lorem Ipsum Content 10 Summary');
