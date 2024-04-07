CREATE TABLE IF NOT EXISTS vehicles (
  id INT AUTO_INCREMENT PRIMARY KEY,
  model VARCHAR(255) NOT NULL,
  year INT(4) NOT NULL,
  maintenance_schedule TEXT NOT NULL
);

INSERT INTO vehicles (model, year, maintenance_schedule) VALUES ('2023 Ford Transit', 2023, 'Regular oil changes every 5,000 miles');
INSERT INTO vehicles (model, year, maintenance_schedule) VALUES ('2022 Toyota Camry', 2022, 'Tire rotations every 10,000 miles');
INSERT INTO vehicles (model, year, maintenance_schedule) VALUES ('2021 Honda Civic', 2021, 'Brake check every 20,000 miles');
INSERT INTO vehicles (model, year, maintenance_schedule) VALUES ('2020 Chevrolet Silverado', 2020, 'Transmission fluid change every 30,000 miles');
INSERT INTO vehicles (model, year, maintenance_schedule) VALUES ('2019 Ford Mustang', 2019, 'Air filter replacement every 15,000 miles');
INSERT INTO vehicles (model, year, maintenance_schedule) VALUES ('2018 Nissan Altima', 2018, 'Coolant flush every 50,000 miles');
INSERT INTO vehicles (model, year, maintenance_schedule) VALUES ('2017 Toyota Prius', 2017, 'Spark plug replacement every 60,000 miles');
INSERT INTO vehicles (model, year, maintenance_schedule) VALUES ('2016 BMW X5', 2016, 'Alignment check every 25,000 miles');
INSERT INTO vehicles (model, year, maintenance_schedule) VALUES ('2015 Honda CR-V', 2015, 'Battery test every 40,000 miles');
INSERT INTO vehicles (model, year, maintenance_schedule) VALUES ('2014 Chevrolet Equinox', 2014, 'Brake fluid flush every 35,000 miles');
