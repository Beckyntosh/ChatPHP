CREATE TABLE IF NOT EXISTS audio_uploads (
    id INT AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255),
    filepath VARCHAR(255),
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO audio_uploads (filename, filepath) VALUES ('sample1.mp3', 'uploads/sample1.mp3');
INSERT INTO audio_uploads (filename, filepath) VALUES ('sample2.mp3', 'uploads/sample2.mp3');
INSERT INTO audio_uploads (filename, filepath) VALUES ('sample3.mp3', 'uploads/sample3.mp3');
INSERT INTO audio_uploads (filename, filepath) VALUES ('sample4.mp3', 'uploads/sample4.mp3');
INSERT INTO audio_uploads (filename, filepath) VALUES ('sample5.mp3', 'uploads/sample5.mp3');
INSERT INTO audio_uploads (filename, filepath) VALUES ('sample6.wav', 'uploads/sample6.wav');
INSERT INTO audio_uploads (filename, filepath) VALUES ('sample7.wav', 'uploads/sample7.wav');
INSERT INTO audio_uploads (filename, filepath) VALUES ('sample8.wav', 'uploads/sample8.wav');
INSERT INTO audio_uploads (filename, filepath) VALUES ('sample9.wav', 'uploads/sample9.wav');
INSERT INTO audio_uploads (filename, filepath) VALUES ('sample10.wav', 'uploads/sample10.wav');
