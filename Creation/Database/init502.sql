CREATE TABLE IF NOT EXISTS plants (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    plant_name VARCHAR(30) NOT NULL,
    care_schedule VARCHAR(100) NOT NULL,
    reg_date TIMESTAMP
);

INSERT INTO plants (plant_name, care_schedule) VALUES ('Tomato plants', 'Water twice a week and fertilize once a month');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Rose bush', 'Prune in spring and deadhead spent blooms');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Lavender', 'Full sun and well-drained soil');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Basil', 'Regular watering and pinch off flower buds');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Succulents', 'Sandy soil and minimal water');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Geraniums', 'Deadhead regularly and fertilize in summer');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Mint', 'Partial shade and regular watering');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Cactus', 'Bright light and sparse watering');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Peppers', 'Warm temperature and consistent watering');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Lemon tree', 'Sunlight and occasional pruning');
