CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    dashboard_config TEXT,
    first_login BOOLEAN DEFAULT TRUE
);

-- Insert values into users table
INSERT INTO users (username, password, dashboard_config) VALUES ('user1', 'password123', '{"widgets": ["weather", "news", "calendar"]}');
INSERT INTO users (username, password, dashboard_config) VALUES ('user2', 'securepass', '{"widgets": ["emails", "tasks", "reminders"]}');
INSERT INTO users (username, password, dashboard_config) VALUES ('user3', 'letmein', '{"widgets": ["messages", "alerts", "notes"]}');
INSERT INTO users (username, password, dashboard_config) VALUES ('user4', 'pass123', '{"widgets": ["photos", "music", "videos"]}');
INSERT INTO users (username, password, dashboard_config) VALUES ('user5', 'abc123', '{"widgets": ["sports", "entertainment", "traffic"]}');
INSERT INTO users (username, password, dashboard_config) VALUES ('user6', 'qwerty', '{"widgets": ["finance", "stocks", "shopping"]}');
INSERT INTO users (username, password, dashboard_config) VALUES ('user7', 'password321', '{"widgets": ["recipes", "health", "fitness"]}');
INSERT INTO users (username, password, dashboard_config) VALUES ('user8', 'letmein321', '{"widgets": ["gaming", "streaming", "chat"]}');
INSERT INTO users (username, password, dashboard_config) VALUES ('user9', 'password456', '{"widgets": ["books", "podcasts", "audiobooks"]}');
INSERT INTO users (username, password, dashboard_config) VALUES ('user10', 'secure4321', '{"widgets": ["tech", "tips", "tutorials"]}');
