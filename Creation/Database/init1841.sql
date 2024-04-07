CREATE TABLE IF NOT EXISTS audio_uploads (
    id INT AUTO_INCREMENT PRIMARY KEY,
    file_name VARCHAR(255) NOT NULL,
    transcribed_text LONGTEXT,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO audio_uploads (file_name) VALUES ('lecture1.mp3'), ('lecture2.wav'), ('lecture3.mp3'), ('lecture4.wav'), ('lecture5.mp3'), ('lecture6.wav'), ('lecture7.mp3'), ('lecture8.wav'), ('lecture9.mp3'), ('lecture10.wav');
