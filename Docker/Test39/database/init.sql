CREATE TABLE IF NOT EXISTS volunteers (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
fullname VARCHAR(30) NOT NULL,
email VARCHAR(50),
event VARCHAR(50),
registration_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO volunteers (fullname, email, event) VALUES ('John Doe', 'johndoe@example.com', 'Local Charity Event');
INSERT INTO volunteers (fullname, email, event) VALUES ('Jane Smith', 'janesmith@example.com', 'Beach Cleanup');
INSERT INTO volunteers (fullname, email, event) VALUES ('Alice Johnson', 'alicejohnson@example.com', 'Food Drive');
INSERT INTO volunteers (fullname, email, event) VALUES ('Bob Brown', 'bobbrown@example.com', 'Local Charity Event');
INSERT INTO volunteers (fullname, email, event) VALUES ('Sarah Davis', 'sarahdavis@example.com', 'Beach Cleanup');
INSERT INTO volunteers (fullname, email, event) VALUES ('Michael Wilson', 'michaelwilson@example.com', 'Food Drive');
INSERT INTO volunteers (fullname, email, event) VALUES ('Laura Miller', 'lauramiller@example.com', 'Local Charity Event');
INSERT INTO volunteers (fullname, email, event) VALUES ('Chris Lee', 'chrislee@example.com', 'Beach Cleanup');
INSERT INTO volunteers (fullname, email, event) VALUES ('Amanda White', 'amandawhite@example.com', 'Food Drive');
INSERT INTO volunteers (fullname, email, event) VALUES ('Ryan Taylor', 'ryantaylor@example.com', 'Local Charity Event');