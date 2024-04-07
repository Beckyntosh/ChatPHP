CREATE TABLE IF NOT EXISTS `audio_transcriptions` (
  `id` INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `filename` VARCHAR(255) NOT NULL,
  `upload_time` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` ENUM('uploaded', 'processing', 'completed') DEFAULT 'uploaded'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `audio_transcriptions` (`filename`, `status`) VALUES ('lecture1.mp3', 'uploaded');
INSERT INTO `audio_transcriptions` (`filename`, `status`) VALUES ('lecture2.wav', 'uploaded');
INSERT INTO `audio_transcriptions` (`filename`, `status`) VALUES ('lecture3.ogg', 'uploaded');
INSERT INTO `audio_transcriptions` (`filename`, `status`) VALUES ('lecture4.mp3', 'uploaded');
INSERT INTO `audio_transcriptions` (`filename`, `status`) VALUES ('lecture5.wav', 'uploaded');
INSERT INTO `audio_transcriptions` (`filename`, `status`) VALUES ('lecture6.ogg', 'uploaded');
INSERT INTO `audio_transcriptions` (`filename`, `status`) VALUES ('lecture7.mp3', 'uploaded');
INSERT INTO `audio_transcriptions` (`filename`, `status`) VALUES ('lecture8.wav', 'uploaded');
INSERT INTO `audio_transcriptions` (`filename`, `status`) VALUES ('lecture9.ogg', 'uploaded');
INSERT INTO `audio_transcriptions` (`filename`, `status`) VALUES ('lecture10.mp3', 'uploaded');
