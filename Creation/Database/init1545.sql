CREATE TABLE IF NOT EXISTS vehicles (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    make VARCHAR(30) NOT NULL,
    model VARCHAR(30) NOT NULL,
    year YEAR(4) NOT NULL,
    maintenance_schedule TEXT,
    reg_date TIMESTAMP
);

INSERT INTO vehicles (make, model, year, maintenance_schedule) VALUES ('Ford', 'Transit', '2023', 'Regular oil changes, tire rotations');
INSERT INTO vehicles (make, model, year, maintenance_schedule) VALUES ('Toyota', 'Camry', '2019', 'Bi-annual tune-up, brake inspections');
INSERT INTO vehicles (make, model, year, maintenance_schedule) VALUES ('Chevrolet', 'Silverado', '2020', 'Monthly fluid levels check');
INSERT INTO vehicles (make, model, year, maintenance_schedule) VALUES ('Honda', 'CRV', '2018', 'Annual inspection for emissions compliance');
INSERT INTO vehicles (make, model, year, maintenance_schedule) VALUES ('Volkswagen', 'Jetta', '2017', 'Quarterly brake pad checks');
INSERT INTO vehicles (make, model, year, maintenance_schedule) VALUES ('Tesla', 'Model S', '2022', 'Bi-annual battery charging check');
INSERT INTO vehicles (make, model, year, maintenance_schedule) VALUES ('BMW', 'X5', '2021', 'Monthly tire pressure monitoring');
INSERT INTO vehicles (make, model, year, maintenance_schedule) VALUES ('Mercedes-Benz', 'C-Class', '2019', 'Annual electrical system inspection');
INSERT INTO vehicles (make, model, year, maintenance_schedule) VALUES ('Audi', 'A4', '2020', 'Quarterly interior cleaning and maintenance');
INSERT INTO vehicles (make, model, year, maintenance_schedule) VALUES ('Lexus', 'RX350', '2020', 'Bi-annual engine diagnostic test');
