CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP
);

CREATE TABLE IF NOT EXISTS browsing_history (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED,
    magazine_id INT(6) UNSIGNED,
    view_date TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE IF NOT EXISTS magazines (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    description TEXT,
    published_date TIMESTAMP
);

INSERT INTO users (username, email, reg_date) VALUES 
('JohnDoe', 'john@example.com', NOW()),
('JaneSmith', 'jane@example.com', NOW()),
('AliceJones', 'alice@example.com', NOW()),
('BobBrown', 'bob@example.com', NOW()),
('EveWhite', 'eve@example.com', NOW());

INSERT INTO browsing_history (user_id, magazine_id, view_date) VALUES 
(1, 1, NOW()),
(1, 2, NOW()),
(2, 1, NOW()),
(2, 3, NOW()),
(3, 2, NOW()),
(4, 1, NOW()),
(5, 3, NOW());

INSERT INTO magazines (title, description, published_date) VALUES 
('Magazine A', 'Description for Magazine A', NOW()),
('Magazine B', 'Description for Magazine B', NOW()),
('Magazine C', 'Description for Magazine C', NOW()),
('Magazine D', 'Description for Magazine D', NOW()),
('Magazine E', 'Description for Magazine E', NOW());
