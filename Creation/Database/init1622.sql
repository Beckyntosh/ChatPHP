CREATE TABLE IF NOT EXISTS virtual_events (
    id INT AUTO_INCREMENT PRIMARY KEY,
    event_name VARCHAR(255) NOT NULL,
    event_date DATE NOT NULL,
    capacity INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO virtual_events (event_name, event_date, capacity) VALUES ('Virtual Book Club Meeting', '2021-10-15', 20);
INSERT INTO virtual_events (event_name, event_date, capacity) VALUES ('Virtual Cooking Class', '2021-11-05', 30);
INSERT INTO virtual_events (event_name, event_date, capacity) VALUES ('Virtual Yoga Session', '2021-10-25', 15);
INSERT INTO virtual_events (event_name, event_date, capacity) VALUES ('Virtual Music Concert', '2021-11-12', 50);
INSERT INTO virtual_events (event_name, event_date, capacity) VALUES ('Virtual Art Exhibition', '2021-10-20', 25);
INSERT INTO virtual_events (event_name, event_date, capacity) VALUES ('Virtual Fitness Challenge', '2021-11-08', 40);
INSERT INTO virtual_events (event_name, event_date, capacity) VALUES ('Virtual Career Fair', '2021-10-30', 100);
INSERT INTO virtual_events (event_name, event_date, capacity) VALUES ('Virtual Language Exchange', '2021-11-18', 20);
INSERT INTO virtual_events (event_name, event_date, capacity) VALUES ('Virtual Tech Talk', '2021-10-22', 30);
INSERT INTO virtual_events (event_name, event_date, capacity) VALUES ('Virtual Movie Night', '2021-11-02', 50);