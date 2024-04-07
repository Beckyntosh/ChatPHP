CREATE TABLE IF NOT EXISTS plants (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
plant_name VARCHAR(50) NOT NULL,
care_schedule TEXT NOT NULL,
reg_date TIMESTAMP
);

-- Insert values into plants table
INSERT INTO plants (plant_name, care_schedule) VALUES ('Tomato plants', 'Water daily and fertilize once a week');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Lavender', 'Sunlight and prune regularly');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Basil', 'Water every other day and protect from cold weather');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Succulent', 'Water sparingly and provide plenty of sunlight');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Rose', 'Prune in spring and deadhead regularly');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Cactus', 'Water once a month and avoid overwatering');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Mint', 'Keep soil moist and provide shade in hot weather');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Spider plant', 'Water twice a week and mist leaves often');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Aloe Vera', 'Water every 3 weeks and keep in well-draining soil');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Orchid', 'Water lightly and provide high humidity');