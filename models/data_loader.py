import pandas as pd

def cargar_datos(path):
    data = pd.read_csv(path)
    data.columns = data.columns.str.strip()  # Limpia espacios al inicio y al final.
    print(data[['Latitud', 'Longitud']].head())  # Muestra las primeras filas de Latitud y Longitud.
    return data

