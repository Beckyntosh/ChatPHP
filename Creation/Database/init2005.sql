CREATE TABLE IF NOT EXISTS photoshop_files (
    id INT AUTO_INCREMENT PRIMARY KEY, 
    filename VARCHAR(255) NOT NULL, 
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO photoshop_files (filename) VALUES ('landscape1.jpg');
INSERT INTO photoshop_files (filename) VALUES ('portrait1.jpg');
INSERT INTO photoshop_files (filename) VALUES ('nature1.jpg');
INSERT INTO photoshop_files (filename) VALUES ('cityscape1.jpg');
INSERT INTO photoshop_files (filename) VALUES ('abstract1.jpg');
INSERT INTO photoshop_files (filename) VALUES ('animal1.jpg');
INSERT INTO photoshop_files (filename) VALUES ('architecture1.jpg');
INSERT INTO photoshop_files (filename) VALUES ('food1.jpg');
INSERT INTO photoshop_files (filename) VALUES ('travel1.jpg');
INSERT INTO photoshop_files (filename) VALUES ('street1.jpg');