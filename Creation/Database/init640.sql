CREATE TABLE IF NOT EXISTS subtitle_files (
id INT AUTO_INCREMENT PRIMARY KEY,
file_name VARCHAR(255),
upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO subtitle_files (file_name) VALUES ('subtitle1.srt');
INSERT INTO subtitle_files (file_name) VALUES ('subtitle2.vtt');
INSERT INTO subtitle_files (file_name) VALUES ('subtitle3.srt');
INSERT INTO subtitle_files (file_name) VALUES ('subtitle4.vtt');
INSERT INTO subtitle_files (file_name) VALUES ('subtitle5.srt');
INSERT INTO subtitle_files (file_name) VALUES ('subtitle6.vtt');
INSERT INTO subtitle_files (file_name) VALUES ('subtitle7.srt');
INSERT INTO subtitle_files (file_name) VALUES ('subtitle8.vtt');
INSERT INTO subtitle_files (file_name) VALUES ('subtitle9.srt');
INSERT INTO subtitle_files (file_name) VALUES ('subtitle10.vtt');
