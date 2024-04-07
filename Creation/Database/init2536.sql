CREATE TABLE IF NOT EXISTS events_volunteers (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
fullname VARCHAR(50) NOT NULL,
email VARCHAR(50),
event VARCHAR(50),
registration_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO events_volunteers (fullname, email, event) VALUES ('Alice Smith', 'alice@example.com', 'Local Charity Event');
INSERT INTO events_volunteers (fullname, email, event) VALUES ('Bob Johnson', 'bob@example.com', 'Community Clean-up');
INSERT INTO events_volunteers (fullname, email, event) VALUES ('Eve Brown', 'eve@example.com', 'Food Drive');
INSERT INTO events_volunteers (fullname, email, event) VALUES ('John Doe', 'john@example.com', 'Local Charity Event');
INSERT INTO events_volunteers (fullname, email, event) VALUES ('Sarah Lee', 'sarah@example.com', 'Local Charity Event');
INSERT INTO events_volunteers (fullname, email, event) VALUES ('Michael Green', 'michael@example.com', 'Food Drive');
INSERT INTO events_volunteers (fullname, email, event) VALUES ('Laura White', 'laura@example.com', 'Community Clean-up');
INSERT INTO events_volunteers (fullname, email, event) VALUES ('Ryan Black', 'ryan@example.com', 'Local Charity Event');
INSERT INTO events_volunteers (fullname, email, event) VALUES ('Emily Davis', 'emily@example.com', 'Community Clean-up');
INSERT INTO events_volunteers (fullname, email, event) VALUES ('Daniel Adams', 'daniel@example.com', 'Food Drive');
