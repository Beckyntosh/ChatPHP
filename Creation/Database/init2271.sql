CREATE TABLE UserProfile (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    favoriteGenre VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL
);

INSERT INTO UserProfile (username, favoriteGenre, email) VALUES ('Alice', 'Action', 'alice@example.com');
INSERT INTO UserProfile (username, favoriteGenre, email) VALUES ('Bob', 'Comedy', 'bob@example.com');
INSERT INTO UserProfile (username, favoriteGenre, email) VALUES ('Charlie', 'Drama', 'charlie@example.com');
INSERT INTO UserProfile (username, favoriteGenre, email) VALUES ('Dan', 'Fantasy', 'dan@example.com');
INSERT INTO UserProfile (username, favoriteGenre, email) VALUES ('Eve', 'Horror', 'eve@example.com');
INSERT INTO UserProfile (username, favoriteGenre, email) VALUES ('Frank', 'Mystery', 'frank@example.com');
INSERT INTO UserProfile (username, favoriteGenre, email) VALUES ('Grace', 'Romance', 'grace@example.com');
INSERT INTO UserProfile (username, favoriteGenre, email) VALUES ('Henry', 'Thriller', 'henry@example.com');
INSERT INTO UserProfile (username, favoriteGenre, email) VALUES ('Ivy', 'Action', 'ivy@example.com');
INSERT INTO UserProfile (username, favoriteGenre, email) VALUES ('Jack', 'Comedy', 'jack@example.com');
