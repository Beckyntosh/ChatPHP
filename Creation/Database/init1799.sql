CREATE TABLE IF NOT EXISTS uploaded_texts (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
filename VARCHAR(255) NOT NULL,
upload_time TIMESTAMP
);

INSERT INTO uploaded_texts (filename) VALUES ('document1.txt');
INSERT INTO uploaded_texts (filename) VALUES ('document2.txt');
INSERT INTO uploaded_texts (filename) VALUES ('document3.txt');
INSERT INTO uploaded_texts (filename) VALUES ('document4.txt');
INSERT INTO uploaded_texts (filename) VALUES ('document5.txt');
INSERT INTO uploaded_texts (filename) VALUES ('document6.txt');
INSERT INTO uploaded_texts (filename) VALUES ('document7.txt');
INSERT INTO uploaded_texts (filename) VALUES ('document8.txt');
INSERT INTO uploaded_texts (filename) VALUES ('document9.txt');
INSERT INTO uploaded_texts (filename) VALUES ('document10.txt');
