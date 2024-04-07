CREATE TABLE IF NOT EXISTS `vehicle_efficiency` (
  `id` INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `vehicle_model` VARCHAR(50) NOT NULL,
  `fuel_efficiency` FLOAT NOT NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO `vehicle_efficiency` (`vehicle_model`, `fuel_efficiency`) VALUES ('Toyota Camry', 30.5);
INSERT INTO `vehicle_efficiency` (`vehicle_model`, `fuel_efficiency`) VALUES ('Honda Civic', 35.2);
INSERT INTO `vehicle_efficiency` (`vehicle_model`, `fuel_efficiency`) VALUES ('Ford F-150', 18.6);
INSERT INTO `vehicle_efficiency` (`vehicle_model`, `fuel_efficiency`) VALUES ('Chevrolet Malibu', 27.8);
INSERT INTO `vehicle_efficiency` (`vehicle_model`, `fuel_efficiency`) VALUES ('BMW X5', 24.3);
INSERT INTO `vehicle_efficiency` (`vehicle_model`, `fuel_efficiency`) VALUES ('Tesla Model S', 105.2);
INSERT INTO `vehicle_efficiency` (`vehicle_model`, `fuel_efficiency`) VALUES ('Subaru Outback', 29.1);
INSERT INTO `vehicle_efficiency` (`vehicle_model`, `fuel_efficiency`) VALUES ('Toyota Prius', 50.5);
INSERT INTO `vehicle_efficiency` (`vehicle_model`, `fuel_efficiency`) VALUES ('Audi A4', 32.7);
INSERT INTO `vehicle_efficiency` (`vehicle_model`, `fuel_efficiency`) VALUES ('Jeep Wrangler', 15.2);
