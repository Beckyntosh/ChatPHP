CREATE TABLE IF NOT EXISTS plants (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    plant_name VARCHAR(30) NOT NULL,
    care_schedule VARCHAR(255) NOT NULL,
    reg_date TIMESTAMP
);

INSERT INTO plants (plant_name, care_schedule) VALUES ('Tomato plants', 'Water every other day');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Rose bush', 'Prune monthly and fertilize bi-weekly');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Succulent', 'Water sparingly once a week');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Lavender', 'Requires full sun and well-drained soil');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Basil', 'Keep soil consistently moist');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Cactus', 'Water once a month in winter, every 2 weeks in summer');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Snake plant', 'Thrives in low light, water sparingly');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Fiddle leaf fig', 'Requires bright, indirect light');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Orchid', 'Water every 1-2 weeks, fertilize monthly');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Pothos', 'Tolerates low light, keep soil evenly moist');
