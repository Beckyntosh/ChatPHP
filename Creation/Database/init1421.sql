-- init.sql file

CREATE TABLE IF NOT EXISTS habits (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
habit_name VARCHAR(50) NOT NULL,
habit_goal INT(10) NOT NULL,
reg_date TIMESTAMP
);

CREATE TABLE IF NOT EXISTS habit_entries (
entry_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
habit_id INT(6) UNSIGNED,
entry_date DATE NOT NULL,
quantity INT(10) NOT NULL,
FOREIGN KEY (habit_id) REFERENCES habits(id)
);

INSERT INTO habits (habit_name, habit_goal) VALUES ('Drink 2 liters of water daily', 2);
INSERT INTO habits (habit_name, habit_goal) VALUES ('Exercise for 30 minutes daily', 30);
INSERT INTO habits (habit_name, habit_goal) VALUES ('Read for 1 hour daily', 60);
INSERT INTO habits (habit_name, habit_goal) VALUES ('Meditate for 15 minutes daily', 15);
INSERT INTO habits (habit_name, habit_goal) VALUES ('Eat 5 servings of fruits and vegetables daily', 5);
INSERT INTO habits (habit_name, habit_goal) VALUES ('Walk 10,000 steps daily', 10000);
INSERT INTO habits (habit_name, habit_goal) VALUES ('Write in journal daily', 1);
INSERT INTO habits (habit_name, habit_goal) VALUES ('Practice a new language for 30 minutes daily', 30);
INSERT INTO habits (habit_name, habit_goal) VALUES ('Limit screen time to 1 hour daily', 60);
INSERT INTO habits (habit_name, habit_goal) VALUES ('Get 8 hours of sleep daily', 8);