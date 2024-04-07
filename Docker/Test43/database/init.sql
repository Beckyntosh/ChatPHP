CREATE TABLE IF NOT EXISTS VolunteerSignUps (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    event VARCHAR(50),
    reg_date TIMESTAMP
);

INSERT INTO VolunteerSignUps (fullname, email, event) VALUES ('John Doe', 'johndoe@example.com', 'Local Charity Biking Event');
INSERT INTO VolunteerSignUps (fullname, email, event) VALUES ('Jane Smith', 'janesmith@example.com', 'Community Bike Repair Workshop');
INSERT INTO VolunteerSignUps (fullname, email, event) VALUES ('Alice Johnson', 'alicejohnson@example.com', 'Local Charity Biking Event');
INSERT INTO VolunteerSignUps (fullname, email, event) VALUES ('Bob Brown', 'bobbrown@example.com', 'Local Charity Biking Event');
INSERT INTO VolunteerSignUps (fullname, email, event) VALUES ('Sarah Lee', 'sarahlee@example.com', 'Community Bike Repair Workshop');
INSERT INTO VolunteerSignUps (fullname, email, event) VALUES ('Mike Wilson', 'mikewilson@example.com', 'Local Charity Biking Event');
INSERT INTO VolunteerSignUps (fullname, email, event) VALUES ('Emily Wang', 'emilywang@example.com', 'Community Bike Repair Workshop');
INSERT INTO VolunteerSignUps (fullname, email, event) VALUES ('Chris Turner', 'christurner@example.com', 'Local Charity Biking Event');
INSERT INTO VolunteerSignUps (fullname, email, event) VALUES ('Laura Davis', 'lauradavis@example.com', 'Local Charity Biking Event');
INSERT INTO VolunteerSignUps (fullname, email, event) VALUES ('Tom Roberts', 'tomroberts@example.com', 'Community Bike Repair Workshop');