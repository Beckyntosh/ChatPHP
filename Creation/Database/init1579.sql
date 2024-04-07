CREATE TABLE IF NOT EXISTS PrivacySettings (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_id INT(6) UNSIGNED NOT NULL,
profile_visibility BOOLEAN NOT NULL,
reg_date TIMESTAMP
);

INSERT INTO PrivacySettings (user_id, profile_visibility) VALUES (1, 1);
INSERT INTO PrivacySettings (user_id, profile_visibility) VALUES (2, 0);
INSERT INTO PrivacySettings (user_id, profile_visibility) VALUES (3, 1);
INSERT INTO PrivacySettings (user_id, profile_visibility) VALUES (4, 0);
INSERT INTO PrivacySettings (user_id, profile_visibility) VALUES (5, 1);
INSERT INTO PrivacySettings (user_id, profile_visibility) VALUES (6, 0);
INSERT INTO PrivacySettings (user_id, profile_visibility) VALUES (7, 1);
INSERT INTO PrivacySettings (user_id, profile_visibility) VALUES (8, 0);
INSERT INTO PrivacySettings (user_id, profile_visibility) VALUES (9, 1);
INSERT INTO PrivacySettings (user_id, profile_visibility) VALUES (10, 0);