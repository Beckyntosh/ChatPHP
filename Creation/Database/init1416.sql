CREATE TABLE IF NOT EXISTS Habits (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    habit_name VARCHAR(255) NOT NULL,
    goal_quantity INT(10),
    current_quantity INT(10),
    goal_date DATE,
    reg_date TIMESTAMP
);

INSERT INTO Habits (habit_name, goal_quantity, current_quantity, goal_date) VALUES ('Drink 2 liters of water daily', 2, 0, '2022-12-31');
INSERT INTO Habits (habit_name, goal_quantity, current_quantity, goal_date) VALUES ('Exercise for 30 minutes daily', 1, 0, '2022-12-31');
INSERT INTO Habits (habit_name, goal_quantity, current_quantity, goal_date) VALUES ('Read 10 pages of a book daily', 10, 0, '2022-12-31');
INSERT INTO Habits (habit_name, goal_quantity, current_quantity, goal_date) VALUES ('Meditate for 15 minutes daily', 1, 0, '2022-12-31');
INSERT INTO Habits (habit_name, goal_quantity, current_quantity, goal_date) VALUES ('Write 500 words daily', 500, 0, '2022-12-31');
INSERT INTO Habits (habit_name, goal_quantity, current_quantity, goal_date) VALUES ('Eat 5 servings of fruits and vegetables daily', 5, 0, '2022-12-31');
INSERT INTO Habits (habit_name, goal_quantity, current_quantity, goal_date) VALUES ('Practice a new language for 20 minutes daily', 1, 0, '2022-12-31');
INSERT INTO Habits (habit_name, goal_quantity, current_quantity, goal_date) VALUES ('Walk 10,000 steps daily', 10000, 0, '2022-12-31');
INSERT INTO Habits (habit_name, goal_quantity, current_quantity, goal_date) VALUES ('Limit screen time to 2 hours daily', 2, 0, '2022-12-31');
INSERT INTO Habits (habit_name, goal_quantity, current_quantity, goal_date) VALUES ('Get 8 hours of sleep daily', 8, 0, '2022-12-31');
