CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
google_id VARCHAR(255) NOT NULL,
email VARCHAR(50) NOT NULL,
name VARCHAR(50) NOT NULL,
registration_date TIMESTAMP,
preferences TEXT,
UNIQUE (google_id),
UNIQUE (email)
);

INSERT INTO users (google_id, email, name) VALUES ('uniqueGoogleId789', 'statistical1@haircareexample.com', 'Alex Smith');
INSERT INTO users (google_id, email, name) VALUES ('uniqueGoogleId790', 'statistical2@haircareexample.com', 'Emma Johnson');
INSERT INTO users (google_id, email, name) VALUES ('uniqueGoogleId791', 'statistical3@haircareexample.com', 'Michael Brown');
INSERT INTO users (google_id, email, name) VALUES ('uniqueGoogleId792', 'statistical4@haircareexample.com', 'Olivia Davis');
INSERT INTO users (google_id, email, name) VALUES ('uniqueGoogleId793', 'statistical5@haircareexample.com', 'William Wilson');
INSERT INTO users (google_id, email, name) VALUES ('uniqueGoogleId794', 'statistical6@haircareexample.com', 'Sophia Martinez');
INSERT INTO users (google_id, email, name) VALUES ('uniqueGoogleId795', 'statistical7@haircareexample.com', 'James Anderson');
INSERT INTO users (google_id, email, name) VALUES ('uniqueGoogleId796', 'statistical8@haircareexample.com', 'Charlotte Taylor');
INSERT INTO users (google_id, email, name) VALUES ('uniqueGoogleId797', 'statistical9@haircareexample.com', 'Daniel Lewis');
INSERT INTO users (google_id, email, name) VALUES ('uniqueGoogleId798', 'statistical10@haircareexample.com', 'Ava Clark');
