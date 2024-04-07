CREATE TABLE IF NOT EXISTS events (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    eventName VARCHAR(30) NOT NULL,
    eventDate DATETIME NOT NULL,
    maxParticipants INT(6) NOT NULL,
    description TEXT,
    registrationOpen TINYINT(1) DEFAULT 1,
    UNIQUE KEY unique_event (eventName, eventDate)
);

INSERT INTO events (eventName, eventDate, maxParticipants, description) VALUES 
('Virtual Book Club Meeting', '2022-09-15 10:00:00', 30, 'Discussing the latest bestseller'),
('Gaming Tournament', '2022-09-20 18:00:00', 50, 'Competitive gaming event'),
('Webinar on AI', '2022-09-25 15:30:00', 100, 'Learning about Artificial Intelligence'),
('Cooking Class', '2022-09-30 12:00:00', 20, 'Interactive cooking session'),
('Virtual Yoga Session', '2022-10-05 08:00:00', 40, 'Relaxing yoga practice'),
('Coding Workshop', '2022-10-10 14:00:00', 25, 'Hands-on coding experience'),
('Online Art Exhibition', '2022-10-15 16:30:00', 75, 'Showcasing talented artists'),
('Music Concert', '2022-10-20 19:00:00', 200, 'Live music performance'),
('Fitness Challenge', '2022-10-25 06:00:00', 50, 'Physical fitness challenge'),
('Virtual Networking Event', '2022-10-30 17:00:00', 50, 'Connect with professionals in various industries');