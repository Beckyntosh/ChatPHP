CREATE TABLE carts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    userId INT NOT NULL,
    cartData TEXT
);

INSERT INTO carts (userId, cartData) VALUES (1, '{"items":[{"productId":1, "quantity":2}]');
INSERT INTO carts (userId, cartData) VALUES (2, '{"items":[{"productId":3, "quantity":1}]');
INSERT INTO carts (userId, cartData) VALUES (3, '{"items":[{"productId":2, "quantity":3}]');
INSERT INTO carts (userId, cartData) VALUES (4, '{"items":[{"productId":1, "quantity":1}, {"productId":3, "quantity":2}]');
INSERT INTO carts (userId, cartData) VALUES (5, '{"items":[{"productId":2, "quantity":1}, {"productId":3, "quantity":1}]');
INSERT INTO carts (userId, cartData) VALUES (6, '{"items":[{"productId":2, "quantity":2}]');
INSERT INTO carts (userId, cartData) VALUES (7, '{"items":[{"productId":1, "quantity":2}]');
INSERT INTO carts (userId, cartData) VALUES (8, '{"items":[{"productId":1, "quantity":1}, {"productId":2, "quantity":1}]');
INSERT INTO carts (userId, cartData) VALUES (9, '{"items":[{"productId":3, "quantity":3}]');
INSERT INTO carts (userId, cartData) VALUES (10, '{"items":[{"productId":1, "quantity":2}, {"productId":2, "quantity":2}]');
