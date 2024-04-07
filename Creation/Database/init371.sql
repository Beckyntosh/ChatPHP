CREATE TABLE IF NOT EXISTS user_profiles (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    user_id INT(6) UNSIGNED NOT NULL,
    vitamin_pref VARCHAR(255),
    daily_intake_goal VARCHAR(255),
    reg_date TIMESTAMP
);

INSERT INTO user_profiles (user_id, vitamin_pref, daily_intake_goal) VALUES (1, 'Vitamin C', '2000mg');
INSERT INTO user_profiles (user_id, vitamin_pref, daily_intake_goal) VALUES (2, 'Vitamin D', '1000IU');
INSERT INTO user_profiles (user_id, vitamin_pref, daily_intake_goal) VALUES (3, 'Vitamin B12', '500mcg');
INSERT INTO user_profiles (user_id, vitamin_pref, daily_intake_goal) VALUES (4, 'Vitamin A', '3000IU');
INSERT INTO user_profiles (user_id, vitamin_pref, daily_intake_goal) VALUES (5, 'Vitamin E', '800IU');
INSERT INTO user_profiles (user_id, vitamin_pref, daily_intake_goal) VALUES (6, 'Vitamin K', '150mcg');
INSERT INTO user_profiles (user_id, vitamin_pref, daily_intake_goal) VALUES (7, 'Vitamin B6', '100mg');
INSERT INTO user_profiles (user_id, vitamin_pref, daily_intake_goal) VALUES (8, 'Vitamin B3', '1500mg');
INSERT INTO user_profiles (user_id, vitamin_pref, daily_intake_goal) VALUES (9, 'Vitamin B5', '300mcg');
INSERT INTO user_profiles (user_id, vitamin_pref, daily_intake_goal) VALUES (10, 'Vitamin B9', '800mcg');
