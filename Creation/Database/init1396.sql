CREATE TABLE IF NOT EXISTS habits (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    habit_name VARCHAR(255) NOT NULL,
    goal INT(11) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS habit_entries (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    habit_id INT(6) UNSIGNED,
    date DATE NOT NULL,
    quantity INT(11) NOT NULL,
    FOREIGN KEY (habit_id) REFERENCES habits(id),
    UNIQUE (habit_id, date)
);

INSERT INTO habits (habit_name, goal) VALUES ('Drink 2 liters of water daily', 2000);
INSERT INTO habits (habit_name, goal) VALUES ('30 minutes of exercise daily', 1);
INSERT INTO habits (habit_name, goal) VALUES ('Meditate for 10 minutes daily', 10);
INSERT INTO habits (habit_name, goal) VALUES ('Read for 30 minutes daily', 30);
INSERT INTO habits (habit_name, goal) VALUES ('No sugar intake for a week', 0);
INSERT INTO habits (habit_name, goal) VALUES ('Write in journal daily', 1);
INSERT INTO habits (habit_name, goal) VALUES ('Cook meals at home instead of ordering', 7);
INSERT INTO habits (habit_name, goal) VALUES ('10000 steps daily', 10000);
INSERT INTO habits (habit_name, goal) VALUES ('Sleep for at least 8 hours daily', 480);
INSERT INTO habits (habit_name, goal) VALUES ('Practice a new language for 30 minutes daily', 30);
