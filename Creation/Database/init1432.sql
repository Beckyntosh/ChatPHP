CREATE TABLE IF NOT EXISTS plants (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(30) NOT NULL,
  care_schedule TEXT,
  reg_date TIMESTAMP
);

INSERT INTO plants (name, care_schedule) VALUES ('Tomato plants', 'Water every other day');
INSERT INTO plants (name, care_schedule) VALUES ('Basil', 'Sunlight for 4 hours daily, water every 2 days');
INSERT INTO plants (name, care_schedule) VALUES ('Lavender', 'Low water, prune every 2 weeks');
INSERT INTO plants (name, care_schedule) VALUES ('Succulent', 'Water once a week');
INSERT INTO plants (name, care_schedule) VALUES ('Rosemary', 'Water every 3 days, direct sunlight');
INSERT INTO plants (name, care_schedule) VALUES ('Mint', 'Likes partial shade, water daily');
INSERT INTO plants (name, care_schedule) VALUES ('Cactus', 'Low water, bright indirect light');
INSERT INTO plants (name, care_schedule) VALUES ('Orchid', 'Spray mist every day, indirect light');
INSERT INTO plants (name, care_schedule) VALUES ('Fern', 'High humidity, indirect light');
INSERT INTO plants (name, care_schedule) VALUES ('Snake plant', 'Low water, low light');
