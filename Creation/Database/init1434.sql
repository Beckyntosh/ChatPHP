CREATE TABLE IF NOT EXISTS Plants (
id INT AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(255) NOT NULL,
care_schedule TEXT NOT NULL,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO Plants (name, care_schedule) VALUES ('Tomato plants', 'Water every day, fertilize every 2 weeks');
INSERT INTO Plants (name, care_schedule) VALUES ('Rose bushes', 'Prune every spring, water twice a week');
INSERT INTO Plants (name, care_schedule) VALUES ('Lavender', 'Prune after flowering, full sun');
INSERT INTO Plants (name, care_schedule) VALUES ('Basil', 'Water consistently, sunlight');
INSERT INTO Plants (name, care_schedule) VALUES ('Cactus', 'Water sparingly, bright light');
INSERT INTO Plants (name, care_schedule) VALUES ('Succulent', 'Water once a week, indirect light');
INSERT INTO Plants (name, care_schedule) VALUES ('Daisy', 'Deadhead spent flowers, full sun');
INSERT INTO Plants (name, care_schedule) VALUES ('Mint', 'Grow in a pot, water regularly');
INSERT INTO Plants (name, care_schedule) VALUES ('Fern', 'Keep soil moist, filtered light');
INSERT INTO Plants (name, care_schedule) VALUES ('Orchid', 'Lukewarm water, indirect light');
