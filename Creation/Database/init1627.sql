CREATE TABLE IF NOT EXISTS events (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(30) NOT NULL,
description TEXT NOT NULL,
event_date DATE NOT NULL,
capacity INT(6) NOT NULL,
reg_date TIMESTAMP
);

INSERT INTO events (title, description, event_date, capacity) VALUES ('Virtual Book Club Meeting', 'Discussing the latest bestseller', '2022-10-15', 20);
INSERT INTO events (title, description, event_date, capacity) VALUES ('Virtual Cooking Class', 'Learn to make delicious dishes at home', '2022-11-05', 15);
INSERT INTO events (title, description, event_date, capacity) VALUES ('Virtual Yoga Session', 'Relax and rejuvenate with yoga', '2022-09-25', 30);
INSERT INTO events (title, description, event_date, capacity) VALUES ('Virtual Concert', 'Enjoy live music from home', '2022-12-03', 50);
INSERT INTO events (title, description, event_date, capacity) VALUES ('Virtual Language Exchange', 'Practice speaking a new language', '2023-01-08', 25);
INSERT INTO events (title, description, event_date, capacity) VALUES ('Virtual Art Workshop', 'Express your creativity through art', '2022-11-20', 10);
INSERT INTO events (title, description, event_date, capacity) VALUES ('Virtual Fitness Challenge', 'Get fit with daily workout videos', '2023-02-15', 40);
INSERT INTO events (title, description, event_date, capacity) VALUES ('Virtual Movie Night', 'Watch a classic film together online', '2022-10-30', 35);
INSERT INTO events (title, description, event_date, capacity) VALUES ('Virtual Meditation Session', 'Find inner peace through guided meditation', '2023-03-10', 20);
INSERT INTO events (title, description, event_date, capacity) VALUES ('Virtual Networking Event', 'Connect with professionals in your field', '2022-12-18', 30);