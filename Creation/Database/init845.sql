CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    dvd_id INT
);

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(50) NOT NULL,
    year INT NOT NULL
);

INSERT INTO users (username, email, dvd_id) VALUES ('JohnDoe', 'johndoe@example.com', 1);
INSERT INTO users (username, email, dvd_id) VALUES ('JaneSmith', 'janesmith@example.com', 2);
INSERT INTO users (username, email, dvd_id) VALUES ('AliceJohnson', 'alicejohnson@example.com', 3);
INSERT INTO users (username, email, dvd_id) VALUES ('BobBrown', 'bobbrown@example.com', 4);
INSERT INTO users (username, email, dvd_id) VALUES ('EmilyWhite', 'emilywhite@example.com', 5);

INSERT INTO products (title, year) VALUES ('DVD1', 1999);
INSERT INTO products (title, year) VALUES ('DVD2', 2005);
INSERT INTO products (title, year) VALUES ('DVD3', 1995);
INSERT INTO products (title, year) VALUES ('DVD4', 2002);
INSERT INTO products (title, year) VALUES ('DVD5', 1990);
