import folium
from config import Config

def crear_mapa(data, region=None, lac=None, tac=None):
    # Filtrar los datos por región, LAC y TAC si se proporcionan.
    if region:
        data = data[data['region'] == region]
    if lac:
        data = data[data['lac'] == int(lac)]
    if tac:
        data = data[data['tac'] == tac]

    # Crear el mapa centrado en México.
    mapa = folium.Map(location=Config.MAP_CENTER, zoom_start=Config.MAP_ZOOM_START)

    # Añadir marcadores para cada registro filtrado.
    for _, row in data.iterrows():
        folium.CircleMarker(
            location=[row['Latitud'], row['Longitud']],
            radius=5,
            color=row['Color tecnologia'],  # Usar el color proporcionado en los datos.
            fill=True,
            fill_color=row['Color tecnologia'],
            fill_opacity=0.6,
            popup=(f"Región: {row['region']}<br>"
                   f"Nodo: {row['nodo']}<br>"
                   f"LAC: {row['lac']}<br>"
                   f"TAC: {row['tac']}<br>"
                   f"Estado: {row['estado por sector']}<br>"
                   f"Descripción: {row['Descripcion']}"),
        ).add_to(mapa)

    # Guardar el mapa como HTML.
    mapa_path = 'templates/mapa.html'
    mapa.save(mapa_path)
    print(f"Mapa guardado en {mapa_path} con {len(data)} puntos.")



