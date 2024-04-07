CREATE TABLE IF NOT EXISTS volunteers (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
fullname VARCHAR(30) NOT NULL,
email VARCHAR(50),
event VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO volunteers (fullname, email, event) VALUES ('John Doe', 'john.doe@example.com', 'Local Charity Event');
INSERT INTO volunteers (fullname, email, event) VALUES ('Jane Smith', 'jane.smith@example.com', 'Community Clean-up');
INSERT INTO volunteers (fullname, email, event) VALUES ('Alice Johnson', 'alice.johnson@example.com', 'Food Drive');
INSERT INTO volunteers (fullname, email, event) VALUES ('Bob Brown', 'bob.brown@example.com', 'Other');
INSERT INTO volunteers (fullname, email, event) VALUES ('Sarah Davis', 'sarah.davis@example.com', 'Local Charity Event');
INSERT INTO volunteers (fullname, email, event) VALUES ('Michael Wilson', 'michael.wilson@example.com', 'Community Clean-up');
INSERT INTO volunteers (fullname, email, event) VALUES ('Emily Lee', 'emily.lee@example.com', 'Food Drive');
INSERT INTO volunteers (fullname, email, event) VALUES ('David Martinez', 'david.martinez@example.com', 'Other');
INSERT INTO volunteers (fullname, email, event) VALUES ('Karen Miller', 'karen.miller@example.com', 'Local Charity Event');
INSERT INTO volunteers (fullname, email, event) VALUES ('Mark Taylor', 'mark.taylor@example.com', 'Community Clean-up');