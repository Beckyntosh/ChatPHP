CREATE TABLE IF NOT EXISTS subtitles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255),
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO subtitles (filename) VALUES ('subtitle1.srt');
INSERT INTO subtitles (filename) VALUES ('subtitle2.srt');
INSERT INTO subtitles (filename) VALUES ('subtitle3.vtt');
INSERT INTO subtitles (filename) VALUES ('subtitle4.srt');
INSERT INTO subtitles (filename) VALUES ('subtitle5.vtt');
INSERT INTO subtitles (filename) VALUES ('subtitle6.srt');
INSERT INTO subtitles (filename) VALUES ('subtitle7.vtt');
INSERT INTO subtitles (filename) VALUES ('subtitle8.srt');
INSERT INTO subtitles (filename) VALUES ('subtitle9.vtt');
INSERT INTO subtitles (filename) VALUES ('subtitle10.srt');
