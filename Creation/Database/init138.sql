CREATE TABLE IF NOT EXISTS habits (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  habit_name VARCHAR(30) NOT NULL,
  goal VARCHAR(255) NOT NULL,
  reminder_time TIME,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO habits (habit_name, goal, reminder_time) VALUES ('Exercise', 'Workout for 30 minutes', '08:00:00');
INSERT INTO habits (habit_name, goal, reminder_time) VALUES ('Reading', 'Read 1 chapter of a book', '21:00:00');
INSERT INTO habits (habit_name, goal, reminder_time) VALUES ('Meditation', 'Meditate for 15 minutes', '07:00:00');
INSERT INTO habits (habit_name, goal, reminder_time) VALUES ('Drink Water', 'Drink 8 glasses of water', '10:00:00');
INSERT INTO habits (habit_name, goal, reminder_time) VALUES ('Coding Practice', 'Code for 1 hour', '19:00:00');
INSERT INTO habits (habit_name, goal, reminder_time) VALUES ('Healthy Snack', 'Eat a piece of fruit', '15:00:00');
INSERT INTO habits (habit_name, goal, reminder_time) VALUES ('Yoga', 'Practice yoga for 20 minutes', '06:30:00');
INSERT INTO habits (habit_name, goal, reminder_time) VALUES ('Journaling', 'Write in journal for 10 minutes', '22:00:00');
INSERT INTO habits (habit_name, goal, reminder_time) VALUES ('Walking', 'Take a 30-minute walk', '17:30:00');
INSERT INTO habits (habit_name, goal, reminder_time) VALUES ('Gratitude', 'Express gratitude for 5 things', '09:00:00');
