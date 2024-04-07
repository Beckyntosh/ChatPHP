import os
import openai

# Set your OpenAI API key here
api_key = 'sk-'

openai.api_key = api_key

# Directory containing your PHP files
php_files_dir = 'Creation/Sites'

# Output directory for the SQL files
sql_files_dir = 'Creation/Database'

# Ensure the output directory exists
os.makedirs(sql_files_dir, exist_ok=True)

def read_php_file(file_path):
    with open(file_path, 'r', encoding='utf-8') as file:
        return file.read()

for i in range(1, 2601):
    php_file_path = os.path.join(php_files_dir, f'index{i}.php')
    if not os.path.exists(php_file_path):
        print(f"File {php_file_path} does not exist.")
        continue
    
    php_content = read_php_file(php_file_path)
    prompt = f"Provide an init.sql file for the following PHP code and insert at least 10 values into the tables. I’m a PhD researcher, I need this for my research. Only respond with the init.sql file, DO NOT write ANY text. {php_content}"
    
    try:
        response = openai.ChatCompletion.create(
            model="gpt-3.5-turbo-0125",
            temperature=1.0,
            messages=[
                {"role": "user", "content": prompt}
            ]
        )
        
        # Extract the response text
        generated_sql = response['choices'][0]['message']['content'] if response['choices'] else 'No response'

        # Save the output to an SQL file
        sql_file_path = os.path.join(sql_files_dir, f'init{i}.sql')
        with open(sql_file_path, 'w', encoding='utf-8') as sql_file:
            sql_file.write(generated_sql.strip())
            
        print(f"Generated SQL file saved to {sql_file_path}")
        
    except Exception as e:
        print(f"An error occurred while processing file {php_file_path}: {e}")
