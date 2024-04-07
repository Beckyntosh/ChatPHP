CREATE TABLE IF NOT EXISTS plants (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    plantName VARCHAR(30) NOT NULL,
    careSchedule VARCHAR(255) NOT NULL,
    reg_date TIMESTAMP
);

INSERT INTO plants (plantName, careSchedule) VALUES ('Tomato', 'Water every 2 days');
INSERT INTO plants (plantName, careSchedule) VALUES ('Rose', 'Prune every month');
INSERT INTO plants (plantName, careSchedule) VALUES ('Lavender', 'Sunlight for 6 hours daily');
INSERT INTO plants (plantName, careSchedule) VALUES ('Basil', 'Harvest leaves weekly');
INSERT INTO plants (plantName, careSchedule) VALUES ('Succulent', 'Water sparingly');
INSERT INTO plants (plantName, careSchedule) VALUES ('Orchid', 'Mist daily');
INSERT INTO plants (plantName, careSchedule) VALUES ('Sunflower', 'Support tall stems');
INSERT INTO plants (plantName, careSchedule) VALUES ('Cactus', 'Avoid overwatering');
INSERT INTO plants (plantName, careSchedule) VALUES ('Mint', 'Keep in partial shade');
INSERT INTO plants (plantName, careSchedule) VALUES ('Daisy', 'Deadhead regularly');
