CREATE TABLE IF NOT EXISTS pet_profiles (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  pet_name VARCHAR(50) NOT NULL,
  pet_type VARCHAR(50),
  health_info TEXT,
  reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Buddy', 'Dog', 'Regular exercise and a balanced diet');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Whiskers', 'Cat', 'Indoor cat with special dietary requirements');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Charlie', 'Rabbit', 'Needs ample space for hopping and fresh vegetables daily');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Gizmo', 'Hamster', 'Exercise wheel and proper bedding for a healthy lifestyle');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Marley', 'Parrot', 'Regular interaction and mental stimulation are key');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Luna', 'Fish', 'Maintain proper water temperature and quality for optimal health');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Shadow', 'Guinea Pig', 'Unlimited hay, fresh vegetables, and vitamin C supplements');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Max', 'Turtle', 'UVB lighting and a balanced diet for shell health');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Oliver', 'Snake', 'Proper habitat and feeding schedule for a healthy lifespan');
INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES ('Milo', 'Ferret', 'Enrichment toys and a high-protein diet for energy and health');
