CREATE TABLE IF NOT EXISTS habits (
    id INT AUTO_INCREMENT PRIMARY KEY,
    habit VARCHAR(255) NOT NULL,
    target DECIMAL(10,2) NOT NULL,
    date DATE NOT NULL,
    UNIQUE KEY unique_habit_date (habit, date)
);

INSERT INTO habits (habit, target, date) VALUES ('Drink 2 liters of water daily', 2.00, '2022-12-01');
INSERT INTO habits (habit, target, date) VALUES ('Exercise for 30 minutes daily', 0.5, '2022-12-01');
INSERT INTO habits (habit, target, date) VALUES ('Read 1 chapter of a book daily', 1.00, '2022-12-01');
INSERT INTO habits (habit, target, date) VALUES ('Meditate for 10 minutes daily', 0.17, '2022-12-01');
INSERT INTO habits (habit, target, date) VALUES ('Eat 5 servings of fruits and vegetables daily', 5.00, '2022-12-01');
INSERT INTO habits (habit, target, date) VALUES ('Journal for 15 minutes daily', 0.25, '2022-12-01');
INSERT INTO habits (habit, target, date) VALUES ('Do a random act of kindness daily', 1.00, '2022-12-01');
INSERT INTO habits (habit, target, date) VALUES ('Practice gratitude daily', 1.00, '2022-12-01');
INSERT INTO habits (habit, target, date) VALUES ('Take a 20-minute walk daily', 0.33, '2022-12-01');
INSERT INTO habits (habit, target, date) VALUES ('Limit screen time to 1 hour daily', 1.00, '2022-12-01');
