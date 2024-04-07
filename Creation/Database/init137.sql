CREATE TABLE IF NOT EXISTS habits (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    habit_name VARCHAR(50) NOT NULL,
    goal_description VARCHAR(255),
    reminder_time TIME,
    reg_date TIMESTAMP
);

INSERT INTO habits (habit_name, goal_description, reminder_time) VALUES 
('Exercise', 'Go for a jog in the park', '08:00:00'),
('Reading', 'Read a chapter of a novel', '20:00:00'),
('Meditation', 'Practice mindfulness for 10 minutes', '12:00:00'),
('Water Intake', 'Drink at least 8 glasses of water', '09:00:00'),
('Coding', 'Work on a coding challenge', '15:00:00'),
('Drawing', 'Sketch a new art piece', '18:00:00'),
('Writing', 'Write a journal entry', '21:00:00'),
('Cooking', 'Try out a new recipe', '19:00:00'),
('Yoga', 'Do a 30-minute yoga session', '07:00:00'),
('Language Learning', 'Study vocabulary for 20 minutes', '16:00:00');
