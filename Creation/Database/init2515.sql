CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    email VARCHAR(50) NOT NULL,
    language VARCHAR(50) NOT NULL,
    reg_date TIMESTAMP
);

-- Insert sample data into users table
INSERT INTO users (username, email, language) VALUES ('john_doe', 'john.doe@example.com', 'English');
INSERT INTO users (username, email, language) VALUES ('alice_smith', 'alice.smith@example.com', 'Spanish');
INSERT INTO users (username, email, language) VALUES ('bob_jones', 'bob.jones@example.com', 'German');
INSERT INTO users (username, email, language) VALUES ('mary_brown', 'mary.brown@example.com', 'French');
INSERT INTO users (username, email, language) VALUES ('emma_wilson', 'emma.wilson@example.com', 'English');
INSERT INTO users (username, email, language) VALUES ('kevin_clark', 'kevin.clark@example.com', 'Spanish');
INSERT INTO users (username, email, language) VALUES ('linda_white', 'linda.white@example.com', 'German');
INSERT INTO users (username, email, language) VALUES ('rachel_green', 'rachel.green@example.com', 'French');
INSERT INTO users (username, email, language) VALUES ('david_miller', 'david.miller@example.com', 'English');
INSERT INTO users (username, email, language) VALUES ('sara_moore', 'sara.moore@example.com', 'Spanish');
