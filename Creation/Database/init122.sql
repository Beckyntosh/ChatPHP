CREATE TABLE IF NOT EXISTS Patients (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(50) NOT NULL,
    email VARCHAR(50),
    phone VARCHAR(15),
    appointment_date DATE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO Patients (fullname, email, phone, appointment_date) VALUES ('John Smith', 'john@example.com', '1234567890', '2022-12-15');
INSERT INTO Patients (fullname, email, phone, appointment_date) VALUES ('Alice Johnson', 'alice@example.com', '9876543210', '2022-11-20');
INSERT INTO Patients (fullname, email, phone, appointment_date) VALUES ('Bob Brown', 'bob@example.com', '4561237890', '2022-10-25');
INSERT INTO Patients (fullname, email, phone, appointment_date) VALUES ('Emily White', 'emily@example.com', '7894561230', '2022-09-30');
INSERT INTO Patients (fullname, email, phone, appointment_date) VALUES ('Mike Miller', 'mike@example.com', '3216549870', '2022-08-05');
INSERT INTO Patients (fullname, email, phone, appointment_date) VALUES ('Sarah Davis', 'sarah@example.com', '6549871230', '2022-07-10');
INSERT INTO Patients (fullname, email, phone, appointment_date) VALUES ('Alex Wilson', 'alex@example.com', '4563217890', '2022-06-15');
INSERT INTO Patients (fullname, email, phone, appointment_date) VALUES ('Jessica Lee', 'jessica@example.com', '9873214560', '2022-05-20');
INSERT INTO Patients (fullname, email, phone, appointment_date) VALUES ('David Clark', 'david@example.com', '3214567890', '2022-04-25');
INSERT INTO Patients (fullname, email, phone, appointment_date) VALUES ('Laura Martinez', 'laura@example.com', '6541239870', '2022-03-30');
