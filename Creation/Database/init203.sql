CREATE TABLE IF NOT EXISTS documents (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  filename VARCHAR(255) NOT NULL,
  uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO documents (filename) VALUES ('document1.jpg');
INSERT INTO documents (filename) VALUES ('document2.jpg');
INSERT INTO documents (filename) VALUES ('document3.jpg');
INSERT INTO documents (filename) VALUES ('document4.jpg');
INSERT INTO documents (filename) VALUES ('document5.png');
INSERT INTO documents (filename) VALUES ('document6.png');
INSERT INTO documents (filename) VALUES ('document7.jpeg');
INSERT INTO documents (filename) VALUES ('document8.jpeg');
INSERT INTO documents (filename) VALUES ('document9.jpg');
INSERT INTO documents (filename) VALUES ('document10.jpg');
