CREATE TABLE IF NOT EXISTS fleet_vehicles (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    make VARCHAR(30) NOT NULL,
    model VARCHAR(30) NOT NULL,
    year YEAR(4) NOT NULL,
    maintenance_schedule TEXT,
    reg_date TIMESTAMP
);

INSERT INTO fleet_vehicles (make, model, year, maintenance_schedule) 
VALUES ('Ford', 'Transit', 2023, 'Monthly checkup');
INSERT INTO fleet_vehicles (make, model, year, maintenance_schedule) 
VALUES ('Toyota', 'Camry', 2021, 'Quarterly service');
INSERT INTO fleet_vehicles (make, model, year, maintenance_schedule) 
VALUES ('Chevrolet', 'Equinox', 2022, 'Bi-annual inspection');
INSERT INTO fleet_vehicles (make, model, year, maintenance_schedule) 
VALUES ('Honda', 'Civic', 2020, 'Annual tune-up');
INSERT INTO fleet_vehicles (make, model, year, maintenance_schedule) 
VALUES ('Nissan', 'Rogue', 2019, 'Monthly oil change');
INSERT INTO fleet_vehicles (make, model, year, maintenance_schedule) 
VALUES ('Volkswagen', 'Jetta', 2018, 'Bi-annual maintenance');
INSERT INTO fleet_vehicles (make, model, year, maintenance_schedule) 
VALUES ('Tesla', 'Model S', 2021, 'Quarterly diagnostics');
INSERT INTO fleet_vehicles (make, model, year, maintenance_schedule) 
VALUES ('Hyundai', 'Elantra', 2017, 'Annual fluid check');
INSERT INTO fleet_vehicles (make, model, year, maintenance_schedule) 
VALUES ('Subaru', 'Outback', 2020, 'Monthly tire rotation');
INSERT INTO fleet_vehicles (make, model, year, maintenance_schedule) 
VALUES ('Mazda', 'CX-5', 2022, 'Bi-annual brake inspection');
