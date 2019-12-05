import psycopg2
import json

class ConexionDB:
    def __init__(self):
        try:
            self.connection = psycopg2.connect("dbname='qdata' user='postgres' host='localhost' password='1298Luis'")
            self.connection.autocommit = True
            self.cursor = self.connection.cursor()
            print("[✔] Base de datos conectada")
        except:
            print("[x] Error en la conexion")

    def crear_tablas_postgres(self):
        create_table_command = "CREATE TABLE mexico(id serial PRIMARY KEY, poblacion_total JSON, pib JSON)"
        self.cursor.execute(create_table_command)
        create_table_command = "CREATE TABLE entidad_federativa(id serial PRIMARY KEY, nombre_entidad varchar(100), lat varchar, long varchar, exportaciones JSON, poblacion JSON, patentes JSON, unidades_economicas JSON, turismo JSON, actividad_economica_promedio JSON, actividades_economicas JSON, estado_turismo varchar)"
        self.cursor.execute(create_table_command)
        create_table_command = "CREATE TABLE municipios(id serial PRIMARY KEY, lat varchar, long varchar, nombre varchar, consumo_cfe JSON, promedio_total_estatal varchar)"
        self.cursor.execute(create_table_command)
        print("[✔] Tablas de la bse de datos creadas")

    def limpiar_tablas_postgres(self):
        drop_table_command = "DROP TABLE mexico"
        self.cursor.execute(drop_table_command)
        drop_table_command = "DROP TABLE entidad_federativa"
        self.cursor.execute(drop_table_command)
        drop_table_command = "DROP TABLE municipios"
        self.cursor.execute(drop_table_command)
        
        print("[✔] Limpieza en las tablas en la base de datos")