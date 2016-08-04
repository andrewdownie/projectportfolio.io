#!/bin/bash

db_url='onmyown.csrytxfcb9xf.us-east-1.rds.amazonaws.com' 

echo ""
echo "Connecting to db: $db_url ..."

printf 'Enter username: ' 
read -r username


mysql -h $db_url -u $username -p 

