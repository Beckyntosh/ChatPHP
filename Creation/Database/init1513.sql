CREATE TABLE IF NOT EXISTS clients (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(50) NOT NULL,
contact_name VARCHAR(50),
contact_email VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO clients (name, contact_name, contact_email) VALUES ('Acme Corp', 'John Doe', 'john.doe@acme.com');
INSERT INTO clients (name, contact_name, contact_email) VALUES ('XYZ Company', 'Jane Smith', 'jane.smith@xyz.com');
INSERT INTO clients (name, contact_name, contact_email) VALUES ('ABC Inc', 'Tom Brown', 'tom.brown@abcinc.com');
INSERT INTO clients (name, contact_name, contact_email) VALUES ('Green World', 'Sarah Green', 'sarah.green@greenworld.com');
INSERT INTO clients (name, contact_name, contact_email) VALUES ('Fresh Farms', 'Michael Johnson', 'michael.johnson@freshfarms.com');
INSERT INTO clients (name, contact_name, contact_email) VALUES ('Healthy Harvest', 'Emily White', 'emily.white@healthyharvest.com');
INSERT INTO clients (name, contact_name, contact_email) VALUES ('Natures Best', 'Alex Turner', 'alex.turner@naturesbest.com');
INSERT INTO clients (name, contact_name, contact_email) VALUES ('Happy Organics', 'Linda Brown', 'linda.brown@happyorganics.com');
INSERT INTO clients (name, contact_name, contact_email) VALUES ('Sunrise Foods', 'Paul Adams', 'paul.adams@sunrisefoods.com');
INSERT INTO clients (name, contact_name, contact_email) VALUES ('Greenlands Ltd', 'Emma Carter', 'emma.carter@greenlands.com');
