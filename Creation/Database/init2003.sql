CREATE TABLE uploads (
    id INT AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    filesize INT NOT NULL,
    filetype VARCHAR(255) NOT NULL
);

INSERT INTO uploads (filename, filesize, filetype) VALUES ('landscape_psd_1.psd', 5242880, 'application/photoshop');
INSERT INTO uploads (filename, filesize, filetype) VALUES ('office_supplies.psd', 7340032, 'application/photoshop');
INSERT INTO uploads (filename, filesize, filetype) VALUES ('abstract_design.psd', 8912896, 'application/photoshop');
INSERT INTO uploads (filename, filesize, filetype) VALUES ('nature_scenery.psd', 6324224, 'application/photoshop');
INSERT INTO uploads (filename, filesize, filetype) VALUES ('architecture.psd', 3670016, 'application/photoshop');
INSERT INTO uploads (filename, filesize, filetype) VALUES ('wildlife_photo.psd', 4128768, 'application/photoshop');
INSERT INTO uploads (filename, filesize, filetype) VALUES ('technology_concept.psd', 9846784, 'application/photoshop');
INSERT INTO uploads (filename, filesize, filetype) VALUES ('vintage_art.psd', 5767168, 'application/photoshop');
INSERT INTO uploads (filename, filesize, filetype) VALUES ('travel_destinations.psd', 8060928, 'application/photoshop');
INSERT INTO uploads (filename, filesize, filetype) VALUES ('modern_cityscape.psd', 4587520, 'application/photoshop');
