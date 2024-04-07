CREATE TABLE IF NOT EXISTS events (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    event_name VARCHAR(50) NOT NULL,
    event_date DATE NOT NULL,
    capacity INT NOT NULL,
    registered INT DEFAULT 0,
    registration_open TINYINT(1) NOT NULL DEFAULT 1,
    UNIQUE KEY unique_event_date (event_date),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO events (event_name, event_date, capacity) VALUES ('Virtual Book Club Meeting', '2022-10-15', 30);
INSERT INTO events (event_name, event_date, capacity) VALUES ('Virtual Wine Tasting', '2022-11-20', 25);
INSERT INTO events (event_name, event_date, capacity) VALUES ('Virtual Cooking Class', '2022-09-08', 40);
INSERT INTO events (event_name, event_date, capacity) VALUES ('Virtual Music Concert', '2022-12-05', 50);
INSERT INTO events (event_name, event_date, capacity) VALUES ('Virtual Art Exhibition', '2022-10-30', 35);
INSERT INTO events (event_name, event_date, capacity) VALUES ('Virtual Science Seminar', '2022-09-25', 45);
INSERT INTO events (event_name, event_date, capacity) VALUES ('Virtual Yoga Session', '2022-11-10', 20);
INSERT INTO events (event_name, event_date, capacity) VALUES ('Virtual Comedy Show', '2022-12-15', 30);
INSERT INTO events (event_name, event_date, capacity) VALUES ('Virtual Language Exchange', '2022-10-05', 25);
INSERT INTO events (event_name, event_date, capacity) VALUES ('Virtual Fitness Challenge', '2022-09-20', 50);
