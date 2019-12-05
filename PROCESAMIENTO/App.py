
from classes.conexionDB import ConexionDB
from classes.CsvScanner import CsvScanner

if __name__ == "__main__":
    #Classes
    scanner = CsvScanner()
    database = ConexionDB()
    #Initial functions
    database.limpiar_tablas_postgres()
    database.crear_tablas_postgres()