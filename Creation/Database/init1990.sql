CREATE TABLE IF NOT EXISTS images (
        id INT AUTO_INCREMENT PRIMARY KEY,
        filename VARCHAR(255) NOT NULL,
        size INT NOT NULL,
        type VARCHAR(50) NOT NULL,
        uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );
    
INSERT INTO images (filename, size, type) VALUES ("LandscapePhoto1.psd", 50000, "image/psd");
INSERT INTO images (filename, size, type) VALUES ("LandscapePhoto2.psd", 60000, "image/psd");
INSERT INTO images (filename, size, type) VALUES ("LandscapePhoto3.psd", 70000, "image/psd");
INSERT INTO images (filename, size, type) VALUES ("LandscapePhoto4.psd", 80000, "image/psd");
INSERT INTO images (filename, size, type) VALUES ("LandscapePhoto5.psd", 90000, "image/psd");
INSERT INTO images (filename, size, type) VALUES ("LandscapePhoto6.psd", 100000, "image/psd");
INSERT INTO images (filename, size, type) VALUES ("LandscapePhoto7.psd", 110000, "image/psd");
INSERT INTO images (filename, size, type) VALUES ("LandscapePhoto8.psd", 120000, "image/psd");
INSERT INTO images (filename, size, type) VALUES ("LandscapePhoto9.psd", 130000, "image/psd");
INSERT INTO images (filename, size, type) VALUES ("LandscapePhoto10.psd", 140000, "image/psd");