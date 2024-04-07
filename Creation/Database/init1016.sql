CREATE TABLE IF NOT EXISTS Properties (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    location VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS Agents (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS Reviews (
    id INT AUTO_INCREMENT PRIMARY KEY,
    property_id INT,
    agent_id INT,
    user VARCHAR(255) NOT NULL,
    rating INT NOT NULL,
    comment TEXT,
    FOREIGN KEY (property_id) REFERENCES Properties(id),
    FOREIGN KEY (agent_id) REFERENCES Agents(id)
);

INSERT INTO Properties (name, location) VALUES ('Cozy Apartment', 'City Center');
INSERT INTO Properties (name, location) VALUES ('Spacious House', 'Suburban Area');
INSERT INTO Properties (name, location) VALUES ('Modern Condo', 'Downtown');
INSERT INTO Properties (name, location) VALUES ('Rustic Cabin', 'Mountain Retreat');
INSERT INTO Properties (name, location) VALUES ('Luxury Villa', 'Beachfront');
INSERT INTO Properties (name, location) VALUES ('Eco-Friendly Home', 'Green Community');
INSERT INTO Properties (name, location) VALUES ('Historic Mansion', 'Old Town');
INSERT INTO Properties (name, location) VALUES ('Compact Studio', 'Urban District');
INSERT INTO Properties (name, location) VALUES ('Charming Cottage', 'Countryside');
INSERT INTO Properties (name, location) VALUES ('Contemporary Loft', 'Artistic Quarter');

INSERT INTO Agents (name) VALUES ('John Doe');
INSERT INTO Agents (name) VALUES ('Jane Smith');
INSERT INTO Agents (name) VALUES ('Michael Johnson');
INSERT INTO Agents (name) VALUES ('Emily Brown');
INSERT INTO Agents (name) VALUES ('David Wilson');
INSERT INTO Agents (name) VALUES ('Sarah Thomas');
INSERT INTO Agents (name) VALUES ('Robert Garcia');
INSERT INTO Agents (name) VALUES ('Laura Martinez');
INSERT INTO Agents (name) VALUES ('Kevin Lee');
INSERT INTO Agents (name) VALUES ('Amanda Rodriguez');
