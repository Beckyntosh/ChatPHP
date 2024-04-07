CREATE TABLE plants (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    care_schedule TEXT NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO plants (name, care_schedule) VALUES ('Tomato plants', 'Water every 2 days');
INSERT INTO plants (name, care_schedule) VALUES ('Rose bushes', 'Prune every month');
INSERT INTO plants (name, care_schedule) VALUES ('Lavender', 'Sunlight for 6 hours daily');
INSERT INTO plants (name, care_schedule) VALUES ('Cactus', 'Water sparingly every 2 weeks');
INSERT INTO plants (name, care_schedule) VALUES ('Basil', 'Harvest leaves regularly');
INSERT INTO plants (name, care_schedule) VALUES ('Sunflowers', 'Support tall stalks with stakes');
INSERT INTO plants (name, care_schedule) VALUES ('Succulents', 'Use well-draining soil');
INSERT INTO plants (name, care_schedule) VALUES ('Mint', 'Contain in pot to prevent spreading');
INSERT INTO plants (name, care_schedule) VALUES ('Ferns', 'Mist leaves for humidity');
INSERT INTO plants (name, care_schedule) VALUES ('Orchids', 'Water with ice cubes weekly');
