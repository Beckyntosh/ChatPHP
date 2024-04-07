CREATE TABLE IF NOT EXISTS Plants (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
plant_name VARCHAR(50) NOT NULL,
care_schedule TEXT NOT NULL,
reg_date TIMESTAMP
);

INSERT INTO Plants (plant_name, care_schedule) VALUES ('Tomato plants', 'Water every 2 days, fertilize once a week');
INSERT INTO Plants (plant_name, care_schedule) VALUES ('Rose bush', 'Prune every spring, water twice a week');
INSERT INTO Plants (plant_name, care_schedule) VALUES ('Lavender plant', 'Full sun, well-drained soil, water only when soil is dry');
INSERT INTO Plants (plant_name, care_schedule) VALUES ('Cactus', 'Minimal watering, indirect sunlight');
INSERT INTO Plants (plant_name, care_schedule) VALUES ('Basil plant', 'Regular watering, requires sunlight');
INSERT INTO Plants (plant_name, care_schedule) VALUES ('Orchid', 'Mist daily, indirect sunlight');
INSERT INTO Plants (plant_name, care_schedule) VALUES ('Succulent', 'Minimal watering, avoid overwatering');
INSERT INTO Plants (plant_name, care_schedule) VALUES ('Zinnia flowers', 'Full sun, well-drained soil, deadhead faded blooms');
INSERT INTO Plants (plant_name, care_schedule) VALUES ('Bell pepper plant', 'Regular watering, fertilize once a month');
INSERT INTO Plants (plant_name, care_schedule) VALUES ('Aloe vera plant', 'Minimal watering, bright indirect sunlight');