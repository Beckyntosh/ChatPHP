CREATE TABLE IF NOT EXISTS audio_uploads (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    transcription TEXT,
    reg_date TIMESTAMP
);

INSERT INTO audio_uploads (filename, transcription) VALUES ("uploads/lecture1.mp3", ""),
("uploads/lecture2.wav", ""),
("uploads/lecture3.m4a", ""),
("uploads/lecture4.mp3", ""),
("uploads/lecture5.wav", ""),
("uploads/lecture6.m4a", ""),
("uploads/lecture7.mp3", ""),
("uploads/lecture8.wav", ""),
("uploads/lecture9.m4a", ""),
("uploads/lecture10.mp3", "");
