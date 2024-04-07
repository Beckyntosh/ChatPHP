-- init.sql

CREATE DATABASE IF NOT EXISTS my_database;
USE my_database;

CREATE TABLE artists (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    genre VARCHAR(100),
    decade VARCHAR(50),
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO artists (name, genre, decade, description) VALUES
('John Coltrane', 'Jazz', '1960s', 'An influential American jazz saxophonist.'),
('Miles Davis', 'Jazz', '1960s', 'An American trumpeter, bandleader, and composer.'),
('Bill Evans', 'Jazz', '1960s', 'An American jazz pianist and composer.'),
('Herbie Hancock', 'Jazz', '1960s', 'An American jazz pianist, keyboardist, bandleader, and composer.'),
('Thelonious Monk', 'Jazz', '1960s', 'An American jazz pianist and composer.'),
('Charles Mingus', 'Jazz', '1960s', 'An American jazz double bassist, pianist, composer, and bandleader.'),
('Dave Brubeck', 'Jazz', '1960s', 'An American jazz pianist and composer, known for his odd time signatures.'),
('Stan Getz', 'Jazz', '1960s', 'An American jazz saxophonist.'),
('Sonny Rollins', 'Jazz', '1960s', 'An American jazz tenor saxophonist.'),
('Art Blakey', 'Jazz', '1960s', 'An American jazz drummer and bandleader.');
