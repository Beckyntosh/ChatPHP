CREATE TABLE IF NOT EXISTS job_types (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        type VARCHAR(30) NOT NULL
    );

CREATE TABLE IF NOT EXISTS locations (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        location VARCHAR(50) NOT NULL
    );

CREATE TABLE IF NOT EXISTS experience_levels (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        level VARCHAR(30) NOT NULL
    );

CREATE TABLE IF NOT EXISTS jobs (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(100) NOT NULL,
        description TEXT NOT NULL,
        job_type INT(6) UNSIGNED,
        location INT(6) UNSIGNED,
        experience_level INT(6) UNSIGNED,
        FOREIGN KEY (job_type) REFERENCES job_types(id),
        FOREIGN KEY (location) REFERENCES locations(id),
        FOREIGN KEY (experience_level) REFERENCES experience_levels(id)
    );

INSERT IGNORE INTO job_types (id, type) VALUES (1, 'Full-time'), (2, 'Part-time'), (3, 'Contract');

INSERT IGNORE INTO locations (id, location) VALUES (1, 'CyberCity'), (2, 'Neo-Tokyo'), (3, 'Silicon Valley');

INSERT IGNORE INTO experience_levels (id, level) VALUES (1, 'Entry Level'), (2, 'Mid Level'), (3, 'Senior Level');
