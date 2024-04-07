CREATE TABLE user_profiles (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT NOT NULL,
  favorite_cuisine VARCHAR(50),
  cooking_experience VARCHAR(50),
  UNIQUE(user_id)
);

INSERT INTO user_profiles (user_id, favorite_cuisine, cooking_experience) VALUES (1, 'Italian', 'Beginner');
INSERT INTO user_profiles (user_id, favorite_cuisine, cooking_experience) VALUES (2, 'Mexican', 'Intermediate');
INSERT INTO user_profiles (user_id, favorite_cuisine, cooking_experience) VALUES (3, 'Chinese', 'Expert');
INSERT INTO user_profiles (user_id, favorite_cuisine, cooking_experience) VALUES (4, 'Indian', 'Beginner');
INSERT INTO user_profiles (user_id, favorite_cuisine, cooking_experience) VALUES (5, 'American', 'Intermediate');
INSERT INTO user_profiles (user_id, favorite_cuisine, cooking_experience) VALUES (6, 'Other', 'Expert');
INSERT INTO user_profiles (user_id, favorite_cuisine, cooking_experience) VALUES (7, 'Italian', 'Expert');
INSERT INTO user_profiles (user_id, favorite_cuisine, cooking_experience) VALUES (8, 'Mexican', 'Beginner');
INSERT INTO user_profiles (user_id, favorite_cuisine, cooking_experience) VALUES (9, 'Chinese', 'Intermediate');
INSERT INTO user_profiles (user_id, favorite_cuisine, cooking_experience) VALUES (10, 'Indian', 'Expert');