CREATE TABLE IF NOT EXISTS virtual_events (
    id INT AUTO_INCREMENT PRIMARY KEY,
    event_name VARCHAR(255) NOT NULL,
    event_date DATETIME NOT NULL,
    capacity INT,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO virtual_events (event_name, event_date, capacity, description) VALUES ('Virtual Book Club Meeting', '2022-05-15 08:00:00', 20, 'Discussing the latest bestseller');
INSERT INTO virtual_events (event_name, event_date, capacity, description) VALUES ('Virtual Art Exhibition', '2022-06-10 10:30:00', 30, 'Showcasing works from local artists');
INSERT INTO virtual_events (event_name, event_date, capacity, description) VALUES ('Virtual Cooking Class', '2022-07-20 18:00:00', 15, 'Learn to make delicious recipes at home');
INSERT INTO virtual_events (event_name, event_date, capacity, description) VALUES ('Virtual Yoga Session', '2022-08-05 07:00:00', 25, 'Relax and rejuvenate with a virtual yoga class');
INSERT INTO virtual_events (event_name, event_date, capacity, description) VALUES ('Virtual Music Concert', '2022-09-15 20:00:00', 50, 'Enjoy live music performances online');
INSERT INTO virtual_events (event_name, event_date, capacity, description) VALUES ('Virtual Networking Event', '2022-10-12 16:30:00', 40, 'Connect with professionals in your industry');
INSERT INTO virtual_events (event_name, event_date, capacity, description) VALUES ('Virtual Fitness Challenge', '2022-11-30 09:00:00', 20, 'Join a virtual fitness program for a healthier lifestyle');
INSERT INTO virtual_events (event_name, event_date, capacity, description) VALUES ('Virtual Tech Workshop', '2022-12-18 14:00:00', 30, 'Learn about the latest technology trends');
INSERT INTO virtual_events (event_name, event_date, capacity, description) VALUES ('Virtual Language Exchange', '2023-01-05 11:30:00', 25, 'Practice speaking different languages with language enthusiasts');
INSERT INTO virtual_events (event_name, event_date, capacity, description) VALUES ('Virtual Business Seminar', '2023-02-20 13:00:00', 50, 'Get insights on business strategies and entrepreneurship');
