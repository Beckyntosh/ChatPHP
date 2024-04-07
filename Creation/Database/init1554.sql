CREATE TABLE IF NOT EXISTS vehicles (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
make VARCHAR(30) NOT NULL,
model VARCHAR(30) NOT NULL,
year YEAR(4) NOT NULL,
maintenance_schedule VARCHAR(255),
reg_date TIMESTAMP
);

-- Insert values into vehicles table
INSERT INTO vehicles (make, model, year, maintenance_schedule) VALUES ('Ford', 'Transit', 2023, 'Routine check every 3 months');
INSERT INTO vehicles (make, model, year, maintenance_schedule) VALUES ('Toyota', 'Corolla', 2022, 'Oil change every 6 months');
INSERT INTO vehicles (make, model, year, maintenance_schedule) VALUES ('Chevrolet', 'Equinox', 2021, 'Tire rotation every year');
INSERT INTO vehicles (make, model, year, maintenance_schedule) VALUES ('Honda', 'Civic', 2021, 'Fluid check every 3 months');
INSERT INTO vehicles (make, model, year, maintenance_schedule) VALUES ('Nissan', 'Rogue', 2020, 'Brake inspection every 6 months');
INSERT INTO vehicles (make, model, year, maintenance_schedule) VALUES ('Volkswagen', 'Jetta', 2022, 'Alignment check every year');
INSERT INTO vehicles (make, model, year, maintenance_schedule) VALUES ('BMW', 'X5', 2020, 'Filter replacement every 6 months');
INSERT INTO vehicles (make, model, year, maintenance_schedule) VALUES ('Mercedes-Benz', 'C-Class', 2023, 'Battery check every year');
INSERT INTO vehicles (make, model, year, maintenance_schedule) VALUES ('Audi', 'Q5', 2021, 'Spark plug change every 3 months');
INSERT INTO vehicles (make, model, year, maintenance_schedule) VALUES ('Hyundai', 'Tucson', 2022, 'Coolant flush every 6 months');
