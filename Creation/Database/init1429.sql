CREATE TABLE IF NOT EXISTS plants (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
plant_name VARCHAR(50) NOT NULL,
care_schedule TEXT NOT NULL,
reg_date TIMESTAMP
);

INSERT INTO plants (plant_name, care_schedule) VALUES ('Tomato plants', 'Water every day');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Rose plants', 'Fertilize once a month');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Lavender plants', 'Prune every spring');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Basil plants', 'Keep soil moist');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Sunflower plants', 'Full sun required');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Mint plants', 'Repot every year');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Cactus plants', 'Water sparingly');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Succulent plants', 'Avoid overwatering');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Spider plants', 'Keep away from direct sunlight');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Fiddle leaf fig plants', 'Mist leaves regularly');
