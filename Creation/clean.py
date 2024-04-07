import os

def process_file(file_path):
    with open(file_path, 'r') as f:
        lines = f.readlines()

    in_php_block = False
    for i in range(len(lines)):
        line = lines[i].strip()
        if '<!--' in line:
            in_php_block = True
            comment_start_index = line.find('<!--')
            comment_end_index = line.find('-->')
            if 'PARAMETERS:' in line:
                lines[i] = '// ' + line[comment_start_index + 4:comment_end_index].strip() + '\n'
            else:
                lines[i] = line[comment_start_index + 4:comment_end_index].strip() + '\n'
        elif '-->' in line:
            in_php_block = False
        elif '```php' in line:
            lines[i] = '<?php\n'
        elif '```' in line:
            lines[i] = ''
        elif in_php_block:
            if not lines[i].startswith('//') or i == 0:
                lines[i] = lines[i].lstrip('//')

    with open(file_path, 'w') as f:
        f.writelines(lines)

def process_files_in_directory(directory):
    for filename in os.listdir(directory):
        if filename.startswith('index') and filename.endswith('.php'):
            file_path = os.path.join(directory, filename)
            process_file(file_path)

if __name__ == '__main__':
    directory = '.'  # Change this to your directory containing index files
    process_files_in_directory(directory)
