-- Init.sql

CREATE TABLE IF NOT EXISTS volunteers (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
fullname VARCHAR(50) NOT NULL,
email VARCHAR(50),
event VARCHAR(255),
reg_date TIMESTAMP
);

INSERT INTO volunteers (fullname, email, event) VALUES ('John Doe', 'john.doe@example.com', 'Local Charity Event');
INSERT INTO volunteers (fullname, email, event) VALUES ('Jane Smith', 'jane.smith@example.com', 'Beach Cleanup');
INSERT INTO volunteers (fullname, email, event) VALUES ('Alice Johnson', 'alice.johnson@example.com', 'Soup Kitchen');
INSERT INTO volunteers (fullname, email, event) VALUES ('Bob Brown', 'bob.brown@example.com', 'Local Charity Event');
INSERT INTO volunteers (fullname, email, event) VALUES ('Karen Wilson', 'karen.wilson@example.com', 'Beach Cleanup');
INSERT INTO volunteers (fullname, email, event) VALUES ('David Lee', 'david.lee@example.com', 'Local Charity Event');
INSERT INTO volunteers (fullname, email, event) VALUES ('Sarah Adams', 'sarah.adams@example.com', 'Soup Kitchen');
INSERT INTO volunteers (fullname, email, event) VALUES ('Michael Taylor', 'michael.taylor@example.com', 'Local Charity Event');
INSERT INTO volunteers (fullname, email, event) VALUES ('Linda Walker', 'linda.walker@example.com', 'Beach Cleanup');
INSERT INTO volunteers (fullname, email, event) VALUES ('Steve Miller', 'steve.miller@example.com', 'Local Charity Event');