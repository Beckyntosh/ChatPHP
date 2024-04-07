CREATE TABLE IF NOT EXISTS blog_posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    FULLTEXT(title, content)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO blog_posts (title, content) VALUES ('Lorem Ipsum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.');
INSERT INTO blog_posts (title, content) VALUES ('Sample Post', 'This is a sample blog post content for testing purposes.');
INSERT INTO blog_posts (title, content) VALUES ('Research Paper', 'A research paper on the impact of technology on education.');
INSERT INTO blog_posts (title, content) VALUES ('Data Analysis', 'Exploring data analysis techniques in social sciences.');
INSERT INTO blog_posts (title, content) VALUES ('Machine Learning', 'Introduction to machine learning algorithms and applications.');
INSERT INTO blog_posts (title, content) VALUES ('Artificial Intelligence', 'The future of artificial intelligence and its implications.');
INSERT INTO blog_posts (title, content) VALUES ('Big Data', 'Understanding the role of big data in modern business operations.');
INSERT INTO blog_posts (title, content) VALUES ('Cloud Computing', 'Emerging trends in cloud computing and its benefits.');
INSERT INTO blog_posts (title, content) VALUES ('Cybersecurity', 'Importance of cybersecurity in protecting data and systems.');
INSERT INTO blog_posts (title, content) VALUES ('Blockchain Technology', 'Exploring the potential of blockchain technology in various industries.');
