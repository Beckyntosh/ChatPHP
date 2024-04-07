CREATE TABLE IF NOT EXISTS user_profiles (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
fullname VARCHAR(50) NOT NULL,
email VARCHAR(50),
travel_preference VARCHAR(50),
bio TEXT,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO user_profiles (fullname, email, travel_preference, bio) VALUES ('John Doe', 'johndoe@example.com', 'beach', 'I love relaxing by the beach.');
INSERT INTO user_profiles (fullname, email, travel_preference, bio) VALUES ('Alice Smith', 'alice.smith@example.com', 'mountains', 'I enjoy hiking in the mountains.');
INSERT INTO user_profiles (fullname, email, travel_preference, bio) VALUES ('Bob Johnson', 'bob.johnson@example.com', 'city', 'Exploring the city lights and culture is my favorite.');
INSERT INTO user_profiles (fullname, email, travel_preference, bio) VALUES ('Emily Brown', 'emily.brown@example.com', 'beach', 'Sun, sand, and salty air make me happy.');
INSERT INTO user_profiles (fullname, email, travel_preference, bio) VALUES ('Michael Wilson', 'michael.wilson@example.com', 'countryside', 'I find peace and tranquility in the countryside.');
INSERT INTO user_profiles (fullname, email, travel_preference, bio) VALUES ('Sarah Davis', 'sarah.davis@example.com', 'mountains', 'The views from the mountains are breathtaking.');
INSERT INTO user_profiles (fullname, email, travel_preference, bio) VALUES ('James Clark', 'james.clark@example.com', 'city', 'City life energizes me.');
INSERT INTO user_profiles (fullname, email, travel_preference, bio) VALUES ('Olivia Martinez', 'olivia.martinez@example.com', 'countryside', 'Nature in the countryside is soothing to the soul.');
INSERT INTO user_profiles (fullname, email, travel_preference, bio) VALUES ('Daniel Anderson', 'daniel.anderson@example.com', 'beach', 'A day at the beach is a day well spent.');
INSERT INTO user_profiles (fullname, email, travel_preference, bio) VALUES ('Sophia Garcia', 'sophia.garcia@example.com', 'city', 'Urban adventures excite me.');

