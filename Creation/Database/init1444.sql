CREATE TABLE IF NOT EXISTS plants (
  id INT AUTO_INCREMENT PRIMARY KEY,
  plant_name VARCHAR(255) NOT NULL,
  care_schedule TEXT NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO plants (plant_name, care_schedule) VALUES ('Tomato', 'Water every 2 days, fertilize once a week');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Rose', 'Prune every 2 weeks, water every other day');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Lavender', 'Trim after flowering, water sparingly');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Basil', 'Harvest regularly, keep well-watered');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Sunflower', 'Full sun, water daily');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Cactus', 'Minimal water, full sun');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Fern', 'Keep soil moist, indirect light');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Aloe Vera', 'Water sparingly, lots of sunlight');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Jasmine', 'Prune after blooming, water regularly');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Orchid', 'Mist leaves, indirect light');
