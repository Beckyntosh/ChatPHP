CREATE TABLE IF NOT EXISTS HabitTracker (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    habit VARCHAR(30) NOT NULL,
    goal VARCHAR(50),
    reg_date TIMESTAMP
);

INSERT INTO HabitTracker (habit, goal) VALUES ('Drink water', '2 liters daily');
INSERT INTO HabitTracker (habit, goal) VALUES ('Exercise', '30 minutes daily');
INSERT INTO HabitTracker (habit, goal) VALUES ('Meditate', '10 minutes daily');
INSERT INTO HabitTracker (habit, goal) VALUES ('Read', '1 chapter daily');
INSERT INTO HabitTracker (habit, goal) VALUES ('Walk', '5000 steps daily');
INSERT INTO HabitTracker (habit, goal) VALUES ('Journal', 'Write 1 page daily');
INSERT INTO HabitTracker (habit, goal) VALUES ('Stretch', '15 minutes daily');
INSERT INTO HabitTracker (habit, goal) VALUES ('Practice', '30 minutes daily');
INSERT INTO HabitTracker (habit, goal) VALUES ('Sleep', '7 hours daily');
INSERT INTO HabitTracker (habit, goal) VALUES ('Eat healthy', '5 servings of fruits and vegetables daily');