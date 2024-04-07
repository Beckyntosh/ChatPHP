CREATE TABLE IF NOT EXISTS garden_plants (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  plant_name VARCHAR(50) NOT NULL,
  care_schedule TEXT NOT NULL,
  growth_stage VARCHAR(50) NOT NULL,
  reg_date TIMESTAMP
);

INSERT INTO garden_plants (plant_name, care_schedule, growth_stage) VALUES ('Rose', 'Water every 2 days', 'Budding');
INSERT INTO garden_plants (plant_name, care_schedule, growth_stage) VALUES ('Lavender', 'Sunlight for 6 hours a day', 'Blooming');
INSERT INTO garden_plants (plant_name, care_schedule, growth_stage) VALUES ('Tomato', 'Fertilize once a week', 'Ripening');
INSERT INTO garden_plants (plant_name, care_schedule, growth_stage) VALUES ('Basil', 'Prune every month', 'Flowering');
INSERT INTO garden_plants (plant_name, care_schedule, growth_stage) VALUES ('Sunflower', 'Support with stakes', 'Seeding');
INSERT INTO garden_plants (plant_name, care_schedule, growth_stage) VALUES ('Mint', 'Keep soil moist', 'Established');
INSERT INTO garden_plants (plant_name, care_schedule, growth_stage) VALUES ('Cactus', 'Water sparingly', 'Maturing');
INSERT INTO garden_plants (plant_name, care_schedule, growth_stage) VALUES ('Daisy', 'Deadhead spent blooms', 'Growing');
INSERT INTO garden_plants (plant_name, care_schedule, growth_stage) VALUES ('Zinnia', 'Mulch around plants', 'Developing');
INSERT INTO garden_plants (plant_name, care_schedule, growth_stage) VALUES ('Lily', 'Feed with balanced fertilizer', 'Flourishing');