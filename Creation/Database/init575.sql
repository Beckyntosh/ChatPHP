CREATE TABLE IF NOT EXISTS comic_library (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    author VARCHAR(255) NOT NULL,
    genre VARCHAR(255) NOT NULL
);

INSERT INTO comic_library (title, author, genre) VALUES 
("Maus", "Art Spiegelman", "Graphic Novel"),
("Persepolis", "Marjane Satrapi", "Autobiography"),
("Watchmen", "Alan Moore", "Superhero"),
("Fun Home", "Alison Bechdel", "Memoir"),
("Sandman", "Neil Gaiman", "Fantasy"),
("Saga", "Brian K. Vaughan", "Fantasy/Sci-Fi"),
("Y: The Last Man", "Brian K. Vaughan", "Dystopian"),
("Bone", "Jeff Smith", "Fantasy"),
("Blankets", "Craig Thompson", "Romance"),
("The Walking Dead", "Robert Kirkman", "Horror");
