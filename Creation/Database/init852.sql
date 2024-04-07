CREATE TABLE podcasts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT
);

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT
);

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL
);

INSERT INTO podcasts (name, description) VALUES ('Podcast 1', 'Description 1');
INSERT INTO podcasts (name, description) VALUES ('Podcast 2', 'Description 2');
INSERT INTO podcasts (name, description) VALUES ('Podcast 3', 'Description 3');
INSERT INTO podcasts (name, description) VALUES ('Podcast 4', 'Description 4');
INSERT INTO podcasts (name, description) VALUES ('Podcast 5', 'Description 5');
INSERT INTO podcasts (name, description) VALUES ('Podcast 6', 'Description 6');
INSERT INTO podcasts (name, description) VALUES ('Podcast 7', 'Description 7');
INSERT INTO podcasts (name, description) VALUES ('Podcast 8', 'Description 8');
INSERT INTO podcasts (name, description) VALUES ('Podcast 9', 'Description 9');
INSERT INTO podcasts (name, description) VALUES ('Podcast 10', 'Description 10');