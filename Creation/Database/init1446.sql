CREATE TABLE GardeningTracker (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    plant_name VARCHAR(30) NOT NULL,
    care_schedule TEXT NOT NULL,
    reg_date TIMESTAMP
);

INSERT INTO GardeningTracker (plant_name, care_schedule) VALUES
('Tomato', 'Water daily, fertilize every 2 weeks'),
('Basil', 'Water every 2 days, trim weekly'),
('Rosemary', 'Water twice a week, prune monthly'),
('Lavender', 'Water once a week, do not overwater'),
('Sunflower', 'Water daily, provide support as it grows'),
('Mint', 'Water regularly, trim to encourage growth'),
('Cucumber', 'Water every other day, watch for pests'),
('Bell Pepper', 'Water every 2 days, fertilize every 3 weeks'),
('Zinnia', 'Water frequently, deadhead for continuous blooms'),
('Marigold', 'Water regularly, pinch off faded flowers');