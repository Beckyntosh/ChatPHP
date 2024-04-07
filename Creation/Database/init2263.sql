CREATE TABLE user_profiles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    fav_brand VARCHAR(255),
    child_age INT,
    preferences TEXT
);

INSERT INTO user_profiles (user_id, fav_brand, child_age, preferences) VALUES (1, 'Brand A', 1, 'Preference A');
INSERT INTO user_profiles (user_id, fav_brand, child_age, preferences) VALUES (1, 'Brand B', 2, 'Preference B');
INSERT INTO user_profiles (user_id, fav_brand, child_age, preferences) VALUES (1, 'Brand C', 1, 'Preference C');
INSERT INTO user_profiles (user_id, fav_brand, child_age, preferences) VALUES (1, 'Brand A', 3, 'Preference D');
INSERT INTO user_profiles (user_id, fav_brand, child_age, preferences) VALUES (1, 'Brand B', 2, 'Preference E');
INSERT INTO user_profiles (user_id, fav_brand, child_age, preferences) VALUES (1, 'Brand C', 1, 'Preference F');
INSERT INTO user_profiles (user_id, fav_brand, child_age, preferences) VALUES (1, 'Brand A', 2, 'Preference G');
INSERT INTO user_profiles (user_id, fav_brand, child_age, preferences) VALUES (1, 'Brand B', 3, 'Preference H');
INSERT INTO user_profiles (user_id, fav_brand, child_age, preferences) VALUES (1, 'Brand C', 1, 'Preference I');
INSERT INTO user_profiles (user_id, fav_brand, child_age, preferences) VALUES (1, 'Brand A', 2, 'Preference J');
