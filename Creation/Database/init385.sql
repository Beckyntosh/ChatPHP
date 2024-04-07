CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

INSERT INTO users (username, password) VALUES ('john_doe', '$2y$10$HTKfkrTj6Wa.NxegLz0j/.lrcyBsQHaSPmB8pPcSoNEKmV7Q23amo');
INSERT INTO users (username, password) VALUES ('jane_smith', '$2y$10$HTKfkrTj6Wa.NxegLz0j/.lrcyBsQHaSPmB8pPcSoNEKmV7Q23amo');
INSERT INTO users (username, password) VALUES ('alice_jones', '$2y$10$HTKfkrTj6Wa.NxegLz0j/.lrcyBsQHaSPmB8pPcSoNEKmV7Q23amo');
INSERT INTO users (username, password) VALUES ('sam_wilson', '$2y$10$HTKfkrTj6Wa.NxegLz0j/.lrcyBsQHaSPmB8pPcSoNEKmV7Q23amo');
INSERT INTO users (username, password) VALUES ('emily_brown', '$2y$10$HTKfkrTj6Wa.NxegLz0j/.lrcyBsQHaSPmB8pPcSoNEKmV7Q23amo');
INSERT INTO users (username, password) VALUES ('michael_clark', '$2y$10$HTKfkrTj6Wa.NxegLz0j/.lrcyBsQHaSPmB8pPcSoNEKmV7Q23amo');
INSERT INTO users (username, password) VALUES ('sarah_smith', '$2y$10$HTKfkrTj6Wa.NxegLz0j/.lrcyBsQHaSPmB8pPcSoNEKmV7Q23amo');
INSERT INTO users (username, password) VALUES ('david_wilson', '$2y$10$HTKfkrTj6Wa.NxegLz0j/.lrcyBsQHaSPmB8pPcSoNEKmV7Q23amo');
INSERT INTO users (username, password) VALUES ('lisa_miller', '$2y$10$HTKfkrTj6Wa.NxegLz0j/.lrcyBsQHaSPmB8pPcSoNEKmV7Q23amo');
INSERT INTO users (username, password) VALUES ('kevin_johnson', '$2y$10$HTKfkrTj6Wa.NxegLz0j/.lrcyBsQHaSPmB8pPcSoNEKmV7Q23amo');
