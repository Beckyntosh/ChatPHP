CREATE TABLE IF NOT EXISTS profiles (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
profile_picture VARCHAR(255),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Create audit_logs table
CREATE TABLE IF NOT EXISTS audit_logs (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_id INT(6) UNSIGNED,
action VARCHAR(50) NOT NULL,
description VARCHAR(255),
change_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert sample data into profiles table
INSERT INTO profiles (username, profile_picture) VALUES ('JohnDoe', 'uploads/profile1.jpg');
INSERT INTO profiles (username, profile_picture) VALUES ('AliceSmith', 'uploads/profile2.jpg');
INSERT INTO profiles (username, profile_picture) VALUES ('BobBrown', 'uploads/profile3.jpg');
INSERT INTO profiles (username, profile_picture) VALUES ('EvaWhite', 'uploads/profile4.jpg');
INSERT INTO profiles (username, profile_picture) VALUES ('MichaelLee', 'uploads/profile5.jpg');
INSERT INTO profiles (username, profile_picture) VALUES ('SarahTaylor', 'uploads/profile6.jpg');
INSERT INTO profiles (username, profile_picture) VALUES ('DavidMiller', 'uploads/profile7.jpg');
INSERT INTO profiles (username, profile_picture) VALUES ('EmilyClark', 'uploads/profile8.jpg');
INSERT INTO profiles (username, profile_picture) VALUES ('RobertJohnson', 'uploads/profile9.jpg');
INSERT INTO profiles (username, profile_picture) VALUES ('EmmaAnderson', 'uploads/profile10.jpg');
