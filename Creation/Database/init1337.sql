CREATE TABLE IF NOT EXISTS Patients (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    appointment_date DATETIME NOT NULL,
    reason VARCHAR(255),
    reg_date TIMESTAMP
);

INSERT INTO Patients (name, appointment_date, reason)
VALUES ('Jane Doe', '2023-10-20 10:00:00', 'Dental Check-up'),
       ('John Smith', '2023-10-25 11:30:00', 'Routine Check-up'),
       ('Alice Johnson', '2023-11-02 15:45:00', 'Teeth Cleaning'),
       ('David Brown', '2023-11-07 09:15:00', 'Fillings'),
       ('Sarah Wilson', '2023-11-15 14:00:00', 'Dental Surgery'),
       ('Michael Lee', '2023-11-20 08:30:00', 'Orthodontic Consultation'),
       ('Emily Davis', '2023-11-28 13:20:00', 'Gum Disease Treatment'),
       ('James Rodriguez', '2023-12-05 10:45:00', 'Root Canal Therapy'),
       ('Sophia Martinez', '2023-12-12 12:00:00', 'Wisdom Tooth Extraction'),
       ('William Taylor', '2023-12-18 09:00:00', 'Dentures Fitting');
