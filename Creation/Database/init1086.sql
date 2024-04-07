CREATE TABLE IF NOT EXISTS fitness_classes (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
class_name VARCHAR(30) NOT NULL,
description TEXT,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS class_ratings (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
class_id INT(6) UNSIGNED,
rating INT(1),
feedback TEXT,
FOREIGN KEY (class_id) REFERENCES fitness_classes(id)
);

INSERT INTO fitness_classes (class_name, description) VALUES ('Yoga Class', 'Beginner level yoga class focusing on stretching and relaxation');
INSERT INTO fitness_classes (class_name, description) VALUES ('Cardio Kickboxing', 'High-intensity cardio workout combining kickboxing techniques');
INSERT INTO fitness_classes (class_name, description) VALUES ('Pilates', 'Core-strengthening exercises to improve posture and flexibility');
INSERT INTO fitness_classes (class_name, description) VALUES ('Spinning Class', 'Indoor cycling class with energizing music and motivational instructors');
INSERT INTO fitness_classes (class_name, description) VALUES ('Zumba', 'Dance-based fitness class for a fun and energetic workout');
INSERT INTO fitness_classes (class_name, description) VALUES ('CrossFit', 'Functional fitness program incorporating various exercises and challenges');
INSERT INTO fitness_classes (class_name, description) VALUES ('Bootcamp', 'Military-style group workout designed to build strength and endurance');
INSERT INTO fitness_classes (class_name, description) VALUES ('Barre Class', 'Ballet-inspired workout focusing on toning and sculpting muscles');
INSERT INTO fitness_classes (class_name, description) VALUES ('HIIT', 'High-intensity interval training for maximum calorie burn and fitness gains');
INSERT INTO fitness_classes (class_name, description) VALUES ('Aqua Aerobics', 'Water-based aerobic exercises for low-impact yet effective workout');