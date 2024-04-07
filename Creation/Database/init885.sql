CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    avatar VARCHAR(100)
);

INSERT INTO users (name, email, password) VALUES ('John Doe', 'john.doe@example.com', 'password123');
INSERT INTO users (name, email, password) VALUES ('Jane Smith', 'jane.smith@example.com', 'securepass321');
INSERT INTO users (name, email, password) VALUES ('Alice Johnson', 'alice.johnson@example.com', 'p@ssW0rd!');
INSERT INTO users (name, email, password) VALUES ('Bob Brown', 'bob.brown@example.com', 'letmein2022');
INSERT INTO users (name, email, password) VALUES ('Emily Davis', 'emily.davis@example.com', 'safepassword');
INSERT INTO users (name, email, password) VALUES ('Michael Wilson', 'michael.wilson@example.com', 'strongpass567');
INSERT INTO users (name, email, password) VALUES ('Sarah Taylor', 'sarah.taylor@example.com', 'password1234');
INSERT INTO users (name, email, password) VALUES ('David Clark', 'david.clark@example.com', 'p@ssword2022');
INSERT INTO users (name, email, password) VALUES ('Laura Martinez', 'laura.martinez@example.com', 'letmeinnow321');
INSERT INTO users (name, email, password) VALUES ('Ryan Walker', 'ryan.walker@example.com', 'newpassword2022');
