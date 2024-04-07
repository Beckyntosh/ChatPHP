-- Create Users table
CREATE TABLE IF NOT EXISTS Users (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL UNIQUE,
    reg_date TIMESTAMP
);

-- Insert values into Users table
INSERT INTO Users (email) VALUES ('user1@example.com');
INSERT INTO Users (email) VALUES ('user2@example.com');
INSERT INTO Users (email) VALUES ('user3@example.com');
INSERT INTO Users (email) VALUES ('user4@example.com');
INSERT INTO Users (email) VALUES ('user5@example.com');
INSERT INTO Users (email) VALUES ('user6@example.com');
INSERT INTO Users (email) VALUES ('user7@example.com');
INSERT INTO Users (email) VALUES ('user8@example.com');
INSERT INTO Users (email) VALUES ('user9@example.com');
INSERT INTO Users (email) VALUES ('user10@example.com');

-- Create EmailPreferences table
CREATE TABLE IF NOT EXISTS EmailPreferences (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT UNSIGNED,
    newsletter BOOLEAN NOT NULL DEFAULT 1,
    product_updates BOOLEAN NOT NULL DEFAULT 1,
    workout_tips BOOLEAN NOT NULL DEFAULT 1,
    FOREIGN KEY(user_id) REFERENCES Users(id)
);

-- Insert values into EmailPreferences table
INSERT INTO EmailPreferences (user_id, newsletter, product_updates, workout_tips) VALUES (1, 1, 0, 1);
INSERT INTO EmailPreferences (user_id, newsletter, product_updates, workout_tips) VALUES (2, 1, 1, 0);
INSERT INTO EmailPreferences (user_id, newsletter, product_updates, workout_tips) VALUES (3, 0, 1, 1);
INSERT INTO EmailPreferences (user_id, newsletter, product_updates, workout_tips) VALUES (4, 1, 1, 1);
INSERT INTO EmailPreferences (user_id, newsletter, product_updates, workout_tips) VALUES (5, 0, 0, 1);
INSERT INTO EmailPreferences (user_id, newsletter, product_updates, workout_tips) VALUES (6, 1, 1, 1);
INSERT INTO EmailPreferences (user_id, newsletter, product_updates, workout_tips) VALUES (7, 0, 1, 0);
INSERT INTO EmailPreferences (user_id, newsletter, product_updates, workout_tips) VALUES (8, 1, 0, 1);
INSERT INTO EmailPreferences (user_id, newsletter, product_updates, workout_tips) VALUES (9, 1, 1, 1);
INSERT INTO EmailPreferences (user_id, newsletter, product_updates, workout_tips) VALUES (10, 0, 1, 1);
