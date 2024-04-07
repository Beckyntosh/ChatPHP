CREATE TABLE audio_uploads (
        id INT(11) AUTO_INCREMENT PRIMARY KEY,
        original_name VARCHAR(255) NOT NULL,
        file_path VARCHAR(255) NOT NULL,
        status ENUM('pending', 'processing', 'complete') DEFAULT 'pending',
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );

INSERT INTO audio_uploads (original_name, file_path) VALUES ('lecture1.mp3', 'uploads/lecture1.mp3');
INSERT INTO audio_uploads (original_name, file_path) VALUES ('lecture2.wav', 'uploads/lecture2.wav');
INSERT INTO audio_uploads (original_name, file_path) VALUES ('lecture3.ogg', 'uploads/lecture3.ogg');
INSERT INTO audio_uploads (original_name, file_path) VALUES ('lecture4.mp3', 'uploads/lecture4.mp3');
INSERT INTO audio_uploads (original_name, file_path) VALUES ('lecture5.wav', 'uploads/lecture5.wav');
INSERT INTO audio_uploads (original_name, file_path) VALUES ('lecture6.ogg', 'uploads/lecture6.ogg');
INSERT INTO audio_uploads (original_name, file_path) VALUES ('lecture7.mp3', 'uploads/lecture7.mp3');
INSERT INTO audio_uploads (original_name, file_path) VALUES ('lecture8.wav', 'uploads/lecture8.wav');
INSERT INTO audio_uploads (original_name, file_path) VALUES ('lecture9.ogg', 'uploads/lecture9.ogg');
INSERT INTO audio_uploads (original_name, file_path) VALUES ('lecture10.mp3', 'uploads/lecture10.mp3');