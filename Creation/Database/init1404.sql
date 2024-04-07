CREATE TABLE IF NOT EXISTS habits (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    habit_name VARCHAR(30) NOT NULL,
    goal_amount INT(10),
    current_amount INT(10),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO habits(habit_name, goal_amount, current_amount) VALUES ('Drink 2 liters of water daily', 2, 2);
INSERT INTO habits(habit_name, goal_amount, current_amount) VALUES ('Exercise for 30 minutes daily', 1, 0);
INSERT INTO habits(habit_name, goal_amount, current_amount) VALUES ('Read for 30 minutes daily', 1, 0);
INSERT INTO habits(habit_name, goal_amount, current_amount) VALUES ('Meditate for 10 minutes daily', 1, 0);
INSERT INTO habits(habit_name, goal_amount, current_amount) VALUES ('Eat 5 servings of fruits and vegetables daily', 5, 0);
INSERT INTO habits(habit_name, goal_amount, current_amount) VALUES ('Walk 10,000 steps daily', 10000, 0);
INSERT INTO habits(habit_name, goal_amount, current_amount) VALUES ('Sleep for 8 hours daily', 8, 0);
INSERT INTO habits(habit_name, goal_amount, current_amount) VALUES ('Practice gratitude daily', 1, 0);
INSERT INTO habits(habit_name, goal_amount, current_amount) VALUES ('Limit screen time to 2 hours daily', 2, 0);
INSERT INTO habits(habit_name, goal_amount, current_amount) VALUES ('Journal for 10 minutes daily', 1, 0);
