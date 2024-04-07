CREATE TABLE IF NOT EXISTS PrintJobs (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
filename VARCHAR(255) NOT NULL,
upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO PrintJobs (filename) VALUES ('wedding_invitation_design.png');
INSERT INTO PrintJobs (filename) VALUES ('magazine_cover.jpg');
INSERT INTO PrintJobs (filename) VALUES ('brochure_design.pdf');
INSERT INTO PrintJobs (filename) VALUES ('poster_design.png');
INSERT INTO PrintJobs (filename) VALUES ('business_card_design.jpg');
INSERT INTO PrintJobs (filename) VALUES ('flyer_design.pdf');
INSERT INTO PrintJobs (filename) VALUES ('banner_design.png');
INSERT INTO PrintJobs (filename) VALUES ('catalog_design.jpg');
INSERT INTO PrintJobs (filename) VALUES ('postcard_design.pdf');
INSERT INTO PrintJobs (filename) VALUES ('leaflet_design.png');
