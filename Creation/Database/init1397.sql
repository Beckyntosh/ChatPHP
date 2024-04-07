CREATE TABLE IF NOT EXISTS habit_tracker (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    habit VARCHAR(255) NOT NULL,
    goal VARCHAR(50) NOT NULL,
    date_tracked DATE NOT NULL,
    quantity_completed DECIMAL(10,2) DEFAULT 0.00,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO habit_tracker (habit, goal, date_tracked, quantity_completed) VALUES ('Drink 2 liters of water daily', 'Stay hydrated', '2022-10-01', 2.00);
INSERT INTO habit_tracker (habit, goal, date_tracked, quantity_completed) VALUES ('Exercise for 30 minutes daily', 'Stay active', '2022-10-01', 0.5);
INSERT INTO habit_tracker (habit, goal, date_tracked, quantity_completed) VALUES ('Read 20 pages daily', 'Cultivate reading habit', '2022-10-01', 20.00);
INSERT INTO habit_tracker (habit, goal, date_tracked, quantity_completed) VALUES ('Meditate for 15 minutes daily', 'Improve mental well-being', '2022-10-01', 0.25);
INSERT INTO habit_tracker (habit, goal, date_tracked, quantity_completed) VALUES ('No Sugar Challenge', 'Cut down on sugar', '2022-10-01', 0.00);
INSERT INTO habit_tracker (habit, goal, date_tracked, quantity_completed) VALUES ('Write in gratitude journal', 'Cultivate gratitude', '2022-10-01', 1.00);
INSERT INTO habit_tracker (habit, goal, date_tracked, quantity_completed) VALUES ('Practice mindfulness', 'Improve focus', '2022-10-01', 0.00);
INSERT INTO habit_tracker (habit, goal, date_tracked, quantity_completed) VALUES ('Walk 10,000 steps daily', 'Stay active', '2022-10-01', 8000.00);
INSERT INTO habit_tracker (habit, goal, date_tracked, quantity_completed) VALUES ('Cook a healthy meal', 'Eat nutritious food', '2022-10-01', 1.00);
INSERT INTO habit_tracker (habit, goal, date_tracked, quantity_completed) VALUES ('Limit screen time', 'Reduce digital dependency', '2022-10-01', 4.00);
