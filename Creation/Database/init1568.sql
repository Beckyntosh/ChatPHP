CREATE TABLE IF NOT EXISTS fleet_vehicles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    make VARCHAR(50),
    model VARCHAR(50),
    year INT,
    maintenance_schedule TEXT
);

INSERT INTO fleet_vehicles (make, model, year, maintenance_schedule) VALUES ('Ford', 'Transit', 2023, 'Regular oil changes and inspections');
INSERT INTO fleet_vehicles (make, model, year, maintenance_schedule) VALUES ('Chevrolet', 'Colorado', 2022, 'Annual tune-up and tire rotations');
INSERT INTO fleet_vehicles (make, model, year, maintenance_schedule) VALUES ('Toyota', 'Camry', 2021, 'Bi-annual brake check and fluid top-up');
INSERT INTO fleet_vehicles (make, model, year, maintenance_schedule) VALUES ('Honda', 'Civic', 2020, 'Monthly tire pressure checks and engine oil checks');
INSERT INTO fleet_vehicles (make, model, year, maintenance_schedule) VALUES ('Nissan', 'Altima', 2019, 'Quarterly filter replacements and alignments');
INSERT INTO fleet_vehicles (make, model, year, maintenance_schedule) VALUES ('Ford', 'F-150', 2018, 'Semi-annual battery tests and belt inspections');
INSERT INTO fleet_vehicles (make, model, year, maintenance_schedule) VALUES ('Jeep', 'Wrangler', 2017, 'Annual fluid flushes and suspension checks');
INSERT INTO fleet_vehicles (make, model, year, maintenance_schedule) VALUES ('Chevrolet', 'Equinox', 2016, 'Bi-annual coolant checks and spark plug replacements');
INSERT INTO fleet_vehicles (make, model, year, maintenance_schedule) VALUES ('Dodge', 'Charger', 2015, 'Monthly air filter replacements and brake pad inspections');
INSERT INTO fleet_vehicles (make, model, year, maintenance_schedule) VALUES ('Toyota', 'Rav4', 2014, 'Quarterly transmission fluid changes and tire rotations');