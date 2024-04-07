CREATE TABLE IF NOT EXISTS healthcare_providers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    provider_name VARCHAR(255) NOT NULL,
    rating DECIMAL(3,2) DEFAULT 0.0,
    total_ratings INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO healthcare_providers (provider_name, rating, total_ratings) VALUES ('Dr. John Doe', 4.5, 20);
INSERT INTO healthcare_providers (provider_name, rating, total_ratings) VALUES ('Dr. Jane Smith', 4.0, 15);
INSERT INTO healthcare_providers (provider_name, rating, total_ratings) VALUES ('Dr. Mike Johnson', 3.8, 12);
INSERT INTO healthcare_providers (provider_name, rating, total_ratings) VALUES ('Dr. Sarah Lee', 4.2, 18);
INSERT INTO healthcare_providers (provider_name, rating, total_ratings) VALUES ('Dr. Tom Brown', 4.1, 22);
INSERT INTO healthcare_providers (provider_name, rating, total_ratings) VALUES ('Dr. Emily White', 3.9, 10);
INSERT INTO healthcare_providers (provider_name, rating, total_ratings) VALUES ('Dr. David Davis', 4.3, 25);
INSERT INTO healthcare_providers (provider_name, rating, total_ratings) VALUES ('Dr. Samantha Black', 4.4, 30);
INSERT INTO healthcare_providers (provider_name, rating, total_ratings) VALUES ('Dr. Kevin Green', 3.5, 8);
INSERT INTO healthcare_providers (provider_name, rating, total_ratings) VALUES ('Dr. Laura Hill', 4.7, 35);