CREATE TABLE IF NOT EXISTS Plants (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    care_schedule TEXT NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    );

INSERT INTO Plants (name, care_schedule) VALUES ('Tomato', 'Water every 2 days, fertilize once a week');
INSERT INTO Plants (name, care_schedule) VALUES ('Rose', 'Water every 3 days, prune every month');
INSERT INTO Plants (name, care_schedule) VALUES ('Lavender', 'Water once a week, trim after flowering');
INSERT INTO Plants (name, care_schedule) VALUES ('Basil', 'Water daily, pinch off flowers');
INSERT INTO Plants (name, care_schedule) VALUES ('Cactus', 'Water every 2 weeks, provide sunlight');
INSERT INTO Plants (name, care_schedule) VALUES ('Succulent', 'Water every month, well-draining soil');
INSERT INTO Plants (name, care_schedule) VALUES ('Orchid', 'Water sparingly, indirect light');
INSERT INTO Plants (name, care_schedule) VALUES ('Fern', 'Keep soil moist, mist regularly');
INSERT INTO Plants (name, care_schedule) VALUES ('Snake Plant', 'Water sparingly, low light');
INSERT INTO Plants (name, care_schedule) VALUES ('Pothos', 'Water weekly, vine plant');
