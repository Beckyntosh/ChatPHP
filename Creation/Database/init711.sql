CREATE TABLE IF NOT EXISTS research_data (
    id INT AUTO_INCREMENT PRIMARY KEY,
    research_title VARCHAR(255) NOT NULL,
    researcher_name VARCHAR(255) NOT NULL,
    research_field VARCHAR(255) NOT NULL,
    publication_date DATE
);

CREATE TABLE IF NOT EXISTS document_uploads (
    id INT AUTO_INCREMENT PRIMARY KEY,
    file_name VARCHAR(255) NOT NULL,
    file_path VARCHAR(255) NOT NULL,
    uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO research_data (research_title, researcher_name, research_field, publication_date) VALUES 
('Sample Research Title 1', 'John Doe', 'Computer Science', '2021-07-15'),
('Sample Research Title 2', 'Jane Smith', 'Biology', '2021-08-20'),
('Sample Research Title 3', 'Alice Johnson', 'Physics', '2021-09-10'),
('Sample Research Title 4', 'David Brown', 'Chemistry', '2021-06-25'),
('Sample Research Title 5', 'Sarah Wilson', 'Mathematics', '2021-05-12'),
('Sample Research Title 6', 'Michael Clark', 'Engineering', '2021-04-30'),
('Sample Research Title 7', 'Emily Lee', 'Sociology', '2021-03-18'),
('Sample Research Title 8', 'Robert Green', 'Psychology', '2021-02-05'),
('Sample Research Title 9', 'Laura Adams', 'Economics', '2021-01-22'),
('Sample Research Title 10', 'Chris Taylor', 'History', '2021-10-28');