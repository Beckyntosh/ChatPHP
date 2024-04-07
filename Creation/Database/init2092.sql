CREATE TABLE user_documents (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
filename VARCHAR(255) NOT NULL,
upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO user_documents (filename) VALUES ('document1.jpg');
INSERT INTO user_documents (filename) VALUES ('document2.jpg');
INSERT INTO user_documents (filename) VALUES ('document3.jpg');
INSERT INTO user_documents (filename) VALUES ('document4.jpg');
INSERT INTO user_documents (filename) VALUES ('document5.jpg');
INSERT INTO user_documents (filename) VALUES ('document6.jpg');
INSERT INTO user_documents (filename) VALUES ('document7.jpg');
INSERT INTO user_documents (filename) VALUES ('document8.jpg');
INSERT INTO user_documents (filename) VALUES ('document9.jpg');
INSERT INTO user_documents (filename) VALUES ('document10.jpg');