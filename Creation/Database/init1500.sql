CREATE TABLE clients (
    id INT AUTO_INCREMENT PRIMARY KEY,
    clientName VARCHAR(255) NOT NULL,
    contactName VARCHAR(255) NOT NULL,
    contactEmail VARCHAR(255) NOT NULL,
    contactPhone VARCHAR(20) NOT NULL
);

INSERT INTO clients (clientName, contactName, contactEmail, contactPhone) VALUES ('Acme Corp', 'John Doe', 'john.doe@acme.com', '123-456-7890');
INSERT INTO clients (clientName, contactName, contactEmail, contactPhone) VALUES ('XYZ Bikes', 'Jane Smith', 'jane.smith@xyzbikes.com', '555-555-5555');
INSERT INTO clients (clientName, contactName, contactEmail, contactPhone) VALUES ('Speedy Cycles', 'Mike Johnson', 'mike.johnson@speedycycles.com', '987-654-3210');
INSERT INTO clients (clientName, contactName, contactEmail, contactPhone) VALUES ('Cycle Universe', 'Sarah Williams', 'sarah.williams@cycleuniverse.com', '777-777-7777');
INSERT INTO clients (clientName, contactName, contactEmail, contactPhone) VALUES ('Mountain Riders', 'Tom Brown', 'tom.brown@mountainriders.com', '444-444-4444');
INSERT INTO clients (clientName, contactName, contactEmail, contactPhone) VALUES ('Pedal Power', 'Emily Davis', 'emily.davis@pedalpower.com', '111-111-1111');
INSERT INTO clients (clientName, contactName, contactEmail, contactPhone) VALUES ('Rolling Wheels', 'Chris Lee', 'chris.lee@rollingwheels.com', '222-222-2222');
INSERT INTO clients (clientName, contactName, contactEmail, contactPhone) VALUES ('Swift Bicycles', 'Alex Moore', 'alex.moore@swiftbicycles.com', '333-333-3333');
INSERT INTO clients (clientName, contactName, contactEmail, contactPhone) VALUES ('Cycle Pro', 'Anna Green', 'anna.green@cyclepro.com', '999-999-9999');
INSERT INTO clients (clientName, contactName, contactEmail, contactPhone) VALUES ('Ride Rite', 'Mark Taylor', 'mark.taylor@riderite.com', '666-666-6666');
