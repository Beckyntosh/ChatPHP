CREATE TABLE IF NOT EXISTS patients (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    phone VARCHAR(20),
    appointment_date DATE,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO patients (name, email, phone, appointment_date) VALUES ('John Doe', 'john.doe@example.com', '1234567890', '2022-01-15');
INSERT INTO patients (name, email, phone, appointment_date) VALUES ('Jane Smith', 'jane.smith@example.com', '9876543210', '2022-02-20');
INSERT INTO patients (name, email, phone, appointment_date) VALUES ('Mike Johnson', 'mike.johnson@example.com', '5555555555', '2022-03-25');
INSERT INTO patients (name, email, phone, appointment_date) VALUES ('Emily Brown', 'emily.brown@example.com', '7777777777', '2022-04-30');
INSERT INTO patients (name, email, phone, appointment_date) VALUES ('Chris Lee', 'chris.lee@example.com', '9999999999', '2022-05-10');
INSERT INTO patients (name, email, phone, appointment_date) VALUES ('Anna Kim', 'anna.kim@example.com', '1111111111', '2022-06-15');
INSERT INTO patients (name, email, phone, appointment_date) VALUES ('David Wilson', 'david.wilson@example.com', '2222222222', '2022-07-20');
INSERT INTO patients (name, email, phone, appointment_date) VALUES ('Sarah Miller', 'sarah.miller@example.com', '3333333333', '2022-08-25');
INSERT INTO patients (name, email, phone, appointment_date) VALUES ('Brian Taylor', 'brian.taylor@example.com', '4444444444', '2022-09-30');
INSERT INTO patients (name, email, phone, appointment_date) VALUES ('Rachel Martinez', 'rachel.martinez@example.com', '6666666666', '2022-10-05');