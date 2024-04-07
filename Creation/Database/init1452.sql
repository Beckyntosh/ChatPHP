CREATE TABLE plants (
    id INT AUTO_INCREMENT PRIMARY KEY,
    plant_name VARCHAR(255) NOT NULL,
    care_schedule TEXT NOT NULL
);

INSERT INTO plants (plant_name, care_schedule) VALUES ('Tomato plants', 'Water daily and fertilize weekly');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Lavender', 'Water every other day and trim every month');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Rosemary', 'Water twice a week and prune every season');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Succulent', 'Water once every two weeks and provide sunlight');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Basil', 'Water regularly and trim leaves for growth');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Cactus', 'Minimal watering and indirect sunlight');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Sunflower', 'Water deeply once a week and stake if necessary');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Mint', 'Keep soil moist and give shade in hot weather');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Aloe Vera', 'Water sparingly and provide bright but indirect light');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Orchid', 'Mist leaves occasionally and avoid direct sunlight');
