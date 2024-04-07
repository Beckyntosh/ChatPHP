CREATE TABLE IF NOT EXISTS products (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
category VARCHAR(30) NOT NULL,
description TEXT,
reg_date TIMESTAMP
);

INSERT INTO products (name, category, description) VALUES ('Monopoly', 'Board Games', 'Classic board game that involves buying and trading properties');
INSERT INTO products (name, category, description) VALUES ('Catan', 'Board Games', 'Tile-based resource management game set on the fictional island of Catan');
INSERT INTO products (name, category, description) VALUES ('Ticket to Ride', 'Board Games', 'Cross-country train adventure board game');
INSERT INTO products (name, category, description) VALUES ('Codenames', 'Board Games', 'Word-based party game where players try to guess each other\'s words');
INSERT INTO products (name, category, description) VALUES ('Pandemic', 'Board Games', 'Cooperative board game where players work together to stop global disease outbreaks');
INSERT INTO products (name, category, description) VALUES ('Splendor', 'Board Games', 'Economic strategy board game where players collect gems and cards');
INSERT INTO products (name, category, description) VALUES ('Azul', 'Board Games', 'Tile-drafting game where players compete to decorate the walls of the Royal Palace of Evora');
INSERT INTO products (name, category, description) VALUES ('7 Wonders', 'Board Games', 'Civilization-building card-drafting game spanning three ages of history');
INSERT INTO products (name, category, description) VALUES ('Kingdomino', 'Board Games', 'Domino-style tile-laying game where players build and expand their kingdoms');
INSERT INTO products (name, category, description) VALUES ('Love Letter', 'Board Games', 'Microgame of bluffing and deduction where players try to deliver their love letters');
