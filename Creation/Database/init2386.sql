CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    category VARCHAR(100) NOT NULL,
    description TEXT,
    image_url TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS user_history (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    product_id INT NOT NULL,
    view_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (product_id) REFERENCES products(id)
);

INSERT INTO products (name, category, description, image_url) VALUES 
('Guitar', 'Musical Instruments', '6-string electric guitar', 'guitar.jpg'),
('Piano', 'Musical Instruments', 'Grand piano with 88 keys', 'piano.jpg'),
('Drums', 'Musical Instruments', '5-piece drum set', 'drums.jpg'),
('Violin', 'Musical Instruments', 'Acoustic violin', 'violin.jpg'),
('Keyboard', 'Musical Instruments', 'Portable electronic keyboard', 'keyboard.jpg'),
('Flute', 'Musical Instruments', 'Silver flute', 'flute.jpg'),
('Saxophone', 'Musical Instruments', 'Alto saxophone', 'saxophone.jpg'),
('Trumpet', 'Musical Instruments', 'Brass trumpet', 'trumpet.jpg'),
('Cello', 'Musical Instruments', 'Full-size cello', 'cello.jpg'),
('Bass Guitar', 'Musical Instruments', '4-string electric bass guitar', 'bass_guitar.jpg');
