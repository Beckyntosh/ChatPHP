CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(50) NOT NULL UNIQUE,
    subscribe_to_loyalty_program BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert sample data into users table
INSERT INTO users (username, password, email, subscribe_to_loyalty_program) VALUES ('john_doe', 'password123', 'john.doe@example.com', 1);
INSERT INTO users (username, password, email, subscribe_to_loyalty_program) VALUES ('jane_smith', 'password456', 'jane.smith@example.com', 0);
INSERT INTO users (username, password, email, subscribe_to_loyalty_program) VALUES ('alice_turner', 'password789', 'alice.turner@example.com', 1);
INSERT INTO users (username, password, email, subscribe_to_loyalty_program) VALUES ('bob_jackson', 'passwordabc', 'bob.jackson@example.com', 0);
INSERT INTO users (username, password, email, subscribe_to_loyalty_program) VALUES ('sara_wilson', 'passworddef', 'sara.wilson@example.com', 1);
INSERT INTO users (username, password, email, subscribe_to_loyalty_program) VALUES ('mike_adams', 'passwordghi', 'mike.adams@example.com', 0);
INSERT INTO users (username, password, email, subscribe_to_loyalty_program) VALUES ('lisa_white', 'passwordjkl', 'lisa.white@example.com', 1);
INSERT INTO users (username, password, email, subscribe_to_loyalty_program) VALUES ('steve_brown', 'passwordmno', 'steve.brown@example.com', 0);
INSERT INTO users (username, password, email, subscribe_to_loyalty_program) VALUES ('emily_green', 'passwordpqr', 'emily.green@example.com', 1);
INSERT INTO users (username, password, email, subscribe_to_loyalty_program) VALUES ('david_taylor', 'passwordstu', 'david.taylor@example.com', 0);
