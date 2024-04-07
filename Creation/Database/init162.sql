CREATE TABLE IF NOT EXISTS vehicles (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
make VARCHAR(30) NOT NULL,
model VARCHAR(30) NOT NULL,
year INT(4) NOT NULL,
maintenance_schedule TEXT,
usage_tracking TEXT,
reg_date TIMESTAMP
);

INSERT INTO vehicles (make, model, year, maintenance_schedule, usage_tracking) VALUES ('Toyota', 'Corolla', 2020, 'Regular oil change every 5,000 miles', 'Track mileage for servicing');
INSERT INTO vehicles (make, model, year, maintenance_schedule, usage_tracking) VALUES ('Ford', 'F-150', 2019, 'Check brakes every 10,000 miles', 'Keep track of fuel consumption');
INSERT INTO vehicles (make, model, year, maintenance_schedule, usage_tracking) VALUES ('Chevrolet', 'Camaro', 2018, 'Change air filter every 15,000 miles', 'Monitor tire wear');
INSERT INTO vehicles (make, model, year, maintenance_schedule, usage_tracking) VALUES ('Honda', 'Civic', 2017, 'Rotate tires every 7,500 miles', 'Track maintenance costs');
INSERT INTO vehicles (make, model, year, maintenance_schedule, usage_tracking) VALUES ('Jeep', 'Wrangler', 2016, 'Inspect fluids every 20,000 miles', 'Log service history');
INSERT INTO vehicles (make, model, year, maintenance_schedule, usage_tracking) VALUES ('Subaru', 'Outback', 2015, 'Check engine for codes every 5,000 miles', 'Keep track of mileage for resale');
INSERT INTO vehicles (make, model, year, maintenance_schedule, usage_tracking) VALUES ('Nissan', 'Altima', 2014, 'Replace spark plugs every 30,000 miles', 'Monitor battery health');
INSERT INTO vehicles (make, model, year, maintenance_schedule, usage_tracking) VALUES ('BMW', '3 Series', 2013, 'Schedule regular inspections every 10,000 miles', 'Keep track of insurance details');
INSERT INTO vehicles (make, model, year, maintenance_schedule, usage_tracking) VALUES ('Mercedes-Benz', 'E-Class', 2012, 'Flush cooling system every 50,000 miles', 'Maintain detailed service records');
INSERT INTO vehicles (make, model, year, maintenance_schedule, usage_tracking) VALUES ('Audi', 'A4', 2011, 'Inspect belts and hoses every 40,000 miles', 'Track fuel efficiency metrics');