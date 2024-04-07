CREATE TABLE transcriptions (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  filename VARCHAR(255) NOT NULL,
  transcription TEXT,
  reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO transcriptions (filename) VALUES ('lecture1.wav');
INSERT INTO transcriptions (filename) VALUES ('lecture2.mp3');
INSERT INTO transcriptions (filename) VALUES ('interview1.wav');
INSERT INTO transcriptions (filename) VALUES ('conference1.mp3');
INSERT INTO transcriptions (filename) VALUES ('meeting1.wav');
INSERT INTO transcriptions (filename) VALUES ('lecture3.wav');
INSERT INTO transcriptions (filename) VALUES ('interview2.mp3');
INSERT INTO transcriptions (filename) VALUES ('conference2.wav');
INSERT INTO transcriptions (filename) VALUES ('discussion1.mp3');
INSERT INTO transcriptions (filename) VALUES ('lecture4.wav');
