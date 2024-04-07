CREATE TABLE IF NOT EXISTS users (
id INT AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30),
name VARCHAR(30),
email VARCHAR(50),
password VARCHAR(255)
);

INSERT INTO users (username, name, email, password) VALUES ('john_doe', 'John Doe', 'john.doe@example.com', '$2y$10$6i0wG52.4vgNAuxZd5Ns6ONMl2t.1xB5pHQBv7LzwTjpoRv70Nrba');
INSERT INTO users (username, name, email, password) VALUES ('jane_smith', 'Jane Smith', 'jane.smith@example.com', '$2y$10$6i0wG52.4vgNAuxZd5Ns6ONMl2t.1xB5pHQBv7LzwTjpoRv70Nrba');
INSERT INTO users (username, name, email, password) VALUES ('mark_johnson', 'Mark Johnson', 'mark.johnson@example.com', '$2y$10$6i0wG52.4vgNAuxZd5Ns6ONMl2t.1xB5pHQBv7LzwTjpoRv70Nrba');
INSERT INTO users (username, name, email, password) VALUES ('sarah_miller', 'Sarah Miller', 'sarah.miller@example.com', '$2y$10$6i0wG52.4vgNAuxZd5Ns6ONMl2t.1xB5pHQBv7LzwTjpoRv70Nrba');
INSERT INTO users (username, name, email, password) VALUES ('michael_clark', 'Michael Clark', 'michael.clark@example.com', '$2y$10$6i0wG52.4vgNAuxZd5Ns6ONMl2t.1xB5pHQBv7LzwTjpoRv70Nrba');
INSERT INTO users (username, name, email, password) VALUES ('lisa_brown', 'Lisa Brown', 'lisa.brown@example.com', '$2y$10$6i0wG52.4vgNAuxZd5Ns6ONMl2t.1xB5pHQBv7LzwTjpoRv70Nrba');
INSERT INTO users (username, name, email, password) VALUES ('peter_wilson', 'Peter Wilson', 'peter.wilson@example.com', '$2y$10$6i0wG52.4vgNAuxZd5Ns6ONMl2t.1xB5pHQBv7LzwTjpoRv70Nrba');
INSERT INTO users (username, name, email, password) VALUES ('amy_young', 'Amy Young', 'amy.young@example.com', '$2y$10$6i0wG52.4vgNAuxZd5Ns6ONMl2t.1xB5pHQBv7LzwTjpoRv70Nrba');
INSERT INTO users (username, name, email, password) VALUES ('kevin_adams', 'Kevin Adams', 'kevin.adams@example.com', '$2y$10$6i0wG52.4vgNAuxZd5Ns6ONMl2t.1xB5pHQBv7LzwTjpoRv70Nrba');
INSERT INTO users (username, name, email, password) VALUES ('emily_jones', 'Emily Jones', 'emily.jones@example.com', '$2y$10$6i0wG52.4vgNAuxZd5Ns6ONMl2t.1xB5pHQBv7LzwTjpoRv70Nrba');
