CREATE TABLE IF NOT EXISTS plants (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    care_schedule TEXT,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO plants (name, care_schedule) VALUES ('Tomato plants', 'Water every 2 days');
INSERT INTO plants (name, care_schedule) VALUES ('Rose bushes', 'Prune bi-weekly');
INSERT INTO plants (name, care_schedule) VALUES ('Lavender', 'Sunlight for 6 hours daily');
INSERT INTO plants (name, care_schedule) VALUES ('Basil', 'Water daily and trim leaves regularly');
INSERT INTO plants (name, care_schedule) VALUES ('Snake plant', 'Water sparingly and place in indirect sunlight');
INSERT INTO plants (name, care_schedule) VALUES ('Ferns', 'Place in high humidity area and water regularly');
INSERT INTO plants (name, care_schedule) VALUES ('Cactus', 'Water sparingly and provide plenty of sunlight');
INSERT INTO plants (name, care_schedule) VALUES ('Orchids', 'Mist occasionally and avoid direct sunlight');
INSERT INTO plants (name, care_schedule) VALUES ('Succulents', 'Water infrequently and well-draining soil');
INSERT INTO plants (name, care_schedule) VALUES ('Spider plant', 'Water moderately and keep in indirect sunlight');