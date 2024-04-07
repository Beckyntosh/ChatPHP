CREATE TABLE IF NOT EXISTS craft_beer_data (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
beer_name VARCHAR(30) NOT NULL,
brewery VARCHAR(30) NOT NULL,
style VARCHAR(50),
alcohol_content DECIMAL(4,2),
ibu INT(3),
reg_date TIMESTAMP
);

INSERT INTO craft_beer_data (beer_name, brewery, style, alcohol_content, ibu) VALUES ('Beer1', 'Brewery1', 'Style1', 5.5, 30);
INSERT INTO craft_beer_data (beer_name, brewery, style, alcohol_content, ibu) VALUES ('Beer2', 'Brewery2', 'Style2', 6.0, 40);
INSERT INTO craft_beer_data (beer_name, brewery, style, alcohol_content, ibu) VALUES ('Beer3', 'Brewery3', 'Style3', 4.8, 25);
INSERT INTO craft_beer_data (beer_name, brewery, style, alcohol_content, ibu) VALUES ('Beer4', 'Brewery4', 'Style1', 5.2, 35);
INSERT INTO craft_beer_data (beer_name, brewery, style, alcohol_content, ibu) VALUES ('Beer5', 'Brewery5', 'Style4', 7.0, 50);
INSERT INTO craft_beer_data (beer_name, brewery, style, alcohol_content, ibu) VALUES ('Beer6', 'Brewery6', 'Style2', 6.5, 45);
INSERT INTO craft_beer_data (beer_name, brewery, style, alcohol_content, ibu) VALUES ('Beer7', 'Brewery7', 'Style3', 4.5, 20);
INSERT INTO craft_beer_data (beer_name, brewery, style, alcohol_content, ibu) VALUES ('Beer8', 'Brewery8', 'Style1', 5.8, 38);
INSERT INTO craft_beer_data (beer_name, brewery, style, alcohol_content, ibu) VALUES ('Beer9', 'Brewery9', 'Style4', 7.2, 55);
INSERT INTO craft_beer_data (beer_name, brewery, style, alcohol_content, ibu) VALUES ('Beer10', 'Brewery10', 'Style2', 6.2, 42);
