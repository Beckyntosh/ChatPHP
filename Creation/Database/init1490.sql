CREATE TABLE IF NOT EXISTS clients (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    clientName VARCHAR(50) NOT NULL,
    contactDetails TEXT NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO clients (clientName, contactDetails) VALUES ('Acme Corp', 'Address: 123 Main Street, Email: acmecorp@example.com, Phone: 555-555-5555');
INSERT INTO clients (clientName, contactDetails) VALUES ('XYZ Ltd', 'Address: 456 Elm Avenue, Email: xyzltd@example.com, Phone: 555-123-4567');
INSERT INTO clients (clientName, contactDetails) VALUES ('ABC Company', 'Address: 789 Oak Road, Email: abccompany@example.com, Phone: 555-987-6543');
INSERT INTO clients (clientName, contactDetails) VALUES ('Sunshine Enterprises', 'Address: 321 Pine Lane, Email: sunshineenterprises@example.com, Phone: 555-777-8888');
INSERT INTO clients (clientName, contactDetails) VALUES ('Cool Art Studios', 'Address: 654 Birch Street, Email: coolartstudios@example.com, Phone: 555-444-3333');
INSERT INTO clients (clientName, contactDetails) VALUES ('The Canvas Shop', 'Address: 987 Maple Court, Email: canvasshop@example.com, Phone: 555-222-1111');
INSERT INTO clients (clientName, contactDetails) VALUES ('Rainbow Creations', 'Address: 741 Willow Circle, Email: rainbowcreations@example.com, Phone: 555-666-9999');
INSERT INTO clients (clientName, contactDetails) VALUES ('Colorful Ventures', 'Address: 852 Cherry Drive, Email: colorfulventures@example.com, Phone: 555-000-1234');
INSERT INTO clients (clientName, contactDetails) VALUES ('Artistic Express', 'Address: 159 Hemlock Lane, Email: artisticexpress@example.com, Phone: 555-321-6548');
INSERT INTO clients (clientName, contactDetails) VALUES ('Creative Designs', 'Address: 369 Sycamore Court, Email: creativedesigns@example.com, Phone: 555-789-8523');
