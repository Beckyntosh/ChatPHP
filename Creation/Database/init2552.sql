CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    dashboard_config TEXT,
    first_login BOOLEAN DEFAULT TRUE
);

INSERT INTO users (username, password, dashboard_config, first_login) VALUES
('user1', 'password1', '{"widgets": ["weather", "calendar", "tasks"]}', TRUE),
('user2', 'password2', '{"widgets": ["notes", "tasks"]}', TRUE),
('user3', 'password3', '{"widgets": ["calendar", "messages"]}', TRUE),
('user4', 'password4', '{"widgets": ["weather", "notes", "tasks"]}', TRUE),
('user5', 'password5', '{"widgets": ["calendar", "notes"]}', TRUE),
('user6', 'password6', '{"widgets": ["tasks", "messages"]}', TRUE),
('user7', 'password7', '{"widgets": ["weather", "messages"]}', TRUE),
('user8', 'password8', '{"widgets": ["calendar", "weather"]}', TRUE),
('user9', 'password9', '{"widgets": ["tasks", "calendar", "notes"]}', TRUE),
('user10', 'password10', '{"widgets": ["tasks", "notes", "messages"]}', TRUE);
