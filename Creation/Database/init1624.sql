CREATE TABLE events (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    description TEXT NOT NULL,
    event_date DATE NOT NULL,
    capacity INT NOT NULL,
    booked_seats INT NOT NULL
);

INSERT INTO events (title, description, event_date, capacity, booked_seats) VALUES ('Virtual Book Club Meeting', 'Discussing the latest bestseller', '2022-08-15', 20, 0);
INSERT INTO events (title, description, event_date, capacity, booked_seats) VALUES ('Virtual Cooking Class', 'Learn how to make sushi at home', '2022-08-20', 15, 0);
INSERT INTO events (title, description, event_date, capacity, booked_seats) VALUES ('Virtual Yoga Session', 'Relax and stretch with a certified instructor', '2022-08-25', 30, 0);
INSERT INTO events (title, description, event_date, capacity, booked_seats) VALUES ('Virtual Paint Night', 'Unleash your creativity with acrylics', '2022-08-30', 25, 0);
INSERT INTO events (title, description, event_date, capacity, booked_seats) VALUES ('Virtual Wine Tasting', 'Sample fine wines from around the world', '2022-09-05', 40, 0);
INSERT INTO events (title, description, event_date, capacity, booked_seats) VALUES ('Virtual Language Exchange', 'Practice speaking a new language with native speakers', '2022-09-10', 10, 0);
INSERT INTO events (title, description, event_date, capacity, booked_seats) VALUES ('Virtual Fitness Challenge', 'Join a global fitness challenge and win prizes', '2022-09-15', 50, 0);
INSERT INTO events (title, description, event_date, capacity, booked_seats) VALUES ('Virtual Music Concert', 'Live performance by up-and-coming artists', '2022-09-20', 100, 0);
INSERT INTO events (title, description, event_date, capacity, booked_seats) VALUES ('Virtual Movie Night', 'Watch a classic film and discuss with fellow movie buffs', '2022-09-25', 35, 0);
INSERT INTO events (title, description, event_date, capacity, booked_seats) VALUES ('Virtual Trivia Night', 'Test your knowledge with fun trivia questions', '2022-09-30', 20, 0);
