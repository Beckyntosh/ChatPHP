CREATE TABLE IF NOT EXISTS habit_tracker (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    habit_name VARCHAR(255) NOT NULL,
    target INT(6) NOT NULL,
    progress INT(6) NOT NULL DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO habit_tracker (habit_name, target) VALUES ('Drink 2 liters of water daily', 2);
INSERT INTO habit_tracker (habit_name, target) VALUES ('Exercise for 30 minutes', 1);
INSERT INTO habit_tracker (habit_name, target) VALUES ('Read for 30 minutes', 1);
INSERT INTO habit_tracker (habit_name, target) VALUES ('Meditate for 10 minutes', 1);
INSERT INTO habit_tracker (habit_name, target) VALUES ('Write a journal entry', 1);
INSERT INTO habit_tracker (habit_name, target) VALUES ('Eat 5 servings of fruits and vegetables', 5);
INSERT INTO habit_tracker (habit_name, target) VALUES ('Get 8 hours of sleep', 1);
INSERT INTO habit_tracker (habit_name, target) VALUES ('Practice gratitude', 1);
INSERT INTO habit_tracker (habit_name, target) VALUES ('Limit screen time to 1 hour', 1);
INSERT INTO habit_tracker (habit_name, target) VALUES ('Go for a walk', 1);
