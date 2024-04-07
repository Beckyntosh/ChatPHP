CREATE TABLE IF NOT EXISTS habit_tracker (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    track_date DATE NOT NULL,
    liters_drunk DECIMAL(4,2) NOT NULL,
    reg_date TIMESTAMP
);

INSERT INTO habit_tracker (track_date, liters_drunk) VALUES ('2023-01-01', 2.5);
INSERT INTO habit_tracker (track_date, liters_drunk) VALUES ('2023-01-02', 2.8);
INSERT INTO habit_tracker (track_date, liters_drunk) VALUES ('2023-01-03', 1.9);
INSERT INTO habit_tracker (track_date, liters_drunk) VALUES ('2023-01-04', 3.0);
INSERT INTO habit_tracker (track_date, liters_drunk) VALUES ('2023-01-05', 2.2);
INSERT INTO habit_tracker (track_date, liters_drunk) VALUES ('2023-01-06', 2.5);
INSERT INTO habit_tracker (track_date, liters_drunk) VALUES ('2023-01-07', 1.8);
INSERT INTO habit_tracker (track_date, liters_drunk) VALUES ('2023-01-08', 2.7);
INSERT INTO habit_tracker (track_date, liters_drunk) VALUES ('2023-01-09', 2.0);
INSERT INTO habit_tracker (track_date, liters_drunk) VALUES ('2023-01-10', 2.3);
