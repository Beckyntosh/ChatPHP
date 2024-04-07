CREATE TABLE IF NOT EXISTS artworks (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    artist_name VARCHAR(50) NOT NULL,
    artwork_name VARCHAR(100) NOT NULL,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Insert data into artworks table
INSERT INTO artworks (artist_name, artwork_name, description) VALUES
("John Doe", "Sunset Over Mountains", "Beautiful painting of a sunset scene over mountains"),
("Jane Smith", "Abstract Artwork", "A unique abstract painting with vibrant colors"),
("Alex Johnson", "Portrait of a Woman", "Realistic portrait of a woman with intricate details"),
("Sarah Brown", "Landscapes of Tuscany", "Scenic landscapes of Tuscany in Italy"),
("Michael White", "Surreal Art", "Surreal artwork depicting dream-like imagery"),
("Emily Green", "Floral Still Life", "A delicate still life painting of colorful flowers"),
("David Roberts", "Cityscape at Night", "Urban cityscape painting capturing the night lights"),
("Laura Adams", "Seascapes", "Tranquil seascapes with crashing waves and serene beaches"),
("Chris Anderson", "Modern Architecture", "Abstract depiction of modern architecture and design"),
("Rachel Wilson", "Wildlife Painting", "Detailed wildlife painting showcasing animals in their natural habitat");
