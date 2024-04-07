CREATE TABLE IF NOT EXISTS vehicles (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
make VARCHAR(30) NOT NULL,
model VARCHAR(30) NOT NULL,
year INT(4) NOT NULL,
maintenance_schedule VARCHAR(255),
usage_tracking VARCHAR(255),
reg_date TIMESTAMP
);

INSERT INTO vehicles (make, model, year, maintenance_schedule, usage_tracking) 
VALUES ('Toyota', 'Camry', 2021, 'Monthly checkup', 'Daily usage'),
('Ford', 'F-150', 2019, 'Bi-annual maintenance', 'Weekly mileage tracking'),
('Chevrolet', 'Equinox', 2018, 'Annual services', 'Monthly reports'),
('Honda', 'Civic', 2020, 'Quarterly maintenance', 'Daily commute usage'),
('BMW', 'X5', 2017, 'Bi-annual checkup', 'Event transportation'),
('Audi', 'A4', 2016, 'Monthly services', 'Weekly mileage logs'),
('Mercedes-Benz', 'C-Class', 2019, 'Annual inspections', 'Daily business travel'),
('Jeep', 'Wrangler', 2018, 'Seasonal maintenance', 'Off-road adventures'),
('Subaru', 'Outback', 2020, 'Monthly checkup', 'Family road trips'),
('Hyundai', 'Sonata', 2021, 'Bi-annual servicing', 'Weekend drives');
