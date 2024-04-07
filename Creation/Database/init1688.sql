CREATE TABLE IF NOT EXISTS audio_transcriptions (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    transcription TEXT,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO audio_transcriptions (filename) VALUES ('lecture_recording_1.mp3');
INSERT INTO audio_transcriptions (filename) VALUES ('lecture_recording_2.mp3');
INSERT INTO audio_transcriptions (filename) VALUES ('interview_audio_1.wav');
INSERT INTO audio_transcriptions (filename) VALUES ('conference_audio_1.mp3');
INSERT INTO audio_transcriptions (filename) VALUES ('meeting_audio_1.wav');
INSERT INTO audio_transcriptions (filename) VALUES ('presentation_audio_1.mp3');
INSERT INTO audio_transcriptions (filename) VALUES ('lecture_recording_3.wav');
INSERT INTO audio_transcriptions (filename) VALUES ('podcast_recording_1.mp3');
INSERT INTO audio_transcriptions (filename) VALUES ('interview_audio_2.wav');
INSERT INTO audio_transcriptions (filename) VALUES ('conference_audio_2.mp3');
