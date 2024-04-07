CREATE TABLE IF NOT EXISTS custom_orders (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    customer_name VARCHAR(30) NOT NULL,
    book_title VARCHAR(100) NOT NULL,
    custom_details TEXT NOT NULL,
    reg_date TIMESTAMP
);

INSERT INTO custom_orders (customer_name, book_title, custom_details) VALUES 
("Alice", "The Adventures of Alice in Wonderland", "Add a personalized illustration on the first page"),
("Bob", "To Kill a Mockingbird", "Include a custom bookmark with the order"),
("Charlie", "Pride and Prejudice", "Request for a special message inscription on the cover"),
("Danielle", "The Great Gatsby", "Add a poetry quote on the back cover"),
("Evan", "1984", "Include a customized author biography card"),
("Fiona", "Wuthering Heights", "Request a specific font for chapter headings"),
("Greg", "The Catcher in the Rye", "Add a vintage-style bookplate inside"),
("Heidi", "Moby-Dick", "Include a map of whaling locations in the book"),
("Ian", "Brave New World", "Add an author-signed bookplate inside the cover"),
("Joan", "Jane Eyre", "Request for a special foil stamping on the spine");
