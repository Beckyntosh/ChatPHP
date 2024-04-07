CREATE TABLE IF NOT EXISTS energy_consumption (
id INT AUTO_INCREMENT PRIMARY KEY,
household VARCHAR(255) NOT NULL,
monthly_energy_use INT NOT NULL,
saving_tips TEXT NOT NULL,
reg_date TIMESTAMP
);

INSERT INTO energy_consumption (household, monthly_energy_use, saving_tips)
VALUES ('Household 1', 100, 'Consider LED bulbs, reduce heating.'),
('Household 2', 150, 'Unplug appliances when not in use.'),
('Household 3', 120, 'Use energy-efficient appliances.'),
('Household 4', 200, 'Insulate your home to save on heating and cooling costs.'),
('Household 5', 80, 'Switch to energy-saving light fixtures.'),
('Household 6', 110, 'Invest in solar panels for sustainable energy.'),
('Household 7', 90, 'Turn off lights when leaving a room.'),
('Household 8', 170, 'Use curtains to regulate room temperature.'),
('Household 9', 130, 'Set your thermostat to an energy-saving temperature.'),
('Household 10', 140, 'Opt for energy-saving showerheads and faucets.');
