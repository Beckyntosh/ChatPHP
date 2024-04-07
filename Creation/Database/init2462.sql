CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
google_id VARCHAR(255) NOT NULL,
email VARCHAR(50) NOT NULL,
name VARCHAR(50) NOT NULL,
registration_date TIMESTAMP,
real_life_preferences TEXT,
UNIQUE (google_id),
UNIQUE (email)
);

INSERT INTO users (google_id, email, name) VALUES ('uniqueGoogleIdForMaternityWear1', 'mom1@maternitywear.com', 'Sarah Smith');
INSERT INTO users (google_id, email, name) VALUES ('uniqueGoogleIdForMaternityWear2', 'mom2@maternitywear.com', 'Jessica Brown');
INSERT INTO users (google_id, email, name) VALUES ('uniqueGoogleIdForMaternityWear3', 'mom3@maternitywear.com', 'Olivia Davis');
INSERT INTO users (google_id, email, name) VALUES ('uniqueGoogleIdForMaternityWear4', 'mom4@maternitywear.com', 'Ava Wilson');
INSERT INTO users (google_id, email, name) VALUES ('uniqueGoogleIdForMaternityWear5', 'mom5@maternitywear.com', 'Sophia Martinez');
INSERT INTO users (google_id, email, name) VALUES ('uniqueGoogleIdForMaternityWear6', 'mom6@maternitywear.com', 'Isabella Anderson');
INSERT INTO users (google_id, email, name) VALUES ('uniqueGoogleIdForMaternityWear7', 'mom7@maternitywear.com', 'Mia Taylor');
INSERT INTO users (google_id, email, name) VALUES ('uniqueGoogleIdForMaternityWear8', 'mom8@maternitywear.com', 'Amelia Thomas');
INSERT INTO users (google_id, email, name) VALUES ('uniqueGoogleIdForMaternityWear9', 'mom9@maternitywear.com', 'Evelyn White');
INSERT INTO users (google_id, email, name) VALUES ('uniqueGoogleIdForMaternityWear10', 'mom10@maternitywear.com', 'Grace Harris');
