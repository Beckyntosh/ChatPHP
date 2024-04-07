import os
import re

# Directory containing PHP files
directory = "/home/kali/Documents/ChatGPT_Code_Generations/GOOD/GPT_Web_Applicatio_Database/Creation/Sites"
# Regular expressions to find SQL queries and prepared statements
sql_query_pattern = re.compile(r"\$sql\s*=\s*\"|'.*?\"|';")
prepared_statement_pattern = re.compile(r"->prepare\(")

def check_for_prepared_statements(file_path):
    with open(file_path, 'r', encoding='utf-8', errors='ignore') as file:
        content = file.read()
        
        # Find all SQL queries
        queries = sql_query_pattern.findall(content)
        
        # Check each query for the use of prepared statements
        for query in queries:
            if prepared_statement_pattern.search(content):
                print(f"Prepared statement likely used in {file_path}")
                return True
            else:
                print(f"No prepared statement found in {file_path}")
                return False

# Walk through the directory and analyze each PHP file
for root, dirs, files in os.walk(directory):
    for file in files:
        if file.endswith(".php"):
            file_path = os.path.join(root, file)
            check_for_prepared_statements(file_path)