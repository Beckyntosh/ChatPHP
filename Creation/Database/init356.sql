CREATE TABLE content (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    language VARCHAR(2) NOT NULL,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL
);

INSERT INTO content (language, title, content) VALUES
('en', 'Welcome to our Watches Website', 'Explore our collection of stylish watches.'),
('en', 'Latest Watch Designs', 'Check out the newest designs in our collection.'),
('es', 'Bienvenido a nuestro sitio web de relojes', 'Explore nuestra colección de elegantes relojes.'),
('es', 'Últimos diseños de relojes', 'Descubre los diseños más nuevos de nuestra colección.'),
('fr', 'Bienvenue sur notre site Web de montres', 'Découvrez notre collection de montres élégantes.'),
('fr', 'Derniers designs de montres', 'Découvrez les derniers designs de notre collection.'),
('de', 'Willkommen auf unserer Uhren-Website', 'Erkunden Sie unsere Kollektion stilvoller Uhren.'),
('de', 'Neueste Uhren-Designs', 'Entdecken Sie die neuesten Designs in unserer Kollektion.'),
('it', 'Benvenuti nel nostro sito web di orologi', 'Esplora la nostra collezione di orologi eleganti.'),
('it', 'Ultimi design di orologi', 'Scopri i design più recenti della nostra collezione.');
