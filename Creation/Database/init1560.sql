CREATE TABLE IF NOT EXISTS vehicles (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  maintenance_schedule VARCHAR(255) NOT NULL
);

INSERT INTO vehicles (name, maintenance_schedule) VALUES ('2023 Ford Transit', 'Every 5000 Miles');
INSERT INTO vehicles (name, maintenance_schedule) VALUES ('2019 Toyota Camry', 'Every 4000 Miles');
INSERT INTO vehicles (name, maintenance_schedule) VALUES ('2021 Honda Accord', 'Every 3000 Miles');
INSERT INTO vehicles (name, maintenance_schedule) VALUES ('2018 Ford F-150', 'Every 6000 Miles');
INSERT INTO vehicles (name, maintenance_schedule) VALUES ('2022 Nissan Rogue', 'Every 4500 Miles');
INSERT INTO vehicles (name, maintenance_schedule) VALUES ('2017 Toyota Corolla', 'Every 3500 Miles');
INSERT INTO vehicles (name, maintenance_schedule) VALUES ('2020 Chevrolet Silverado', 'Every 7000 Miles');
INSERT INTO vehicles (name, maintenance_schedule) VALUES ('2016 Honda CR-V', 'Every 5000 Miles');
INSERT INTO vehicles (name, maintenance_schedule) VALUES ('2019 Ford Explorer', 'Every 5500 Miles');
INSERT INTO vehicles (name, maintenance_schedule) VALUES ('2015 Toyota RAV4', 'Every 4000 Miles');
