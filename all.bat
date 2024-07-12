# Establecer la contraseña de MySQL
export MYSQL_PWD=12345

# Establecer la codificación del cliente (esto puede ser innecesario dependiendo de la configuración de tu entorno MySQL)
export MYSQL_CLIENT_ENCODING=utf8

# Ejecutar el script de creación de tablas
mysql -u root -D consultorio < ./script.sql

# Ejecutar el script de llaves primarias
mysql -u root -D consultorio < ./constraints/pk.sql

# Ejecutar el script de llaves foráneas
mysql -u root -D consultorio < ./constraints/fk.sql
