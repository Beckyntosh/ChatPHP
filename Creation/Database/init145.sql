CREATE TABLE IF NOT EXISTS plants (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
plant_name VARCHAR(30) NOT NULL,
plant_type VARCHAR(30) NOT NULL,
care_schedule VARCHAR(50),
growth_stage VARCHAR(50),
reg_date TIMESTAMP
);

INSERT INTO plants (plant_name, plant_type, care_schedule, growth_stage) VALUES ('Rose', 'Flower', 'Twice a week', 'Budding');
INSERT INTO plants (plant_name, plant_type, care_schedule, growth_stage) VALUES ('Tomato', 'Vegetable', 'Once a week', 'Fruiting');
INSERT INTO plants (plant_name, plant_type, care_schedule, growth_stage) VALUES ('Basil', 'Herb', 'Every 3 days', 'Seedling');
INSERT INTO plants (plant_name, plant_type, care_schedule, growth_stage) VALUES ('Lavender', 'Flower', 'Once a week', 'Mature');
INSERT INTO plants (plant_name, plant_type, care_schedule, growth_stage) VALUES ('Cactus', 'Succulent', 'Once a month', 'Established');
INSERT INTO plants (plant_name, plant_type, care_schedule, growth_stage) VALUES ('Mint', 'Herb', 'Twice a week', 'Seedling');
INSERT INTO plants (plant_name, plant_type, care_schedule, growth_stage) VALUES ('Sunflower', 'Flower', 'Every 4 days', 'Budding');
INSERT INTO plants (plant_name, plant_type, care_schedule, growth_stage) VALUES ('Lemon Tree', 'Fruit Tree', 'Once a week', 'Fruiting');
INSERT INTO plants (plant_name, plant_type, care_schedule, growth_stage) VALUES ('Snake Plant', 'Indoor Plant', 'Every 2 weeks', 'Mature');
INSERT INTO plants (plant_name, plant_type, care_schedule, growth_stage) VALUES ('Pothos', 'Hanging Plant', 'Once a week', 'Established');
