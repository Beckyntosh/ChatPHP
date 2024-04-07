CREATE TABLE jobs (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    description TEXT,
    location VARCHAR(50),
    is_remote BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO jobs (title, description, location, is_remote) VALUES 
    ('Software Developer', 'Develop amazing software applications.', 'New York', false),
    ('Remote Software Creator', 'Create software from anywhere in the world.', '', true),
    ('Web Designer', 'Design beautiful and functional websites.', 'California', false),
    ('Data Analyst', 'Analyze data and generate insights.', 'London', false),
    ('Mobile App Developer', 'Develop mobile applications for various platforms.', 'San Francisco', false),
    ('Digital Marketing Specialist', 'Implement online marketing strategies.', 'Remote', true),
    ('Customer Support Agent', 'Provide support to customers via phone and email.', 'Paris', false),
    ('Graphic Designer', 'Create visually appealing designs for print and digital media.', 'Berlin', false),
    ('Product Manager', 'Manage product development and strategy.', 'Manchester', false),
    ('UI/UX Designer', 'Design user-friendly interfaces for websites and apps.', 'Remote', true);