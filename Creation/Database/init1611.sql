CREATE TABLE IF NOT EXISTS virtual_events (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    event_name VARCHAR(50) NOT NULL,
    event_date DATE NOT NULL,
    capacity INT(10) NOT NULL,
    reg_date TIMESTAMP
);

INSERT INTO virtual_events (event_name, event_date, capacity) VALUES ('Virtual Book Club Meeting', '2022-10-10', 20);
INSERT INTO virtual_events (event_name, event_date, capacity) VALUES ('Virtual Conference', '2022-11-15', 50);
INSERT INTO virtual_events (event_name, event_date, capacity) VALUES ('Virtual Music Concert', '2023-01-20', 100);
INSERT INTO virtual_events (event_name, event_date, capacity) VALUES ('Virtual Cooking Class', '2023-02-05', 30);
INSERT INTO virtual_events (event_name, event_date, capacity) VALUES ('Virtual Fitness Session', '2023-03-12', 40);
INSERT INTO virtual_events (event_name, event_date, capacity) VALUES ('Virtual Art Exhibition', '2023-04-18', 25);
INSERT INTO virtual_events (event_name, event_date, capacity) VALUES ('Virtual Tech Talk', '2023-05-22', 60);
INSERT INTO virtual_events (event_name, event_date, capacity) VALUES ('Virtual Language Exchange', '2023-06-30', 35);
INSERT INTO virtual_events (event_name, event_date, capacity) VALUES ('Virtual Gaming Tournament', '2023-08-10', 75);
INSERT INTO virtual_events (event_name, event_date, capacity) VALUES ('Virtual Movie Night', '2023-09-05', 50);
