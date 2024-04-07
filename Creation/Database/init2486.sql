CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(50) NOT NULL,
email VARCHAR(100) NOT NULL,
password VARCHAR(255) NOT NULL,
reg_date TIMESTAMP
);

INSERT INTO users (username, email, password) VALUES ('johndoe', 'johndoe@example.com', '$2y$10$opHW1gniDasgsvhCxQ9QQ.PLpVcIb2sW7J7qaaK3JGbMCSLl7878W'),
('janedoe', 'janedoe@example.com', '$2y$10$opHW1gniDasgsvhCxQ9QQ.PLpVcIb2sW7J7qaaK3JGbMCSLl7878W'),
('alice123', 'alice123@example.com', '$2y$10$opHW1gniDasgsvhCxQ9QQ.PLpVcIb2sW7J7qaaK3JGbMCSLl7878W'),
('bob456', 'bob456@example.com', '$2y$10$opHW1gniDasgsvhCxQ9QQ.PLpVcIb2sW7J7qaaK3JGbMCSLl7878W'),
('sarah89', 'sarah89@example.com', '$2y$10$opHW1gniDasgsvhCxQ9QQ.PLpVcIb2sW7J7qaaK3JGbMCSLl7878W'),
('mike77', 'mike77@example.com', '$2y$10$opHW1gniDasgsvhCxQ9QQ.PLpVcIb2sW7J7qaaK3JGbMCSLl7878W'),
('emily22', 'emily22@example.com', '$2y$10$opHW1gniDasgsvhCxQ9QQ.PLpVcIb2sW7J7qaaK3JGbMCSLl7878W'),
('chris90', 'chris90@example.com', '$2y$10$opHW1gniDasgsvhCxQ9QQ.PLpVcIb2sW7J7qaaK3JGbMCSLl7878W'),
('laura55', 'laura55@example.com', '$2y$10$opHW1gniDasgsvhCxQ9QQ.PLpVcIb2sW7J7qaaK3JGbMCSLl7878W'),
('maxwell33', 'maxwell33@example.com', '$2y$10$opHW1gniDasgsvhCxQ9QQ.PLpVcIb2sW7J7qaaK3JGbMCSLl7878W');
