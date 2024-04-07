CREATE TABLE IF NOT EXISTS faqs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    question VARCHAR(255),
    answer TEXT
);

INSERT INTO faqs (question, answer) VALUES
    ('How to create an account?', 'You can create an account by clicking on the signup option.'),
    ('How to reset the password?', 'Click on forgot password at the login page to reset your password.'),
    ('Are there any subscription fees?', 'No, it is completely free to read comics and graphic novels.'),
    ('How to search for comics?', 'You can use the search bar at the top of the page to find specific comics.'),
    ('Is there a limit on the number of comics I can read?', 'No, you can read as many comics as you want.'),
    ('What genres of comics are available?', 'We have a wide range of genres including action, fantasy, romance, and more.'),
    ('Can I download comics for offline reading?', 'No, you can only read them online on our platform.'),
    ('Are there age restrictions for accessing certain comics?', 'Some comics may have age restrictions based on content.'),
    ('How often are new comics added to the collection?', 'New comics are added regularly to keep the collection fresh.'),
    ('Is there a feedback or suggestion option?', 'Yes, you can provide feedback or suggestions through the contact us page.');
