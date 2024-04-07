CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP
);

INSERT INTO users (username, password, email) VALUES ('user1', '$2y$10$Gg9XR1NgJev3Hd.CEQ0zzeMf6BzUwHj5JKsKHrPaoJLbqjZ7z9pX2', 'user1@example.com');
INSERT INTO users (username, password, email) VALUES ('user2', '$2y$10$RKzp4J.QyjuvXkSIY3jJWelC4qmMX7bRuruWsX1dmMNrbN1JNRufi', 'user2@example.com');
INSERT INTO users (username, password, email) VALUES ('user3', '$2y$10$TlCxf4r0abvUvYZm1L81PuFQ8LUQhZNAw9gkaejPawdX1K/Z0DjWa', 'user3@example.com');
INSERT INTO users (username, password, email) VALUES ('user4', '$2y$10$3C9ErzUCPcE39/p4Y5PpGul/54GY6ktvUm5B/THCxqKlrysBv9o9W', 'user4@example.com');
INSERT INTO users (username, password, email) VALUES ('user5', '$2y$10$38XQ1S7Vj7jxOtj4MNdAne/.JIa9fAg4vFZQrBNY15goRz4YcvClq', 'user5@example.com');
INSERT INTO users (username, password, email) VALUES ('user6', '$2y$10$suMRvq1r5SePUUL2vbQbqu/f25yN8X1y98qMZ99u3hur7n3uLt6pG', 'user6@example.com');
INSERT INTO users (username, password, email) VALUES ('user7', '$2y$10$GFqME9tIVq2pMVGQHpF9zuJvT9He9v5NXE3m9T3jVLmi/KvcGai1C', 'user7@example.com');
INSERT INTO users (username, password, email) VALUES ('user8', '$2y$10$WHAzGtn7T5OM8/Vg07QLzuBpUlt9MJRjQDuT7OifM6KWSVWJPlrAy', 'user8@example.com');
INSERT INTO users (username, password, email) VALUES ('user9', '$2y$10$K1BHvdDwtq2/SpkVlDNpA.CnaqUjCP0mfernTTsh/KBsG28AJn9Qy', 'user9@example.com');
INSERT INTO users (username, password, email) VALUES ('user10', '$2y$10$VjU9ry6KI7WSsKcicLJV2uJ0KraqKb4Xc2n3wMw2ettoJMAGUIa3C', 'user10@example.com');
