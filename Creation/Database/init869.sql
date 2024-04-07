CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30),
    name VARCHAR(30),
    email VARCHAR(50),
    password VARCHAR(255)
);

INSERT INTO users (username, name, email, password) VALUES 
('john_doe', 'John Doe', 'john.doe@example.com', 'password123'),
('jane_smith', 'Jane Smith', 'jane.smith@example.com', 'pass321word'),
('bob_jenkins', 'Bob Jenkins', 'bob.jenkins@example.com', 'securepwd456'),
('alice_wong', 'Alice Wong', 'alice.wong@example.com', 'hiddenkey789'),
('samuel_brown', 'Samuel Brown', 'samuel.brown@example.com', 'access456code'),
('emily_tan', 'Emily Tan', 'emily.tan@example.com', 'topsecret123'),
('michael_clark', 'Michael Clark', 'michael.clark@example.com', 'confidential789'),
('sarah_miller', 'Sarah Miller', 'sarah.miller@example.com', 'classified456'),
('ryan_wilson', 'Ryan Wilson', 'ryan.wilson@example.com', 'privileged321'),
('olivia_ng', 'Olivia Ng', 'olivia.ng@example.com', 'securepwd987');
