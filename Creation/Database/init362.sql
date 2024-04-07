CREATE TABLE IF NOT EXISTS subscribers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) UNIQUE NOT NULL,
    hash VARCHAR(255) NOT NULL,
    active TINYINT NOT NULL DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO subscribers (email, hash) VALUES ('john.doe@example.com', 'abc123');
INSERT INTO subscribers (email, hash) VALUES ('jane.smith@example.com', 'def456');
INSERT INTO subscribers (email, hash) VALUES ('alexander.ray@example.com', 'ghi789');
INSERT INTO subscribers (email, hash) VALUES ('sarah.williams@example.com', 'jkl012');
INSERT INTO subscribers (email, hash) VALUES ('mark.thompson@example.com', 'mno345');
INSERT INTO subscribers (email, hash) VALUES ('emily.white@example.com', 'pqr678');
INSERT INTO subscribers (email, hash) VALUES ('michael.brown@example.com', 'stu901');
INSERT INTO subscribers (email, hash) VALUES ('olivia.jones@example.com', 'vwx234');
INSERT INTO subscribers (email, hash) VALUES ('william.clark@example.com', 'yzabcd');
INSERT INTO subscribers (email, hash) VALUES ('natalie.adams@example.com', 'efg567');
