CREATE TABLE IF NOT EXISTS software_packages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    package_name VARCHAR(255) NOT NULL,
    package_version VARCHAR(255) NOT NULL,
    author_name VARCHAR(255),
    upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    file_name VARCHAR(255) NOT NULL
);

INSERT INTO software_packages (package_name, package_version, author_name, file_name) VALUES ('Package1', '1.0', 'Author1', 'file1.zip');
INSERT INTO software_packages (package_name, package_version, author_name, file_name) VALUES ('Package2', '2.1', 'Author2', 'file2.zip');
INSERT INTO software_packages (package_name, package_version, author_name, file_name) VALUES ('Package3', '3.2', 'Author3', 'file3.zip');
INSERT INTO software_packages (package_name, package_version, author_name, file_name) VALUES ('Package4', '1.3', 'Author4', 'file4.zip');
INSERT INTO software_packages (package_name, package_version, author_name, file_name) VALUES ('Package5', '2.4', 'Author5', 'file5.zip');
INSERT INTO software_packages (package_name, package_version, author_name, file_name) VALUES ('Package6', '3.5', 'Author6', 'file6.zip');
INSERT INTO software_packages (package_name, package_version, author_name, file_name) VALUES ('Package7', '1.6', 'Author7', 'file7.zip');
INSERT INTO software_packages (package_name, package_version, author_name, file_name) VALUES ('Package8', '2.7', 'Author8', 'file8.zip');
INSERT INTO software_packages (package_name, package_version, author_name, file_name) VALUES ('Package9', '3.8', 'Author9', 'file9.zip');
INSERT INTO software_packages (package_name, package_version, author_name, file_name) VALUES ('Package10', '1.9', 'Author10', 'file10.zip');
