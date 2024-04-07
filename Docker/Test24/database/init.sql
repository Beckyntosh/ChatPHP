CREATE TABLE IF NOT EXISTS LanguagePreferences (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
language VARCHAR(30) NOT NULL,
reg_date TIMESTAMP
);

INSERT INTO LanguagePreferences (language) VALUES ('English');
INSERT INTO LanguagePreferences (language) VALUES ('Spanish');
INSERT INTO LanguagePreferences (language) VALUES ('French');
INSERT INTO LanguagePreferences (language) VALUES ('German');
INSERT INTO LanguagePreferences (language) VALUES ('Chinese');
INSERT INTO LanguagePreferences (language) VALUES ('Japanese');
INSERT INTO LanguagePreferences (language) VALUES ('Korean');
INSERT INTO LanguagePreferences (language) VALUES ('Italian');
INSERT INTO LanguagePreferences (language) VALUES ('Russian');
INSERT INTO LanguagePreferences (language) VALUES ('Arabic');
