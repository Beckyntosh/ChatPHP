CREATE TABLE IF NOT EXISTS documents (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
fileName VARCHAR(255) NOT NULL,
fileContent LONGTEXT NOT NULL,
uploadTime TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO documents (fileName, fileContent) VALUES ('document1.txt', 'This is a sample text for sentiment analysis.');
INSERT INTO documents (fileName, fileContent) VALUES ('document2.txt', 'I feel really happy and positive about this research.');
INSERT INTO documents (fileName, fileContent) VALUES ('document3.txt', 'The results were disappointing and negative.');
INSERT INTO documents (fileName, fileContent) VALUES ('document4.txt', 'I am neutral about the topic.');
INSERT INTO documents (fileName, fileContent) VALUES ('document5.txt', 'The experience was excellent and joyful.');
INSERT INTO documents (fileName, fileContent) VALUES ('document6.txt', 'This analysis is really bad and sad.');
INSERT INTO documents (fileName, fileContent) VALUES ('document7.txt', 'I have a positive outlook on this study.');
INSERT INTO documents (fileName, fileContent) VALUES ('document8.txt', 'Feeling angry and negative towards the situation.');
INSERT INTO documents (fileName, fileContent) VALUES ('document9.txt', 'Neutral feelings about the outcome.');
INSERT INTO documents (fileName, fileContent) VALUES ('document10.txt', 'Happy and joyful to participate in this research project.');