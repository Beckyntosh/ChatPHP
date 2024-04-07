CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    first_login INT DEFAULT 1
);

CREATE TABLE dashboard_layouts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    layout VARCHAR(50) NOT NULL,
    widgets TEXT NOT NULL,
    UNIQUE KEY (username)
);

INSERT INTO users (username, password, first_login) VALUES 
('user1', 'password1', 1),
('user2', 'password2', 1),
('user3', 'password3', 1),
('user4', 'password4', 1),
('user5', 'password5', 1),
('user6', 'password6', 1),
('user7', 'password7', 1),
('user8', 'password8', 1),
('user9', 'password9', 1),
('user10', 'password10', 1);

INSERT INTO dashboard_layouts (username, layout, widgets) VALUES 
('user1', 'grid', 'latestWines,topRatings'),
('user2', 'list', 'topRatings,wineNews'),
('user3', 'grid', 'latestWines,wineNews'),
('user4', 'grid', 'latestWines'),
('user5', 'list', 'topRatings,wineNews'),
('user6', 'grid', 'latestWines,topRatings,wineNews'),
('user7', 'grid', 'latestWines,topRatings,wineNews'),
('user8', 'list', 'topRatings'),
('user9', 'grid', 'latestWines,topRatings'),
('user10', 'grid', 'topRatings,wineNews');
