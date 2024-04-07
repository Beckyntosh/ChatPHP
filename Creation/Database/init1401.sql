CREATE TABLE IF NOT EXISTS habit_tracker (
    id INT AUTO_INCREMENT PRIMARY KEY,
    goal VARCHAR(255) NOT NULL,
    progress DOUBLE NOT NULL,
    date DATE NOT NULL UNIQUE
);

INSERT INTO habit_tracker (goal, progress, date) VALUES ('Drink 2 liters of water daily', 1.5, '2022-07-15');
INSERT INTO habit_tracker (goal, progress, date) VALUES ('Exercise for 30 minutes daily', 0.5, '2022-07-15');
INSERT INTO habit_tracker (goal, progress, date) VALUES ('Read 20 pages daily', 20, '2022-07-15');
INSERT INTO habit_tracker (goal, progress, date) VALUES ('Meditate for 15 minutes daily', 0, '2022-07-15');
INSERT INTO habit_tracker (goal, progress, date) VALUES ('Write in journal daily', 1, '2022-07-15');
INSERT INTO habit_tracker (goal, progress, date) VALUES ('Practice a new language for 1 hour daily', 0.75, '2022-07-15');
INSERT INTO habit_tracker (goal, progress, date) VALUES ('Limit screen time to 2 hours daily', 2, '2022-07-15');
INSERT INTO habit_tracker (goal, progress, date) VALUES ('Eat 5 servings of fruits and vegetables daily', 3, '2022-07-15');
INSERT INTO habit_tracker (goal, progress, date) VALUES ('Take a walk for 20 minutes daily', 0, '2022-07-15');
INSERT INTO habit_tracker (goal, progress, date) VALUES ('Practice gratitude journaling daily', 1, '2022-07-15');