CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_login BOOLEAN DEFAULT 1
);

CREATE TABLE user_dashboard (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    layout VARCHAR(50),
    UNIQUE(user_id),
    FOREIGN KEY (user_id) REFERENCES users(id)
);

INSERT INTO users (first_login) VALUES (1), (1), (1), (1), (1), (1), (1), (1), (1), (1);
INSERT INTO user_dashboard (user_id, layout) VALUES (1, 'classic'), (2, 'modern'), (3, 'classic'), (4, 'modern'), (5, 'classic'), (6, 'modern'), (7, 'classic'), (8, 'modern'), (9, 'classic'), (10, 'modern');
