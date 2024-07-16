@echo off
REM Establecer la contraseña de MySQL como variable de entorno (reemplaza '12345' con tu contraseña real)
set MYSQL_PWD=12345

REM Ejecutar los scripts SQL uno por uno con mensajes descriptivos
echo Ejecutando script.sql...
mysql -u root -p%MYSQL_PWD% -D consultorio < .\script.sql

echo Ejecutando fk.sql...
mysql -u root -p%MYSQL_PWD% -D consultorio < .\constraints\fk.sql

echo Ejecutando unicos.sql...
mysql -u root -p%MYSQL_PWD% -D consultorio < .\constraints\unicos.sql

echo Ejecutando tipo_medico.sql...
mysql -u root -p%MYSQL_PWD% -D consultorio < .\data\tipo_medico.sql

echo Ejecutando tipo_regimen.sql...
mysql -u root -p%MYSQL_PWD% -D consultorio < .\data\tipo_regimen.sql

echo Ejecutando tipo_consulta.sql...
mysql -u root -p%MYSQL_PWD% -D consultorio < .\data\tipo_consulta.sql

echo Ejecutando tipo_usuario.sql...
mysql -u root -p%MYSQL_PWD% -D consultorio < .\data\tipo_usuario.sql

echo Ejecutando usuario.sql...
mysql -u root -p%MYSQL_PWD% -D consultorio < .\data\usuario.sql

echo Ejecutando eps.sql...
mysql -u root -p%MYSQL_PWD% -D consultorio < .\data\eps.sql

echo Ejecutando medico.sql...
mysql -u root -p%MYSQL_PWD% -D consultorio < .\data\medico.sql

echo Ejecutando paciente.sql...
mysql -u root -p%MYSQL_PWD% -D consultorio < .\data\paciente.sql

echo Ejecutando consulta.sql...
mysql -u root -p%MYSQL_PWD% -D consultorio < .\data\consulta.sql

REM Limpiar la variable de entorno después de su uso
set MYSQL_PWD=

echo Proceso completado.
pause
