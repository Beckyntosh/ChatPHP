CREATE TABLE IF NOT EXISTS fitness_classes (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL
);

CREATE TABLE IF NOT EXISTS class_ratings (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    class_id INT(6) UNSIGNED,
    rating INT(1),
    comment TEXT,
    FOREIGN KEY (class_id) REFERENCES fitness_classes(id)
);

INSERT INTO fitness_classes (name) VALUES ('Yoga');
INSERT INTO fitness_classes (name) VALUES ('Pilates');
INSERT INTO fitness_classes (name) VALUES ('Zumba');
INSERT INTO fitness_classes (name) VALUES ('CrossFit');
INSERT INTO fitness_classes (name) VALUES ('Spin');
INSERT INTO fitness_classes (name) VALUES ('Body Pump');
INSERT INTO fitness_classes (name) VALUES ('Kickboxing');
INSERT INTO fitness_classes (name) VALUES ('Barre');
INSERT INTO fitness_classes (name) VALUES ('HIIT');
INSERT INTO fitness_classes (name) VALUES ('Aqua Aerobics');
