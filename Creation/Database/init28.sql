CREATE TABLE IF NOT EXISTS patients (
    id INT AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(255) NOT NULL,
    lastname VARCHAR(255) NOT NULL,
    dob DATE NOT NULL,
    medical_record TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO patients (firstname, lastname, dob, medical_record) VALUES
('John', 'Doe', '1980-05-15', 'Patient has a history of allergies.'),
('Alice', 'Smith', '1975-12-10', 'Patient undergoing physical therapy.'),
('Robert', 'Johnson', '1992-09-25', 'Patient recovering from surgery.'),
('Samantha', 'Brown', '1988-03-17', 'Patient diagnosed with diabetes.'),
('Michael', 'Miller', '1972-07-22', 'Patient with high blood pressure.'),
('Emily', 'Wilson', '1985-11-30', 'Patient with anxiety disorder.'),
('David', 'Jones', '1978-04-08', 'Patient with chronic back pain.'),
('Jessica', 'Martinez', '1990-06-19', 'Patient with asthma.'),
('William', 'Davis', '1982-02-14', 'Patient with heart condition.'),
('Amanda', 'Garcia', '1987-08-29', 'Patient with thyroid disorder.');
