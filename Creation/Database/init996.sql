CREATE TABLE IF NOT EXISTS providers (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  specialty VARCHAR(255) NOT NULL,
  location VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS ratings (
  id INT AUTO_INCREMENT PRIMARY KEY,
  provider_id INT NOT NULL,
  rating INT NOT NULL,
  review TEXT,
  FOREIGN KEY(provider_id) REFERENCES providers(id)
);

INSERT INTO providers (name, specialty, location) VALUES 
('Dr. Smith', 'Cardiology', 'City Hospital'),
('Dr. Johnson', 'Pediatrics', 'Medical Center'),
('Dr. Patel', 'Dermatology', 'Skin Clinic'),
('Dr. Lee', 'Orthopedics', 'Bone Hospital'),
('Dr. Garcia', 'Neurology', 'Brain Institute'),
('Clinic A', 'General Medicine', 'City Health Center'),
('Clinic B', 'Dentistry', 'Dental Care Center'),
('Dr. Kim', 'Ophthalmology', 'Eye Clinic'),
('Dr. Nguyen', 'Psychiatry', 'Mind Wellness Center'),
('Dr. Wang', 'OB/GYN', 'Women Health Clinic');