CREATE TABLE IF NOT EXISTS events (
id INT AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(255),
description TEXT,
date DATE,
location VARCHAR(255)
);

INSERT INTO events (title, description, date, location) VALUES 
('Summer Sale', 'Biggest sale of the season', '2022-08-01', 'Online'),
('New Collection Launch', 'Launching our new summer collection', '2022-07-01', 'Online'),
('Fashion Show', 'Exclusive preview of the latest trends', '2022-08-15', 'Paris'),
('Warehouse Clearance', 'Clearing out old stock at discounted prices', '2022-09-10', 'New York'),
('Beauty Expo', 'Discover new beauty products and trends', '2022-08-20', 'London'),
('Music Festival', '3 days of live music and entertainment', '2022-09-05', 'Los Angeles'),
('Art Exhibition', 'Featuring works by local artists', '2022-08-25', 'Berlin'),
('Tech Conference', 'Innovative technology showcase', '2022-09-15', 'Tokyo'),
('Charity Gala', 'Supporting a good cause with a glamorous event', '2022-09-30', 'Dubai'),
('Food Festival', 'Culinary delights from around the world', '2022-10-05', 'Singapore');
