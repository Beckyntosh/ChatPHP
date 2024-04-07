CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    dashboard_layout TEXT,
    first_login BOOLEAN DEFAULT true,
    reg_date TIMESTAMP
);

CREATE TABLE IF NOT EXISTS widgets (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    description TEXT,
    reg_date TIMESTAMP
);

INSERT INTO users (username, dashboard_layout, first_login, reg_date) VALUES ('JohnDoe', '', true, NOW()), ('JaneSmith', '', true, NOW()), ('Alice123', '', true, NOW()), ('Bob789', '', true, NOW()), ('EveXYZ', '', true, NOW()), ('MikeABC', '', true, NOW()), ('SarahLMN', '', true, NOW()), ('Tom456', '', true, NOW()), ('Emily789', '', true, NOW()), ('ChrisXYZ', '', true, NOW());

INSERT INTO widgets (name, description, reg_date) VALUES ('Weather Widget', 'Displays current weather information', NOW()), ('News Widget', 'Provides latest news updates', NOW()), ('Stocks Widget', 'Tracks stock market performance', NOW()), ('Calendar Widget', 'Helps in organizing events and schedules', NOW()), ('To-Do List Widget', 'Manages tasks and reminders', NOW()), ('Social Media Widget', 'Integrates social media feeds', NOW()), ('Fitness Tracker Widget', 'Monitors fitness activities', NOW()), ('Finance Tracker Widget', 'Tracks financial transactions', NOW()), ('Email Widget', 'Manages emails and notifications', NOW()), ('Music Player Widget', 'Plays music and podcasts', NOW());