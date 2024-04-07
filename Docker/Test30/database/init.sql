CREATE TABLE IF NOT EXISTS volunteers (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
email VARCHAR(50),
event VARCHAR(50) NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO volunteers (name, email, event) VALUES ('John Doe', 'johndoe@example.com', 'Local Charity Event');
INSERT INTO volunteers (name, email, event) VALUES ('Jane Smith', 'janesmith@example.com', 'Community Clean-up');
INSERT INTO volunteers (name, email, event) VALUES ('Michael Johnson', 'michaeljohnson@example.com', 'Food Drive');
INSERT INTO volunteers (name, email, event) VALUES ('Sarah Taylor', 'sarahtaylor@example.com', 'Local Charity Event');
INSERT INTO volunteers (name, email, event) VALUES ('Alex Brown', 'alexbrown@example.com', 'Community Clean-up');
INSERT INTO volunteers (name, email, event) VALUES ('Emily Davis', 'emilydavis@example.com', 'Food Drive');
INSERT INTO volunteers (name, email, event) VALUES ('Chris Anderson', 'chrisanderson@example.com', 'Local Charity Event');
INSERT INTO volunteers (name, email, event) VALUES ('Jessica Wilson', 'jessicawilson@example.com', 'Community Clean-up');
INSERT INTO volunteers (name, email, event) VALUES ('Matthew Martinez', 'matthewmartinez@example.com', 'Food Drive');
INSERT INTO volunteers (name, email, event) VALUES ('Laura Harris', 'lauraharris@example.com', 'Local Charity Event');
