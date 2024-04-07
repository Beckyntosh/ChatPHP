CREATE TABLE IF NOT EXISTS artists (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    genre VARCHAR(30) NOT NULL,
    decade VARCHAR(10) NOT NULL,
    info TEXT,
    reg_date TIMESTAMP
);

INSERT INTO artists (name, genre, decade, info) VALUES
('John Coltrane', 'Jazz', '1960s', 'John Coltrane was an American saxophonist and composer.'),
('Miles Davis', 'Jazz', '1960s', 'Miles Davis was an American trumpeter, bandleader, and composer.'),
('Thelonious Monk', 'Jazz', '1960s', 'Thelonious Monk was an American jazz pianist and composer.'),
('Bill Evans', 'Jazz', '1960s', 'Bill Evans was an American jazz pianist.'),
('Charlie Mingus', 'Jazz', '1960s', 'Charlie Mingus was an American jazz double bassist, pianist, composer and bandleader.'),
('Duke Ellington', 'Jazz', '1960s', 'Duke Ellington was an American composer, pianist, and leader of a jazz orchestra.'),
('Dave Brubeck', 'Jazz', '1960s', 'Dave Brubeck was an American jazz pianist and composer.'),
('Ornette Coleman', 'Jazz', '1960s', 'Ornette Coleman was an American jazz saxophonist, violinist, trumpeter, and composer.'),
('Wes Montgomery', 'Jazz', '1960s', 'Wes Montgomery was an American jazz guitarist.'),
('Sarah Vaughan', 'Jazz', '1960s', 'Sarah Vaughan was an American jazz singer.');

