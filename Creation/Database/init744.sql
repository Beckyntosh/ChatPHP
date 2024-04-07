CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    name VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    password VARCHAR(255) NOT NULL
);

INSERT INTO users (username, name, email, password) VALUES
('john_doe', 'John Doe', 'john.doe@example.com', 'johns_password'),
('jane_smith', 'Jane Smith', 'jane.smith@example.com', 'janes_password'),
('bob_jones', 'Bob Jones', 'bob.jones@example.com', 'bobs_password'),
('sara_davis', 'Sara Davis', 'sara.davis@example.com', 'saras_password'),
('mike_brown', 'Mike Brown', 'mike.brown@example.com', 'mikes_password'),
('lisa_miller', 'Lisa Miller', 'lisa.miller@example.com', 'lisas_password'),
('alex_cook', 'Alex Cook', 'alex.cook@example.com', 'alexs_password'),
('emily_white', 'Emily White', 'emily.white@example.com', 'emilys_password'),
('sam_roberts', 'Sam Roberts', 'sam.roberts@example.com', 'sams_password'),
('vicky_hill', 'Vicky Hill', 'vicky.hill@example.com', 'vickys_password');
