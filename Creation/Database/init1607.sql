CREATE TABLE IF NOT EXISTS virtual_events (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    event_date DATETIME NOT NULL,
    capacity INT(11) NOT NULL,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO virtual_events (title, event_date, capacity, description) VALUES ('Virtual Conference', '2022-08-15 10:00:00', 100, 'A conference showcasing new technologies');
INSERT INTO virtual_events (title, event_date, capacity, description) VALUES ('Virtual Yoga Session', '2022-08-20 18:00:00', 50, 'Join us for a relaxing yoga session online');
INSERT INTO virtual_events (title, event_date, capacity, description) VALUES ('Virtual Cooking Class', '2022-08-25 15:00:00', 30, 'Learn how to cook a delicious meal from home');
INSERT INTO virtual_events (title, event_date, capacity, description) VALUES ('Virtual Music Concert', '2022-09-05 20:00:00', 200, 'Enjoy live music performances online');
INSERT INTO virtual_events (title, event_date, capacity, description) VALUES ('Virtual Art Exhibition', '2022-09-10 12:00:00', 150, 'Explore artworks from various artists virtually');
INSERT INTO virtual_events (title, event_date, capacity, description) VALUES ('Virtual Fitness Challenge', '2022-09-15 07:00:00', 50, 'Join the fitness challenge and stay active at home');
INSERT INTO virtual_events (title, event_date, capacity, description) VALUES ('Virtual Language Exchange', '2022-09-20 16:00:00', 40, 'Practice different languages with people around the world');
INSERT INTO virtual_events (title, event_date, capacity, description) VALUES ('Virtual Career Fair', '2022-09-25 10:00:00', 300, 'Connect with recruiters and explore job opportunities online');
INSERT INTO virtual_events (title, event_date, capacity, description) VALUES ('Virtual Science Symposium', '2022-10-05 09:00:00', 150, 'Learn about the latest scientific discoveries and research');
INSERT INTO virtual_events (title, event_date, capacity, description) VALUES ('Virtual Movie Night', '2022-10-10 19:00:00', 100, 'Watch a movie together with friends online');
