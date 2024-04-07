CREATE TABLE IF NOT EXISTS classes (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS ratings (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    class_id INT(6) UNSIGNED,
    rating INT(1),
    review TEXT,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (class_id) REFERENCES classes(id)
);

INSERT INTO classes (title, description) VALUES ("Yoga Class", "Relaxing and rejuvenating yoga session");
INSERT INTO classes (title, description) VALUES ("Spin Class", "High-intensity cycling workout");
INSERT INTO classes (title, description) VALUES ("Zumba Class", "Fun and energetic dance fitness class");
INSERT INTO classes (title, description) VALUES ("Pilates Class", "Core-strengthening and flexibility workout");
INSERT INTO classes (title, description) VALUES ("Boxing Class", "Cardio and strength training through boxing techniques");

INSERT INTO ratings (class_id, rating, review) VALUES (1, 4, "Great instructor and peaceful environment");
INSERT INTO ratings (class_id, rating, review) VALUES (2, 5, "Intense workout with motivating music");
INSERT INTO ratings (class_id, rating, review) VALUES (3, 3, "Not my favorite style but fun to try");
INSERT INTO ratings (class_id, rating, review) VALUES (4, 4, "Helped improve my posture and strength");
INSERT INTO ratings (class_id, rating, review) VALUES (5, 5, "Perfect mix of cardio and strength exercises");
