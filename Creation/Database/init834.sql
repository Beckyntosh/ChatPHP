CREATE TABLE products (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description VARCHAR(255) NOT NULL
);

INSERT INTO products (name, description) VALUES ('Keto Plan', 'High fat, low carb diet plan');
INSERT INTO products (name, description) VALUES ('Paleo Plan', 'Diet plan based on foods similar to what might have been eaten during the Paleolithic era');
INSERT INTO products (name, description) VALUES ('Mediterranean Plan', 'Diet emphasizing eating primarily plant-based foods, lean proteins, and healthy fats');
INSERT INTO products (name, description) VALUES ('Vegetarian Plan', 'Diet plan that excludes meat and animal products');
INSERT INTO products (name, description) VALUES ('Whole30 Plan', 'Diet that eliminates certain food groups for 30 days to reset body');
INSERT INTO products (name, description) VALUES ('Flexitarian Plan', 'Flexible diet that focuses on plant-based foods but allows for occasional meat consumption');
INSERT INTO products (name, description) VALUES ('DASH Plan', 'Diet plan designed to lower blood pressure and promote heart health');
INSERT INTO products (name, description) VALUES ('Weight Watchers Plan', 'Diet program that assigns point values to foods based on their nutritional content');
INSERT INTO products (name, description) VALUES ('Intermittent Fasting Plan', 'Diet plan that alternates between periods of fasting and eating');
INSERT INTO products (name, description) VALUES ('Low-FODMAP Plan', 'Diet plan that eliminates certain carbohydrates to help manage digestive issues');
