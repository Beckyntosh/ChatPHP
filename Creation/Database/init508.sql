CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) UNIQUE NOT NULL,
    name VARCHAR(255) NOT NULL
);

INSERT INTO users (email, name) VALUES ('user1@example.com', 'John Doe');
INSERT INTO users (email, name) VALUES ('user2@example.com', 'Jane Smith');
INSERT INTO users (email, name) VALUES ('user3@example.com', 'Alice Johnson');
INSERT INTO users (email, name) VALUES ('user4@example.com', 'Bob Brown');
INSERT INTO users (email, name) VALUES ('user5@example.com', 'Sarah Wilson');
INSERT INTO users (email, name) VALUES ('user6@example.com', 'Michael Lee');
INSERT INTO users (email, name) VALUES ('user7@example.com', 'Emily Davis');
INSERT INTO users (email, name) VALUES ('user8@example.com', 'Ryan Martinez');
INSERT INTO users (email, name) VALUES ('user9@example.com', 'Laura Garcia');
INSERT INTO users (email, name) VALUES ('user10@example.com', 'Kevin Rodriguez');
