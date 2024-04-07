CREATE TABLE IF NOT EXISTS research_papers (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255),
  author VARCHAR(255),
  abstract TEXT,
  publication_date DATE,
  keyword VARCHAR(255)
);

INSERT INTO research_papers (title, author, abstract, publication_date, keyword) VALUES
('Sample Research Paper A', 'Author A', 'Abstract of Research Paper A', '2021-04-12', 'Keyword1'),
('Sample Research Paper B', 'Author B', 'Abstract of Research Paper B', '2022-05-15', 'Keyword2'),
('Sample Research Paper C', 'Author C', 'Abstract of Research Paper C', '2023-06-20', 'Keyword3'),
('Sample Research Paper D', 'Author D', 'Abstract of Research Paper D', '2024-07-25', 'Keyword4'),
('Sample Research Paper E', 'Author E', 'Abstract of Research Paper E', '2025-08-30', 'Keyword5'),
('Sample Research Paper F', 'Author F', 'Abstract of Research Paper F', '2026-09-02', 'Keyword6'),
('Sample Research Paper G', 'Author G', 'Abstract of Research Paper G', '2027-10-05', 'Keyword7'),
('Sample Research Paper H', 'Author H', 'Abstract of Research Paper H', '2028-11-08', 'Keyword8'),
('Sample Research Paper I', 'Author I', 'Abstract of Research Paper I', '2029-12-10', 'Keyword9'),
('Sample Research Paper J', 'Author J', 'Abstract of Research Paper J', '2030-01-15', 'Keyword10');
