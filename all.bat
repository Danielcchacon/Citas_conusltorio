set PGPASSWORD=12345

SET PGCLIENTENCODING=utf8

@REM tablas
psql -U postgres -d citas_conusltorio -f ./script.sql

@REM llaves primarias
psql -U postgres -d citas_conusltorio -f ./constraints/pk.sql

@REM llaves foranea
psql -U postgres -d citas_conusltorio -f ./constraints/fk.sql

