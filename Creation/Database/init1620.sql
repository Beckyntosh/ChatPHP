CREATE TABLE events (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
event_name VARCHAR(30) NOT NULL,
event_date DATE NOT NULL,
capacity INT(6) NOT NULL,
reg_count INT(6) NOT NULL DEFAULT 0,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO events (event_name, event_date, capacity) VALUES ('Virtual Book Club Meeting 1', '2022-10-15', 50);
INSERT INTO events (event_name, event_date, capacity) VALUES ('Virtual Book Club Meeting 2', '2022-10-22', 60);
INSERT INTO events (event_name, event_date, capacity) VALUES ('Virtual Book Club Meeting 3', '2022-11-05', 40);
INSERT INTO events (event_name, event_date, capacity) VALUES ('Virtual Book Club Meeting 4', '2022-11-12', 55);
INSERT INTO events (event_name, event_date, capacity) VALUES ('Virtual Book Club Meeting 5', '2022-11-19', 45);
INSERT INTO events (event_name, event_date, capacity) VALUES ('Virtual Book Club Meeting 6', '2022-11-26', 70);
INSERT INTO events (event_name, event_date, capacity) VALUES ('Virtual Book Club Meeting 7', '2022-12-03', 30);
INSERT INTO events (event_name, event_date, capacity) VALUES ('Virtual Book Club Meeting 8', '2022-12-10', 50);
INSERT INTO events (event_name, event_date, capacity) VALUES ('Virtual Book Club Meeting 9', '2022-12-17', 65);
INSERT INTO events (event_name, event_date, capacity) VALUES ('Virtual Book Club Meeting 10', '2022-12-24', 40);
