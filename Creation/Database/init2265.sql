CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    favorite_wine VARCHAR(50) NOT NULL
);

INSERT INTO users (first_name, last_name, email, favorite_wine) VALUES ('John', 'Doe', 'john.doe@example.com', 'Merlot');
INSERT INTO users (first_name, last_name, email, favorite_wine) VALUES ('Jane', 'Smith', 'jane.smith@example.com', 'Chardonnay');
INSERT INTO users (first_name, last_name, email, favorite_wine) VALUES ('Mike', 'Johnson', 'mike.johnson@example.com', 'Pinot Noir');
INSERT INTO users (first_name, last_name, email, favorite_wine) VALUES ('Sarah', 'Williams', 'sarah.williams@example.com', 'Cabernet Sauvignon');
INSERT INTO users (first_name, last_name, email, favorite_wine) VALUES ('Tom', 'Brown', 'tom.brown@example.com', 'Sauvignon Blanc');
INSERT INTO users (first_name, last_name, email, favorite_wine) VALUES ('Emily', 'Davis', 'emily.davis@example.com', 'Zinfandel');
INSERT INTO users (first_name, last_name, email, favorite_wine) VALUES ('Chris', 'Moore', 'chris.moore@example.com', 'Syrah');
INSERT INTO users (first_name, last_name, email, favorite_wine) VALUES ('Laura', 'Wilson', 'laura.wilson@example.com', 'Malbec');
INSERT INTO users (first_name, last_name, email, favorite_wine) VALUES ('Alex', 'Martinez', 'alex.martinez@example.com', 'Riesling');
INSERT INTO users (first_name, last_name, email, favorite_wine) VALUES ('Jessica', 'Lee', 'jessica.lee@example.com', 'Rosé');