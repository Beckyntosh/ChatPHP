CREATE TABLE IF NOT EXISTS vehicles (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
make VARCHAR(30) NOT NULL,
model VARCHAR(30) NOT NULL,
year YEAR(4) NOT NULL,
maintenance_schedule TEXT,
reg_date TIMESTAMP
);

INSERT INTO vehicles (make, model, year, maintenance_schedule) VALUES ('Ford', 'Transit', 2023, 'Regular oil changes every 5000 miles');
INSERT INTO vehicles (make, model, year, maintenance_schedule) VALUES ('Chevrolet', 'Silverado', 2022, 'Tire rotations every 10000 miles');
INSERT INTO vehicles (make, model, year, maintenance_schedule) VALUES ('Toyota', 'Camry', 2020, 'Brake inspection every 20000 miles');
INSERT INTO vehicles (make, model, year, maintenance_schedule) VALUES ('Honda', 'Civic', 2019, 'Transmission flush every 60000 miles');
INSERT INTO vehicles (make, model, year, maintenance_schedule) VALUES ('Jeep', 'Wrangler', 2021, 'Coolant check every 30000 miles');
INSERT INTO vehicles (make, model, year, maintenance_schedule) VALUES ('Ram', '1500', 2018, 'Spark plug replacement every 50000 miles');
INSERT INTO vehicles (make, model, year, maintenance_schedule) VALUES ('Nissan', 'Altima', 2017, 'Air filter change every 15000 miles');
INSERT INTO vehicles (make, model, year, maintenance_schedule) VALUES ('Ford', 'F-150', 2016, 'Battery inspection every 40000 miles');
INSERT INTO vehicles (make, model, year, maintenance_schedule) VALUES ('GMC', 'Sierra', 2020, 'Wheel alignment every 20000 miles');
INSERT INTO vehicles (make, model, year, maintenance_schedule) VALUES ('Subaru', 'Outback', 2019, 'Fluid top-up every 30000 miles');
