import os
import ast
import dash
import numpy as np
import pandas as pd
import geopy.distance
import plotly.graph_objects as go
#import dash_core_components as dcc
#import dash_html_components as html
from dash import dcc, html
from dash.dependencies import Input, Output
from flask import Flask

# Cargar los datos.
df = pd.read_csv("data/data.csv").drop_duplicates(subset='Nodo', keep='first')

# Crear la columna 'categoría' si no existe.
conditions = [
    df['Nodo'].str.endswith('L2100'),  # Condición para TAC.
    df['Nodo'].str.endswith(('U850', 'U1900')),  # Condición para LAC.
]
choices = ['TAC', 'LAC']
df['categoría'] = np.select(conditions, choices, default='No clasificado')

# Crear una aplicación Flask para integrarla con Dash.
server = Flask(__name__)
server.secret_key = '62334da7903ea889f0f2e1c87c0e8326'

# Crear la aplicación Dash integrada con Flask.
app = dash.Dash(__name__, server=server, routes_pathname_prefix='/dash/')
# Definir el layout de la aplicación Dash.
app.layout = html.Div(style={'width': '100vw', 'height': '100vh'}, children=[
    dcc.Input(
        id='node-input',
        type='text',
        placeholder='Buscar Nodo...',
        style={'width': '50%', 'margin': '10px auto'}
    ),
    dcc.Dropdown(
        id='category-dropdown',
        options=[
            {'label': 'TAC', 'value': 'TAC'},
            {'label': 'LAC', 'value': 'LAC'},
            {'label': 'Relación TAC-LAC', 'value': 'Relación TAC-LAC'}
        ],
        value='TAC',  # Valor predeterminado.
        style={'width': '50%', 'margin': '10px auto'}
    ),
    dcc.Graph(
        id='map',
        style={'width': '100%', 'height': 'calc(100vh - 50px)'}
    )
])

# Configurar los callbacks de Dash.
@app.callback(
    Output('map', 'figure'),
    [Input('category-dropdown', 'value'),
     Input('node-input', 'value')]
)
def update_map(selected_category, node_input):
    # Filtrar datos según la categoría seleccionada.
    filtered_df = df[df['categoría'] == selected_category] if selected_category else df

    # Filtro por nodo.
    if node_input:
        filtered_df = filtered_df[filtered_df['Nodo'].str.contains(node_input, case=False, na=False)]

    # Generar la figura del mapa.
    fig = go.Figure(go.Scattermapbox(
        lat=filtered_df['Latitud'],
        lon=filtered_df['Longitud'],
        mode='markers',
        marker=dict(size=10, color='blue', opacity=0.6),
        text=filtered_df['Nodo'],
        hoverinfo='text'
    ))

    # Configuración del layout del mapa.
    fig.update_layout(
        mapbox=dict(style='open-street-map', zoom=5, center=dict(lat=19.4326, lon=-99.1332)),
        margin=dict(l=0, r=0, t=0, b=0)
    )
    return fig