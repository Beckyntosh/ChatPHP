CREATE TABLE IF NOT EXISTS software_packages (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    package_name VARCHAR(30) NOT NULL,
    version VARCHAR(10) NOT NULL,
    upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO software_packages (package_name, version) VALUES ('MyApp', 'v1.2');
INSERT INTO software_packages (package_name, version) VALUES ('ExampleApp', 'v3.0');
INSERT INTO software_packages (package_name, version) VALUES ('SchoolApp', 'v2.1');
INSERT INTO software_packages (package_name, version) VALUES ('OfficeApp', 'v4.5');
INSERT INTO software_packages (package_name, version) VALUES ('GameApp', 'v1.0');
INSERT INTO software_packages (package_name, version) VALUES ('MusicApp', 'v2.3');
INSERT INTO software_packages (package_name, version) VALUES ('PhotoApp', 'v1.3');
INSERT INTO software_packages (package_name, version) VALUES ('VideoApp', 'v5.0');
INSERT INTO software_packages (package_name, version) VALUES ('ChatApp', 'v2.0');
INSERT INTO software_packages (package_name, version) VALUES ('MapApp', 'v1.1');
