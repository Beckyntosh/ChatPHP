CREATE TABLE IF NOT EXISTS habit_tracker (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
	habitName VARCHAR(255) NOT NULL,
	habitGoal VARCHAR(255) NOT NULL,
	habitDate DATE NOT NULL,
	createdAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO habit_tracker (habitName, habitGoal, habitDate) VALUES ('Exercise', 'Workout for 30 minutes daily', '2022-10-01');
INSERT INTO habit_tracker (habitName, habitGoal, habitDate) VALUES ('Reading', 'Read 20 pages daily', '2022-10-02');
INSERT INTO habit_tracker (habitName, habitGoal, habitDate) VALUES ('Meditation', 'Meditate for 10 minutes daily', '2022-10-03');
INSERT INTO habit_tracker (habitName, habitGoal, habitDate) VALUES ('Healthy Eating', 'Eat 5 servings of fruits and vegetables daily', '2022-10-04');
INSERT INTO habit_tracker (habitName, habitGoal, habitDate) VALUES ('Journaling', 'Write in journal for 15 minutes daily', '2022-10-05');
INSERT INTO habit_tracker (habitName, habitGoal, habitDate) VALUES ('Sleep', 'Get 8 hours of sleep daily', '2022-10-06');
INSERT INTO habit_tracker (habitName, habitGoal, habitDate) VALUES ('Yoga', 'Practice yoga for 20 minutes daily', '2022-10-07');
INSERT INTO habit_tracker (habitName, habitGoal, habitDate) VALUES ('Gratitude', 'Practice gratitude journaling daily', '2022-10-08');
INSERT INTO habit_tracker (habitName, habitGoal, habitDate) VALUES ('Language Learning', 'Learn new words daily', '2022-10-09');
INSERT INTO habit_tracker (habitName, habitGoal, habitDate) VALUES ('Mindfulness', 'Practice mindfulness exercises daily', '2022-10-10');
