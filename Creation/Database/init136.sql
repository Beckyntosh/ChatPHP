CREATE TABLE IF NOT EXISTS habits (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    habit_name VARCHAR(30) NOT NULL,
    goal INT(6) NOT NULL,
    reminder_time TIME,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO habits (habit_name, goal, reminder_time) VALUES ('Exercise', 5, '08:00:00');
INSERT INTO habits (habit_name, goal, reminder_time) VALUES ('Read', 3, '10:30:00');
INSERT INTO habits (habit_name, goal, reminder_time) VALUES ('Meditate', 2, '07:00:00');
INSERT INTO habits (habit_name, goal, reminder_time) VALUES ('Drink Water', 8, '09:30:00');
INSERT INTO habits (habit_name, goal, reminder_time) VALUES ('Write', 4, '13:45:00');
INSERT INTO habits (habit_name, goal, reminder_time) VALUES ('Walk', 2, '17:00:00');
INSERT INTO habits (habit_name, goal, reminder_time) VALUES ('Yoga', 3, '06:30:00');
INSERT INTO habits (habit_name, goal, reminder_time) VALUES ('Eat Healthy', 3, '12:00:00');
INSERT INTO habits (habit_name, goal, reminder_time) VALUES ('Sleep Early', 1, '22:00:00');
INSERT INTO habits (habit_name, goal, reminder_time) VALUES ('Plan Tasks', 1, '09:00:00');
