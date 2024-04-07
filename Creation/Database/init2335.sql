CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
email VARCHAR(50),
password VARCHAR(50),
reg_date TIMESTAMP
);

CREATE TABLE IF NOT EXISTS events (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_id INT(6) UNSIGNED,
event_name VARCHAR(50) NOT NULL,
event_date DATE,
FOREIGN KEY (user_id) REFERENCES users(id)
);

INSERT INTO users (username, email, password) VALUES ('JohnDoe', 'johndoe@example.com', 'password123'),
('JaneSmith', 'janesmith@example.com', 'password456'),
('MikeBrown', 'mikebrown@example.com', 'password789'),
('SarahJohnson', 'sarahjohnson@example.com', 'password321'),
('ChrisDavis', 'chrisdavis@example.com', 'password654'),
('EmilyWhite', 'emilywhite@example.com', 'password987'),
('SamRoberts', 'samroberts@example.com', 'password234'),
('OliviaWilliams', 'oliviawilliams@example.com', 'password567'),
('HenryClark', 'henryclark@example.com', 'password890'),
('LilyThomas', 'lilythomas@example.com', 'password1234');
