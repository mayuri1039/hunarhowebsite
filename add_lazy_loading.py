import os
import re

def process_file(filepath):
    try:
        with open(filepath, 'r', encoding='utf-8') as f:
            content = f.read()
    except Exception as e:
        print(f"Error reading {filepath}: {e}")
        return False

    def repl(m):
        img_tag = m.group(0)
        
        # Check if already has loading attribute
        if re.search(r'\bloading\s*=', img_tag, re.IGNORECASE):
            return img_tag
            
        # Check if hero image
        if re.search(r'\b(class|id)=["\'][^"\']*hero[^"\']*["\']', img_tag, re.IGNORECASE):
            return img_tag
            
        # Ensure we don't match something that is just partially `<img`
        if img_tag.startswith('<img '):
            return img_tag.replace('<img ', '<img loading="lazy" ', 1)
        elif img_tag.startswith('<img\n') or img_tag.startswith('<img\t'):
            return '<img loading="lazy" ' + img_tag[4:]
        else:
            return img_tag

    new_content = re.sub(r'<img\s+[^>]+>', repl, content)

    if new_content != content:
        with open(filepath, 'w', encoding='utf-8') as f:
            f.write(new_content)
        return True
    return False

def main():
    modified_files = []
    for root, dirs, files in os.walk('.'):
        if any(skip in root for skip in ['vendor', '.git', 'node_modules', 'assets']):
            continue
        for file in files:
            if file.endswith('.php'):
                filepath = os.path.join(root, file)
                if process_file(filepath):
                    modified_files.append(filepath)
    
    print(f"Modified {len(modified_files)} files:")
    for f in modified_files:
        print(f" - {f}")

if __name__ == '__main__':
    main()
