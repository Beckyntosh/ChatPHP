CREATE TABLE IF NOT EXISTS plants (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    care_schedule TEXT NOT NULL,
    date_added DATETIME DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO plants (name, care_schedule) VALUES ('Tomato plants', 'Water daily, Full sun, fertilize weekly');
INSERT INTO plants (name, care_schedule) VALUES ('Lavender', 'Water every 2 days, partial sun');
INSERT INTO plants (name, care_schedule) VALUES ('Rosemary', 'Water sparingly, full sun, well-draining soil');
INSERT INTO plants (name, care_schedule) VALUES ('Cactus', 'Water once a month, indirect sunlight');
INSERT INTO plants (name, care_schedule) VALUES ('Basil', 'Water regularly, partial sun, pinch leaves');
INSERT INTO plants (name, care_schedule) VALUES ('Mint', 'Water often, partial shade, invasive');
INSERT INTO plants (name, care_schedule) VALUES ('Geranium', 'Water moderately, full sun');
INSERT INTO plants (name, care_schedule) VALUES ('Succulent', 'Water sparingly, bright light, well-draining soil');
INSERT INTO plants (name, care_schedule) VALUES ('Fern', 'Water consistently, indirect light, high humidity');
INSERT INTO plants (name, care_schedule) VALUES ('Snake Plant', 'Water sparingly, low light, low maintenance');