CREATE TABLE IF NOT EXISTS language_preference (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  selected_language VARCHAR(50) NOT NULL,
  reg_date TIMESTAMP
);

INSERT INTO language_preference (selected_language) VALUES ('English');
INSERT INTO language_preference (selected_language) VALUES ('Spanish');
INSERT INTO language_preference (selected_language) VALUES ('French');
INSERT INTO language_preference (selected_language) VALUES ('German');
INSERT INTO language_preference (selected_language) VALUES ('Italian');
INSERT INTO language_preference (selected_language) VALUES ('Japanese');
INSERT INTO language_preference (selected_language) VALUES ('Chinese');
INSERT INTO language_preference (selected_language) VALUES ('Russian');
INSERT INTO language_preference (selected_language) VALUES ('Arabic');
INSERT INTO language_preference (selected_language) VALUES ('Hindi');
