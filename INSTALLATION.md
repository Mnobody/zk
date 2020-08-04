## Database
Login:
```
psql -h localhost -U postgres 
```
Create database:
```
postgres=# CREATE USER [user] WITH PASSWORD '[password]';
postgres=# CREATE DATABASE insight 
    WITH OWNER = user 
    ENCODING = 'UTF8' TABLESPACE = pg_default  
    CONNECTION LIMIT = -1 TEMPLATE template0;
```
