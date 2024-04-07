CREATE TABLE IF NOT EXISTS uploads (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO uploads (filename) VALUES ('uploads/file1.pdf');
INSERT INTO uploads (filename) VALUES ('uploads/file2.pdf');
INSERT INTO uploads (filename) VALUES ('uploads/file3.pdf');
INSERT INTO uploads (filename) VALUES ('uploads/file4.pdf');
INSERT INTO uploads (filename) VALUES ('uploads/file5.pdf');
INSERT INTO uploads (filename) VALUES ('uploads/file6.pdf');
INSERT INTO uploads (filename) VALUES ('uploads/file7.pdf');
INSERT INTO uploads (filename) VALUES ('uploads/file8.pdf');
INSERT INTO uploads (filename) VALUES ('uploads/file9.pdf');
INSERT INTO uploads (filename) VALUES ('uploads/file10.pdf');
