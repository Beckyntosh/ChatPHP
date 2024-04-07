CREATE TABLE meetings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user VARCHAR(50) NOT NULL,
    product VARCHAR(50) NOT NULL,
    date DATETIME NOT NULL
);

INSERT INTO meetings (user, product, date) VALUES ('Alice', 'Product A', '2022-09-15 10:00:00');
INSERT INTO meetings (user, product, date) VALUES ('Bob', 'Product B', '2022-09-16 11:30:00');
INSERT INTO meetings (user, product, date) VALUES ('Charlie', 'Product C', '2022-09-17 09:45:00');
INSERT INTO meetings (user, product, date) VALUES ('Dave', 'Product D', '2022-09-18 14:20:00');
INSERT INTO meetings (user, product, date) VALUES ('Eve', 'Product E', '2022-09-19 16:00:00');
INSERT INTO meetings (user, product, date) VALUES ('Fiona', 'Product F', '2022-09-20 08:30:00');
INSERT INTO meetings (user, product, date) VALUES ('George', 'Product G', '2022-09-21 12:45:00');
INSERT INTO meetings (user, product, date) VALUES ('Helen', 'Product H', '2022-09-22 15:10:00');
INSERT INTO meetings (user, product, date) VALUES ('Ian', 'Product I', '2022-09-23 09:00:00');
INSERT INTO meetings (user, product, date) VALUES ('Jane', 'Product J', '2022-09-24 11:30:00');
