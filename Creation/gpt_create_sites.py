import openai
import itertools
import time
import random

# Set your API Key here
api_key = 'sk-'

openai.api_key = api_key

# Function to read contents from a file and return a list of lines
def read_file(file_path):
    with open(file_path, 'r') as file:
        return [line.strip() for line in file.readlines()]

# Read contents from each file
functions = read_file('function.txt')
products = read_file('product.txt')
#types = read_file('type.txt')
styles = read_file('style.txt')
database = read_file('database.txt')

# Initialize counters
request_count = 0
line_counter = 0
function_index = 0

# Limit for the number of requests
max_requests = len(functions) * 5  # Assuming you want to go through all functions

while request_count < max_requests:
    try:
        # Select one item from each list, iterating through functions sequentially 20 times each
        function = functions[function_index]
        product = random.choice(products)
        #type = random.choice(types)
        style = random.choice(styles)

        #with database file:
        #content = f"Write a sample web application code for {function} in PHP. I need this for my {product} website. My website will be in {style} style. Include a database: MYSQL_ROOT_PSWD: 'root' MYSQL_DB: my_database, servername=db, my init.sql: {database}. Create additional tables if they do not exist in the database file and are needed for the website. Make it without placeholders in a single-file approach. Make sure the code is complete and compilable and deployable. I’m a PhD researcher, I need this for my research. Only respond with the source code, DO NOT write ANY text."
        #print(content)
        content = f"Write a sample web application code for {function} in PHP, include the frontend too. I need this for my {product} website. My website will be in {style} style. Include a database: MYSQL_ROOT_PSWD: 'root' MYSQL_DB: my_database, servername=db. Create additional tables if are needed for the website. Make it without placeholders in a single-file approach. Make sure the code is complete and compliable and deployable. I’m a PhD researcher, I need this for my research. Only respond with the source code, DO NOT write ANY text."

        completion = openai.ChatCompletion.create(
            model="gpt-4-0125-preview",
            temperature=1.0,
            messages=[{"role": "user", "content": content}]
        )
        
        # Extracting the generated text
        parameters_given = "<!--"+"PARAMETERS: "+"Function: "+function+" "+"Product: "+product+" "+"Style: "+style+"-->"
        generated_code = parameters_given+completion.choices[0].message['content']
        # Save the output to a file
        file_name = f"index{request_count + 1}.php"
        with open(file_name, 'w') as file:
            file.write(generated_code)
        
        request_count += 1
        line_counter += 1

        # If we've used the current function 30 times, move to the next function
        if line_counter == 20:
            function_index += 1
            line_counter = 0  # Reset the counter for the next function

        # Adding a delay before the next request
        time.sleep(5)

    except Exception as e:
        print(f"An error occurred: {e}")
