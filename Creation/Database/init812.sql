CREATE TABLE IF NOT EXISTS podcasts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
    description TEXT,
    episode_count INT,
    category VARCHAR(100),
    publish_date DATE
);

INSERT INTO podcasts (title, description, episode_count, category, publish_date) VALUES
('Art Deco Design', 'Podcast discussing the influence of Art Deco in modern furniture design.', 10, 'Design', '2021-06-15'),
('Fashion Forward', 'Exploring the intersection of fashion and furniture through Art Deco styles.', 8, 'Fashion', '2021-07-20'),
('Lifestyle & Spaces', 'Creating lifestyle spaces using Art Deco inspired furniture.', 5, 'Lifestyle', '2021-08-25'),
('The Art Deco Style', 'Delving into the history and characteristics of Art Deco style.', 12, 'Art', '2021-09-10'),
('Vintage Vibes', 'Bringing vintage Art Deco elements into contemporary design.', 6, 'Vintage', '2021-10-05'),
('Deco Delight', 'The joy of incorporating Art Deco elements in everyday life.', 7, 'Joy', '2021-11-15'),
('Modern Retro', 'Mixing Art Deco aesthetics with modern design sensibilities.', 9, 'Retro', '2021-12-20'),
('Golden Age Glamour', 'Capturing the glamour of the golden age with Art Deco motifs.', 11, 'Glamour', '2022-01-25'),
('Artful Living', 'Living an artful life inspired by the elegance of Art Deco.', 8, 'Artful', '2022-02-28'),
('Deco Diversity', 'Exploring the diverse applications of Art Deco style across cultures.', 10, 'Diversity', '2022-03-15');
