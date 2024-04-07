CREATE TABLE IF NOT EXISTS plants (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
plant_name VARCHAR(30) NOT NULL,
care_schedule VARCHAR(50)
);

INSERT INTO plants (plant_name, care_schedule) VALUES ('Tomato plants', 'Weekly watering');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Basil', 'Bi-weekly pruning');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Lavender', 'Monthly fertilizing');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Rosemary', 'Twice a week watering');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Succulents', 'Monthly repotting');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Orchids', 'Weekly misting');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Sunflowers', 'Bi-weekly trimming');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Potted citrus tree', 'Monthly feeding');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Cacti', 'Bi-weekly watering');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Fiddle leaf fig', 'Weekly dusting');