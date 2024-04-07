CREATE TABLE IF NOT EXISTS plants (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(50) NOT NULL,
  care_schedule VARCHAR(255) NOT NULL,
  date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO plants (name, care_schedule) VALUES ('Tomato plants', 'Water every day');
INSERT INTO plants (name, care_schedule) VALUES ('Rose bushes', 'Prune monthly');
INSERT INTO plants (name, care_schedule) VALUES ('Lavender', 'Sunlight for 6 hours daily');
INSERT INTO plants (name, care_schedule) VALUES ('Basil', 'Harvest leaves every week');
INSERT INTO plants (name, care_schedule) VALUES ('Cactus', 'Water sparingly');
INSERT INTO plants (name, care_schedule) VALUES ('Tulips', 'Plant bulbs in fall season');
INSERT INTO plants (name, care_schedule) VALUES ('Mint', 'Keep soil moist');
INSERT INTO plants (name, care_schedule) VALUES ('Lemon tree', 'Fertilize every 2 months');
INSERT INTO plants (name, care_schedule) VALUES ('Orchids', 'Maintain high humidity');
INSERT INTO plants (name, care_schedule) VALUES ('Succulents', 'Water once a week');
