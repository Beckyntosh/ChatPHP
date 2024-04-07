CREATE TABLE IF NOT EXISTS virtual_events (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  event_name VARCHAR(50) NOT NULL,
  event_date DATETIME NOT NULL,
  capacity INT(10) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO virtual_events (event_name, event_date, capacity) VALUES 
('Virtual Conference', '2022-08-15 10:00:00', 100),
('Online Workshop', '2022-09-20 14:30:00', 50),
('Webinar Series Launch', '2022-10-05 16:00:00', 75),
('Virtual Panel Discussion', '2022-11-12 11:00:00', 120),
('Online Networking Event', '2022-12-08 18:30:00', 80),
('Virtual Trade Show', '2023-01-15 09:30:00', 200),
('Remote Team Building Activity', '2023-02-20 13:45:00', 30),
('Webcast Presentation', '2023-03-10 15:00:00', 90),
('Digital Product Launch', '2023-04-25 12:00:00', 150),
('Virtual Hackathon', '2023-05-30 10:30:00', 50);
