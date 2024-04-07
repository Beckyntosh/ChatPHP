CREATE TABLE IF NOT EXISTS messages (
id INT AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(255),
email VARCHAR(255),
message TEXT,
sent_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO messages (name, email, message) VALUES ('John Doe', 'johndoe@example.com', 'Hello, I have a question about your library');
INSERT INTO messages (name, email, message) VALUES ('Jane Smith', 'janesmith@example.com', 'I love your collection of skateboards');
INSERT INTO messages (name, email, message) VALUES ('Michael Johnson', 'michaeljohnson@example.com', 'Can I donate my old skateboard to your library?');
INSERT INTO messages (name, email, message) VALUES ('Emily Brown', 'emilybrown@example.com', 'Do you offer skateboard maintenance services?');
INSERT INTO messages (name, email, message) VALUES ('David Wilson', 'davidwilson@example.com', 'I want to enquire about your membership options');
INSERT INTO messages (name, email, message) VALUES ('Sarah Davis', 'sarahdavis@example.com', 'Great website and selection of skateboards');
INSERT INTO messages (name, email, message) VALUES ('Ryan Thompson', 'ryanthompson@example.com', 'Looking to purchase a new skateboard, any recommendations?');
INSERT INTO messages (name, email, message) VALUES ('Olivia Martinez', 'oliviamartinez@example.com', 'Do you host skateboarding events at your library?');
INSERT INTO messages (name, email, message) VALUES ('Chris Lee', 'chrislee@example.com', 'Interested in learning more about skateboarding history');
INSERT INTO messages (name, email, message) VALUES ('Amanda Hernandez', 'amandahernandez@example.com', 'Can I book a group tour of your skateboard collection?');
