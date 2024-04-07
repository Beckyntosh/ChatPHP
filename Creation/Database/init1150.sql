CREATE TABLE IF NOT EXISTS jobs (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    location VARCHAR(50),
    is_remote BOOLEAN DEFAULT false,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO jobs (title, description, location, is_remote) VALUES
("Remote Software Engineer", "Looking for a skilled software engineer to work remotely on exciting projects.", "Remote", 1),
("Frontend Developer", "Seeking a frontend developer to join our team in New York.", "New York, NY", 0),
("Full Stack Developer", "Exciting opportunity for a full stack developer to work on cutting-edge technologies.", "San Francisco, CA", 0),
("UX Designer", "We are looking for a talented UX designer to create amazing user experiences.", "Austin, TX", 0),
("Data Scientist", "Join our data science team to unlock insights from complex data sets.", "Chicago, IL", 0),
("Digital Marketing Specialist", "Looking for a digital marketing expert to drive online growth.", "Remote", 1),
("DevOps Engineer", "We are hiring a DevOps engineer to streamline our development process.", "Seattle, WA", 0),
("Mobile App Developer", "Exciting opportunity for a mobile app developer to work on innovative projects.", "Los Angeles, CA", 0),
("AI Researcher", "Join our AI research team to push the boundaries of artificial intelligence.", "Boston, MA", 0),
("Product Manager", "Seeking a talented product manager to drive product development initiatives.", "Remote", 1);
