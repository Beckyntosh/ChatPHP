CREATE TABLE user_follows (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT NOT NULL,
  followed_user_id INT NOT NULL
);

CREATE TABLE products (
  id INT AUTO_INCREMENT PRIMARY KEY,
  product_name VARCHAR(255) NOT NULL,
  place VARCHAR(255) NOT NULL,
  date DATE NOT NULL,
  user_id INT NOT NULL
);

INSERT INTO user_follows (user_id, followed_user_id) VALUES (1, 2);
INSERT INTO user_follows (user_id, followed_user_id) VALUES (2, 3);
INSERT INTO user_follows (user_id, followed_user_id) VALUES (3, 1);

INSERT INTO products (product_name, place, date, user_id) VALUES ('Product1', 'Location1', '2021-10-15', 1);
INSERT INTO products (product_name, place, date, user_id) VALUES ('Product2', 'Location2', '2021-11-20', 2);
INSERT INTO products (product_name, place, date, user_id) VALUES ('Product3', 'Location3', '2021-12-25', 3);
INSERT INTO products (product_name, place, date, user_id) VALUES ('Product4', 'Location4', '2021-09-30', 1);
INSERT INTO products (product_name, place, date, user_id) VALUES ('Product5', 'Location5', '2022-01-05', 2);
INSERT INTO products (product_name, place, date, user_id) VALUES ('Product6', 'Location6', '2022-02-10', 3);
INSERT INTO products (product_name, place, date, user_id) VALUES ('Product7', 'Location7', '2022-03-15', 1);
INSERT INTO products (product_name, place, date, user_id) VALUES ('Product8', 'Location8', '2022-04-20', 2);
INSERT INTO products (product_name, place, date, user_id) VALUES ('Product9', 'Location9', '2022-05-25', 3);
INSERT INTO products (product_name, place, date, user_id) VALUES ('Product10', 'Location10', '2022-06-30', 1);
