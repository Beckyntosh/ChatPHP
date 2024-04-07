CREATE TABLE IF NOT EXISTS user_privacy_settings (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_id INT(6) UNSIGNED NOT NULL,
profile_visibility ENUM('public', 'private', 'friends') DEFAULT 'public',
reg_date TIMESTAMP
);

INSERT INTO user_privacy_settings (user_id, profile_visibility) VALUES (1, 'public');
INSERT INTO user_privacy_settings (user_id, profile_visibility) VALUES (2, 'private');
INSERT INTO user_privacy_settings (user_id, profile_visibility) VALUES (3, 'friends');
INSERT INTO user_privacy_settings (user_id, profile_visibility) VALUES (4, 'public');
INSERT INTO user_privacy_settings (user_id, profile_visibility) VALUES (5, 'private');
INSERT INTO user_privacy_settings (user_id, profile_visibility) VALUES (6, 'friends');
INSERT INTO user_privacy_settings (user_id, profile_visibility) VALUES (7, 'public');
INSERT INTO user_privacy_settings (user_id, profile_visibility) VALUES (8, 'private');
INSERT INTO user_privacy_settings (user_id, profile_visibility) VALUES (9, 'friends');
INSERT INTO user_privacy_settings (user_id, profile_visibility) VALUES (10, 'public');