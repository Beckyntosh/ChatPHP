CREATE TABLE IF NOT EXISTS users (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

INSERT INTO users (username, password) VALUES ('john_doe', 'JD123456');
INSERT INTO users (username, password) VALUES ('jane_smith', 'JSabcdef');
INSERT INTO users (username, password) VALUES ('mike_jackson', 'MJqwerty');
INSERT INTO users (username, password) VALUES ('lisa_williams', 'LW987654');
INSERT INTO users (username, password) VALUES ('alex_garcia', 'AGpass123');
INSERT INTO users (username, password) VALUES ('sara_jones', 'SJzxcvb');
INSERT INTO users (username, password) VALUES ('chris_brown', 'CBp@ssw0rd');
INSERT INTO users (username, password) VALUES ('amanda_lewis', 'ALsecure1');
INSERT INTO users (username, password) VALUES ('peter_adams', 'PApa$$word');
INSERT INTO users (username, password) VALUES ('natalie_clark', 'NCpassword');
