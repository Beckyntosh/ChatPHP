CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO users (username, password) VALUES ('john_doe', 'password123');
INSERT INTO users (username, password) VALUES ('jane_smith', 'securepass');
INSERT INTO users (username, password) VALUES ('test_user', 'test123');
INSERT INTO users (username, password) VALUES ('new_user', 'newpass');
INSERT INTO users (username, password) VALUES ('demo_user', 'demopass');
INSERT INTO users (username, password) VALUES ('example_user', 'examplepass');
INSERT INTO users (username, password) VALUES ('user123', 'qwerty');
INSERT INTO users (username, password) VALUES ('member1', 'welcome1');
INSERT INTO users (username, password) VALUES ('admin_user', 'adminpass');
INSERT INTO users (username, password) VALUES ('super_user', 'superpass');
