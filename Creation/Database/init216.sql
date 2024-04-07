CREATE TABLE audio_files (
  id INT AUTO_INCREMENT PRIMARY KEY,
  filename VARCHAR(255) NOT NULL,
  filetype VARCHAR(50) NOT NULL,
  filesize BIGINT NOT NULL
);

INSERT INTO audio_files (filename, filetype, filesize) VALUES ('audio1.wav', 'audio/wav', 1024);
INSERT INTO audio_files (filename, filetype, filesize) VALUES ('audio2.mp3', 'audio/mpeg', 2048);
INSERT INTO audio_files (filename, filetype, filesize) VALUES ('audio3.wav', 'audio/wav', 4096);
INSERT INTO audio_files (filename, filetype, filesize) VALUES ('audio4.mp3', 'audio/mpeg', 8192);
INSERT INTO audio_files (filename, filetype, filesize) VALUES ('audio5.wav', 'audio/wav', 16384);
INSERT INTO audio_files (filename, filetype, filesize) VALUES ('audio6.mp3', 'audio/mpeg', 32768);
INSERT INTO audio_files (filename, filetype, filesize) VALUES ('audio7.wav', 'audio/wav', 65536);
INSERT INTO audio_files (filename, filetype, filesize) VALUES ('audio8.mp3', 'audio/mpeg', 131072);
INSERT INTO audio_files (filename, filetype, filesize) VALUES ('audio9.wav', 'audio/wav', 262144);
INSERT INTO audio_files (filename, filetype, filesize) VALUES ('audio10.mp3', 'audio/mpeg', 524288);
