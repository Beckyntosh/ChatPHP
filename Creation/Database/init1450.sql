CREATE TABLE IF NOT EXISTS garden_plants (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    plant_name VARCHAR(50) NOT NULL,
    care_schedule TEXT NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO garden_plants (plant_name, care_schedule) VALUES ('Tomato plants', 'Water every other day');
INSERT INTO garden_plants (plant_name, care_schedule) VALUES ('Lavender', 'Prune once a month');
INSERT INTO garden_plants (plant_name, care_schedule) VALUES ('Basil', 'Harvest leaves weekly');
INSERT INTO garden_plants (plant_name, care_schedule) VALUES ('Sunflower', 'Rotate to follow sun');
INSERT INTO garden_plants (plant_name, care_schedule) VALUES ('Cactus', 'Water sparingly');
INSERT INTO garden_plants (plant_name, care_schedule) VALUES ('Rosemary', 'Trim in spring');
INSERT INTO garden_plants (plant_name, care_schedule) VALUES ('Mint', 'Keep in separate pot');
INSERT INTO garden_plants (plant_name, care_schedule) VALUES ('Succulent', 'Avoid overwatering');
INSERT INTO garden_plants (plant_name, care_schedule) VALUES ('Pothos', 'Keep in indirect light');
INSERT INTO garden_plants (plant_name, care_schedule) VALUES ('Fern', 'Mist leaves regularly');
