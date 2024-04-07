CREATE TABLE IF NOT EXISTS classes (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(50) NOT NULL,
description TEXT NOT NULL,
reg_date TIMESTAMP
);

CREATE TABLE IF NOT EXISTS reviews (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
class_id INT(6) UNSIGNED,
rating INT(1),
comment TEXT,
FOREIGN KEY (class_id) REFERENCES classes(id),
reg_date TIMESTAMP
);

INSERT INTO classes (name, description) VALUES ('Yoga', 'A relaxing class focusing on flexibility and strength');
INSERT INTO classes (name, description) VALUES ('Zumba', 'An energetic dance workout to Latin music');
INSERT INTO classes (name, description) VALUES ('HIIT', 'High-intensity interval training for a full-body workout');
INSERT INTO classes (name, description) VALUES ('Pilates', 'Core-strengthening exercises for improved posture');
INSERT INTO classes (name, description) VALUES ('Spin', 'Indoor cycling class with high-energy music');
INSERT INTO classes (name, description) VALUES ('Bootcamp', 'Intensive fitness class combining cardio and strength training');
INSERT INTO classes (name, description) VALUES ('Barre', 'Ballet-inspired workout for muscle toning and flexibility');
INSERT INTO classes (name, description) VALUES ('CrossFit', 'Functional movements at a high intensity for all fitness levels');
INSERT INTO classes (name, description) VALUES ('Pound', 'Cardio jam session with drumsticks for a fun workout');
INSERT INTO classes (name, description) VALUES ('Aerial Yoga', 'Yoga poses practiced in a hammock suspended from the ceiling');
