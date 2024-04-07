CREATE TABLE IF NOT EXISTS Properties (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    address VARCHAR(255),
    review TEXT,
    rating INT(1),
    agent_name VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO Properties (title, address, review, rating, agent_name) VALUES ('Beautiful Condo', '123 Main Street', 'Great place to live!', 5, 'John Smith');
INSERT INTO Properties (title, address, review, rating, agent_name) VALUES ('Cozy Apartment', '456 Elm Street', 'Nice neighborhood', 4, 'Sarah Johnson');
INSERT INTO Properties (title, address, review, rating, agent_name) VALUES ('Spacious House', '789 Oak Street', 'Plenty of room for a family', 5, 'Mike Brown');
INSERT INTO Properties (title, address, review, rating, agent_name) VALUES ('Modern Loft', '101 Pine Street', 'Love the industrial feel', 4, 'Emily Davis');
INSERT INTO Properties (title, address, review, rating, agent_name) VALUES ('Charming Cottage', '222 Maple Street', 'Peaceful and serene', 5, 'Alex Wilson');
INSERT INTO Properties (title, address, review, rating, agent_name) VALUES ('Luxury Villa', '333 Cherry Street', 'Top-notch amenities', 5, 'Linda White');
INSERT INTO Properties (title, address, review, rating, agent_name) VALUES ('Rustic Cabin', '444 Walnut Street', 'Perfect for a getaway', 4, 'Chris Roberts');
INSERT INTO Properties (title, address, review, rating, agent_name) VALUES ('Beachfront Condo', '555 Cedar Street', 'Amazing ocean views', 5, 'Nicole Adams');
INSERT INTO Properties (title, address, review, rating, agent_name) VALUES ('City Apartment', '666 Ash Street', 'Close to downtown', 4, 'Tom Miller');
INSERT INTO Properties (title, address, review, rating, agent_name) VALUES ('Country Home', '777 Birch Street', 'Quiet and peaceful setting', 5, 'Jessica Taylor');
