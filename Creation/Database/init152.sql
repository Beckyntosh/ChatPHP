CREATE TABLE clients (
    id INT AUTO_INCREMENT PRIMARY KEY,
    clientName VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone VARCHAR(20),
    address VARCHAR(255),
    interactionLog TEXT
);

INSERT INTO clients (clientName, email, phone, address, interactionLog) VALUES ('John Doe', 'john.doe@example.com', '123-456-7890', '123 Main St', 'Initial meeting went well');
INSERT INTO clients (clientName, email, phone, address, interactionLog) VALUES ('Jane Smith', 'jane.smith@example.com', '555-555-5555', '456 Elm St', 'Sent follow-up email');
INSERT INTO clients (clientName, email, phone, address, interactionLog) VALUES ('Alice Johnson', 'alice.johnson@example.com', '789-123-4567', '789 Oak Ave', 'Scheduled next appointment');
INSERT INTO clients (clientName, email, phone, address, interactionLog) VALUES ('Bob Brown', 'bob.brown@example.com', '111-222-3333', '101 Pine Rd', 'Phone call for status update');
INSERT INTO clients (clientName, email, phone, address, interactionLog) VALUES ('Sarah Lee', 'sarah.lee@example.com', '777-888-9999', '888 Maple Blvd', 'Discussion about project requirements');
INSERT INTO clients (clientName, email, phone, address, interactionLog) VALUES ('Michael Miller', 'michael.miller@example.com', '444-555-6666', '222 Birch Ln', 'Send proposal for review');
INSERT INTO clients (clientName, email, phone, address, interactionLog) VALUES ('Laura White', 'laura.white@example.com', '666-999-3333', '456 Walnut St', 'Meeting to finalize contract terms');
INSERT INTO clients (clientName, email, phone, address, interactionLog) VALUES ('Chris Taylor', 'chris.taylor@example.com', '222-777-4444', '333 Cedar Ave', 'Follow-up call for feedback');
INSERT INTO clients (clientName, email, phone, address, interactionLog) VALUES ('Megan Clark', 'megan.clark@example.com', '888-333-7777', '999 Pine St', 'Review project timeline');
INSERT INTO clients (clientName, email, phone, address, interactionLog) VALUES ('Steven Adams', 'steven.adams@example.com', '123-789-4562', '777 Oak Ln', 'Site visit scheduled');
