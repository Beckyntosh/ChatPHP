CREATE TABLE IF NOT EXISTS plants (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    plant_name VARCHAR(30) NOT NULL,
    planting_date DATE,
    care_schedule TEXT,
    growth_stage VARCHAR(50),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO plants (plant_name, planting_date, care_schedule, growth_stage) VALUES ('Rose', '2022-01-15', 'Watering every 2 days', 'Flowering');
INSERT INTO plants (plant_name, planting_date, care_schedule, growth_stage) VALUES ('Lavender', '2022-01-20', 'Pruning once a month', 'Blooming');
INSERT INTO plants (plant_name, planting_date, care_schedule, growth_stage) VALUES ('Tomato', '2022-02-05', 'Fertilizing every week', 'Fruiting');
INSERT INTO plants (plant_name, planting_date, care_schedule, growth_stage) VALUES ('Basil', '2022-02-10', 'Harvesting every 2 weeks', 'Herbs');
INSERT INTO plants (plant_name, planting_date, care_schedule, growth_stage) VALUES ('Sunflower', '2022-03-01', 'Sunlight for 8 hours a day', 'Tall');
INSERT INTO plants (plant_name, planting_date, care_schedule, growth_stage) VALUES ('Cactus', '2022-03-10', 'Watering once a month', 'Succulent');
INSERT INTO plants (plant_name, planting_date, care_schedule, growth_stage) VALUES ('Orchid', '2022-03-15', 'Humid environment', 'Exotic');
INSERT INTO plants (plant_name, planting_date, care_schedule, growth_stage) VALUES ('Fern', '2022-04-02', 'Misting daily', 'Shaded');
INSERT INTO plants (plant_name, planting_date, care_schedule, growth_stage) VALUES ('Aloe Vera', '2022-04-10', 'Indirect sunlight', 'Healing');
INSERT INTO plants (plant_name, planting_date, care_schedule, growth_stage) VALUES ('Pepper', '2022-04-20', 'Mulching every 2 weeks', 'Spicy');
