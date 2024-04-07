CREATE TABLE jobs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    type VARCHAR(50) NOT NULL,
    location VARCHAR(100) NOT NULL
);

INSERT INTO jobs (title, description, type, location) VALUES ('Remote Software Engineer', 'Seeking highly skilled software engineer for remote position.', 'full-time', 'Remote');
INSERT INTO jobs (title, description, type, location) VALUES ('Graphic Designer', 'Looking for a creative graphic designer to join our team.', 'part-time', 'New York City');
INSERT INTO jobs (title, description, type, location) VALUES ('Product Manager', 'Experienced product manager needed for innovative projects.', 'full-time', 'San Francisco');
INSERT INTO jobs (title, description, type, location) VALUES ('UI/UX Designer', 'Passionate UI/UX designer wanted to enhance user experience.', 'remote', 'USA');
INSERT INTO jobs (title, description, type, location) VALUES ('Marketing Specialist', 'Dynamic marketing specialist to drive brand awareness.', 'full-time', 'London');
INSERT INTO jobs (title, description, type, location) VALUES ('Content Writer', 'Talented content writer to create engaging copy.', 'part-time', 'Los Angeles');
INSERT INTO jobs (title, description, type, location) VALUES ('Web Developer', 'Skilled web developer proficient in HTML, CSS, and JavaScript.', 'full-time', 'Berlin');
INSERT INTO jobs (title, description, type, location) VALUES ('Social Media Manager', 'Social media guru to manage online presence.', 'remote', 'Canada');
INSERT INTO jobs (title, description, type, location) VALUES ('Art Director', 'Creative art director for visual storytelling.', 'full-time', 'Paris');
INSERT INTO jobs (title, description, type, location) VALUES ('Data Analyst', 'Analytical data analyst with strong statistical skills.', 'part-time', 'Tokyo');
