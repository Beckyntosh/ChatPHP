CREATE TABLE IF NOT EXISTS user_footprints (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    travel_emissions FLOAT NOT NULL,
    household_emissions FLOAT NOT NULL,
    suggestions TEXT NOT NULL,
    reg_date TIMESTAMP
);

INSERT INTO user_footprints (travel_emissions, household_emissions, suggestions) VALUES (5.7, 8.2, 'Consider using public transportation, Reduce energy consumption at home.');
INSERT INTO user_footprints (travel_emissions, household_emissions, suggestions) VALUES (10.3, 6.9, 'Consider carpooling, Use energy-efficient appliances.');
INSERT INTO user_footprints (travel_emissions, household_emissions, suggestions) VALUES (3.4, 5.1, 'Walk or bike more, Unplug electronics when not in use.');
INSERT INTO user_footprints (travel_emissions, household_emissions, suggestions) VALUES (7.8, 4.2, 'Use electric vehicles, Plant trees to absorb CO2.');
INSERT INTO user_footprints (travel_emissions, household_emissions, suggestions) VALUES (6.2, 3.9, 'Take public transportation, Choose sustainable products.');
INSERT INTO user_footprints (travel_emissions, household_emissions, suggestions) VALUES (9.5, 7.6, 'Combine trips to reduce emissions, Install solar panels.');
INSERT INTO user_footprints (travel_emissions, household_emissions, suggestions) VALUES (4.8, 6.3, 'Drive efficiently, Use a programmable thermostat.');
INSERT INTO user_footprints (travel_emissions, household_emissions, suggestions) VALUES (8.1, 4.7, 'Reduce air travel, Insulate your home.');
INSERT INTO user_footprints (travel_emissions, household_emissions, suggestions) VALUES (2.9, 5.8, 'Telecommute when possible, Recycle and compost.');
INSERT INTO user_footprints (travel_emissions, household_emissions, suggestions) VALUES (7.3, 3.6, 'Try car-sharing services, Use energy-saving light bulbs.');
