CREATE TABLE IF NOT EXISTS virtual_events (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
event_name VARCHAR(50) NOT NULL,
event_date DATE NOT NULL,
start_time TIME NOT NULL,
end_time TIME NOT NULL,
capacity INT(6) NOT NULL,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);


INSERT INTO virtual_events (event_name, event_date, start_time, end_time, capacity) VALUES ('Virtual Book Club Meeting', '2023-10-10', '15:00:00', '17:00:00', 50);
INSERT INTO virtual_events (event_name, event_date, start_time, end_time, capacity) VALUES ('Online Seminar', '2023-11-05', '10:00:00', '12:00:00', 100);
INSERT INTO virtual_events (event_name, event_date, start_time, end_time, capacity) VALUES ('Webinar Series Launch', '2023-12-20', '13:30:00', '15:30:00', 200);
INSERT INTO virtual_events (event_name, event_date, start_time, end_time, capacity) VALUES ('Virtual Cooking Class', '2024-01-15', '18:00:00', '20:00:00', 30);
INSERT INTO virtual_events (event_name, event_date, start_time, end_time, capacity) VALUES ('Online Art Exhibition', '2024-02-12', '11:00:00', '13:00:00', 80);
INSERT INTO virtual_events (event_name, event_date, start_time, end_time, capacity) VALUES ('Virtual Music Concert', '2024-03-25', '19:30:00', '22:00:00', 150);
INSERT INTO virtual_events (event_name, event_date, start_time, end_time, capacity) VALUES ('Digital Marketing Workshop', '2024-04-30', '14:00:00', '16:00:00', 50);
INSERT INTO virtual_events (event_name, event_date, start_time, end_time, capacity) VALUES ('Online Fitness Class', '2024-05-17', '09:30:00', '10:30:00', 20);
INSERT INTO virtual_events (event_name, event_date, start_time, end_time, capacity) VALUES ('Virtual Language Exchange', '2024-06-08', '17:00:00', '19:00:00', 100);
INSERT INTO virtual_events (event_name, event_date, start_time, end_time, capacity) VALUES ('E-learning Conference', '2024-07-22', '12:00:00', '14:00:00', 120);