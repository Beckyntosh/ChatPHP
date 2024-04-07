CREATE TABLE IF NOT EXISTS expenses (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
expense_name VARCHAR(30) NOT NULL,
amount DECIMAL(10,2) NOT NULL,
category VARCHAR(30) NOT NULL,
reg_date TIMESTAMP
);

INSERT INTO expenses (expense_name, amount, category) VALUES ('Grocery Shopping', 200.00, 'Food');
INSERT INTO expenses (expense_name, amount, category) VALUES ('Gym Membership', 50.00, 'Fitness');
INSERT INTO expenses (expense_name, amount, category) VALUES ('Protein Shake', 20.00, 'Wellness');
INSERT INTO expenses (expense_name, amount, category) VALUES ('Dinner Out', 30.00, 'Food');
INSERT INTO expenses (expense_name, amount, category) VALUES ('Yoga Class', 15.00, 'Wellness');
INSERT INTO expenses (expense_name, amount, category) VALUES ('Running Shoes', 80.00, 'Fitness');
INSERT INTO expenses (expense_name, amount, category) VALUES ('Salad Ingredients', 10.00, 'Food');
INSERT INTO expenses (expense_name, amount, category) VALUES ('Vitamins', 25.00, 'Wellness');
INSERT INTO expenses (expense_name, amount, category) VALUES ('Personal Trainer Session', 75.00, 'Fitness');
INSERT INTO expenses (expense_name, amount, category) VALUES ('Snacks', 5.00, 'Food');
