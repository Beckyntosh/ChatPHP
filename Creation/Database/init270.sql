CREATE TABLE IF NOT EXISTS uploads (
        id INT AUTO_INCREMENT PRIMARY KEY,
        file_name VARCHAR(255) NOT NULL,
        upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO uploads (file_name) VALUES ('document1.pdf');
INSERT INTO uploads (file_name) VALUES ('document2.pdf');
INSERT INTO uploads (file_name) VALUES ('document3.pdf');
INSERT INTO uploads (file_name) VALUES ('document4.pdf');
INSERT INTO uploads (file_name) VALUES ('document5.pdf');
INSERT INTO uploads (file_name) VALUES ('document6.pdf');
INSERT INTO uploads (file_name) VALUES ('document7.pdf');
INSERT INTO uploads (file_name) VALUES ('document8.pdf');
INSERT INTO uploads (file_name) VALUES ('document9.pdf');
INSERT INTO uploads (file_name) VALUES ('document10.pdf');