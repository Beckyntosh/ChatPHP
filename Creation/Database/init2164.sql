CREATE TABLE craft_beers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    style VARCHAR(255) NOT NULL
);

CREATE TABLE languages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);

INSERT INTO craft_beers (name, style) VALUES ('Abbey Ale', 'medieval');
INSERT INTO craft_beers (name, style) VALUES ('Dragon’s Milk Stout', 'medieval');
INSERT INTO craft_beers (name, style) VALUES ('Mead of the Gods', 'medieval');
INSERT INTO craft_beers (name, style) VALUES ('Monastery Brew', 'medieval');
INSERT INTO craft_beers (name, style) VALUES ('Squire’s Saison', 'medieval');
INSERT INTO craft_beers (name, style) VALUES ('Royal Red Ale', 'medieval');
INSERT INTO craft_beers (name, style) VALUES ('Knight’s Kolsch', 'medieval');
INSERT INTO craft_beers (name, style) VALUES ('Castle Porter', 'medieval');
INSERT INTO craft_beers (name, style) VALUES ('Jester’s Julep', 'medieval');
INSERT INTO craft_beers (name, style) VALUES ('Baron’s Barleywine', 'medieval');

INSERT INTO languages (name) VALUES ('English');
INSERT INTO languages (name) VALUES ('Spanish');
