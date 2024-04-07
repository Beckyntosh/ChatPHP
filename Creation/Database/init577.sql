CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30),
    name VARCHAR(30),
    email VARCHAR(50),
    password VARCHAR(255)
);

INSERT INTO users (username, name, email, password) VALUES ('john_doe', 'John Doe', 'john.doe@example.com', 'password123');
INSERT INTO users (username, name, email, password) VALUES ('jane_smith', 'Jane Smith', 'jane.smith@example.com', 'pass456');
INSERT INTO users (username, name, email, password) VALUES ('alex123', 'Alex Johnson', 'alex.johnson@example.com', 'mypass789');
INSERT INTO users (username, name, email, password) VALUES ('sara_b', 'Sara Brown', 'sara.brown@example.com', 'secret321');
INSERT INTO users (username, name, email, password) VALUES ('mark88', 'Mark Davis', 'mark.davis@example.com', 'password456');
INSERT INTO users (username, name, email, password) VALUES ('emily_f', 'Emily Foster', 'emily.foster@example.com', 'letmein123');
INSERT INTO users (username, name, email, password) VALUES ('sammyg', 'Sam Green', 'sam.green@example.com', 'securepass1');
INSERT INTO users (username, name, email, password) VALUES ('lisa_m', 'Lisa Miller', 'lisa.miller@example.com', 'mypassword99');
INSERT INTO users (username, name, email, password) VALUES ('rob22', 'Rob Parker', 'rob.parker@example.com', 'robpass22');
INSERT INTO users (username, name, email, password) VALUES ('sophie_r', 'Sophie Roberts', 'sophie.roberts@example.com', 'sophiepass');
