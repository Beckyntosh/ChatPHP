CREATE TABLE IF NOT EXISTS carts (
    id INT AUTO_INCREMENT PRIMARY KEY, 
    session_id VARCHAR(255) NOT NULL,
    data TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO carts (session_id, data) VALUES ('session123', '{"item1": "Book1", "item2": "Book2"}');
INSERT INTO carts (session_id, data) VALUES ('session456', '{"item1": "Book3", "item2": "Book4"}');
INSERT INTO carts (session_id, data) VALUES ('session789', '{"item1": "Book5", "item2": "Book6"}');
INSERT INTO carts (session_id, data) VALUES ('session987', '{"item1": "Book7", "item2": "Book8"}');
INSERT INTO carts (session_id, data) VALUES ('session654', '{"item1": "Book9", "item2": "Book10"}');
INSERT INTO carts (session_id, data) VALUES ('session321', '{"item1": "Book11", "item2": "Book12"}');
INSERT INTO carts (session_id, data) VALUES ('session555', '{"item1": "Book13", "item2": "Book14"}');
INSERT INTO carts (session_id, data) VALUES ('session777', '{"item1": "Book15", "item2": "Book16"}');
INSERT INTO carts (session_id, data) VALUES ('session888', '{"item1": "Book17", "item2": "Book18"}');
INSERT INTO carts (session_id, data) VALUES ('session999', '{"item1": "Book19", "item2": "Book20"}');
