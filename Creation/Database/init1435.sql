-- init.sql

CREATE TABLE IF NOT EXISTS Plants (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
plant_name VARCHAR(30) NOT NULL,
care_schedule VARCHAR(100) NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO Plants (plant_name, care_schedule) VALUES ('Tomato plants', 'Water daily');
INSERT INTO Plants (plant_name, care_schedule) VALUES ('Lavender', 'Prune weekly');
INSERT INTO Plants (plant_name, care_schedule) VALUES ('Rose', 'Fertilize monthly');
INSERT INTO Plants (plant_name, care_schedule) VALUES ('Tulip', 'Plant in fall');
INSERT INTO Plants (plant_name, care_schedule) VALUES ('Sunflower', 'Full sun');
INSERT INTO Plants (plant_name, care_schedule) VALUES ('Basil', 'Harvest leaves regularly');
INSERT INTO Plants (plant_name, care_schedule) VALUES ('Cactus', 'Minimal water');
INSERT INTO Plants (plant_name, care_schedule) VALUES ('Orchid', 'Mist leaves daily');
INSERT INTO Plants (plant_name, care_schedule) VALUES ('Pepper plants', 'Use mulch for temperature control');
INSERT INTO Plants (plant_name, care_schedule) VALUES ('Succulent', 'Provide good drainage');