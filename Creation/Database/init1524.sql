CREATE TABLE IF NOT EXISTS vocabulary (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    spanish VARCHAR(50) NOT NULL,
    english VARCHAR(50) NOT NULL,
    category VARCHAR(50),
    reg_date TIMESTAMP
);

INSERT INTO vocabulary (spanish, english, category) VALUES ('Hola', 'Hello', 'General');
INSERT INTO vocabulary (spanish, english, category) VALUES ('Comida', 'Food', 'Food');
INSERT INTO vocabulary (spanish, english, category) VALUES ('Viaje', 'Travel', 'Travel');
INSERT INTO vocabulary (spanish, english, category) VALUES ('Familia', 'Family', 'Family');
INSERT INTO vocabulary (spanish, english, category) VALUES ('Buenos días', 'Good morning', 'General');
INSERT INTO vocabulary (spanish, english, category) VALUES ('Adiós', 'Goodbye', 'General');
INSERT INTO vocabulary (spanish, english, category) VALUES ('Taco', 'Taco', 'Food');
INSERT INTO vocabulary (spanish, english, category) VALUES ('Playa', 'Beach', 'Travel');
INSERT INTO vocabulary (spanish, english, category) VALUES ('Padres', 'Parents', 'Family');
INSERT INTO vocabulary (spanish, english, category) VALUES ('Agua', 'Water', 'General');
