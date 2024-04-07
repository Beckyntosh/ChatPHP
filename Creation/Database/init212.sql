CREATE TABLE IF NOT EXISTS text_files (
    id INT AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    summary TEXT
);

INSERT INTO text_files (filename, content, summary) VALUES ('file1.txt', 'This is the content of file 1', 'Summary for file 1');
INSERT INTO text_files (filename, content, summary) VALUES ('file2.txt', 'This is the content of file 2', 'Summary for file 2');
INSERT INTO text_files (filename, content, summary) VALUES ('file3.txt', 'This is the content of file 3', 'Summary for file 3');
INSERT INTO text_files (filename, content, summary) VALUES ('file4.txt', 'This is the content of file 4', 'Summary for file 4');
INSERT INTO text_files (filename, content, summary) VALUES ('file5.txt', 'This is the content of file 5', 'Summary for file 5');
INSERT INTO text_files (filename, content, summary) VALUES ('file6.txt', 'This is the content of file 6', 'Summary for file 6');
INSERT INTO text_files (filename, content, summary) VALUES ('file7.txt', 'This is the content of file 7', 'Summary for file 7');
INSERT INTO text_files (filename, content, summary) VALUES ('file8.txt', 'This is the content of file 8', 'Summary for file 8');
INSERT INTO text_files (filename, content, summary) VALUES ('file9.txt', 'This is the content of file 9', 'Summary for file 9');
INSERT INTO text_files (filename, content, summary) VALUES ('file10.txt', 'This is the content of file 10', 'Summary for file 10');