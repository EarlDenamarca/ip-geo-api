CREATE USER '${DB_USERNAME}'@'localhost' IDENTIFIED WITH mysql_native_password BY '${DB_PASSWORD}';

GRANT ALL PRIVILEGES ON hanegraafadvies.* TO '${DB_USERNAME}'@'localhost' WITH GRANT OPTION;