CREATE TABLE IF NOT EXISTS virtual_events (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
event_name VARCHAR(50) NOT NULL,
event_date DATETIME NOT NULL,
capacity INT NOT NULL,
registered INT DEFAULT 0,
reg_date TIMESTAMP
);

INSERT INTO virtual_events (event_name, event_date, capacity) VALUES ('Virtual Book Club Meeting', '2022-08-25 14:00:00', 50);
INSERT INTO virtual_events (event_name, event_date, capacity) VALUES ('Virtual Conference', '2022-09-10 09:00:00', 100);
INSERT INTO virtual_events (event_name, event_date, capacity) VALUES ('Online Workshop', '2022-09-15 16:30:00', 30);
INSERT INTO virtual_events (event_name, event_date, capacity) VALUES ('Webinar Series', '2022-09-22 11:00:00', 80);
INSERT INTO virtual_events (event_name, event_date, capacity) VALUES ('Remote Training Session', '2022-09-30 13:45:00', 40);
INSERT INTO virtual_events (event_name, event_date, capacity) VALUES ('Virtual Panel Discussion', '2022-10-05 15:15:00', 70);
INSERT INTO virtual_events (event_name, event_date, capacity) VALUES ('Online Networking Event', '2022-10-12 18:00:00', 60);
INSERT INTO virtual_events (event_name, event_date, capacity) VALUES ('Virtual Hackathon', '2022-10-20 10:30:00', 50);
INSERT INTO virtual_events (event_name, event_date, capacity) VALUES ('Digital Summit', '2022-10-28 12:00:00', 120);
INSERT INTO virtual_events (event_name, event_date, capacity) VALUES ('Virtual Career Fair', '2022-11-02 09:30:00', 90);
