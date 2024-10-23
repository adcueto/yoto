import dash
import pandas as pd
import plotly.graph_objects as go
from dash import dcc, html
from dash.dependencies import Input, Output
import numpy as np
import ast
import geopy.distance
import time

# Función para seleccionar un porcentaje de los datos
def select_data_percentage(df, percentage):
    if percentage < 0 or percentage > 100:
        raise ValueError("El porcentaje debe estar en el rango [0, 100]")
    num_rows = int(len(df) * (percentage / 100))
    sampled_df = df.head(num_rows)
    return sampled_df

# Función para crear la aplicación Dash para SMR.
def create_smr_app(server, prefix='/smr/'):
    df_smr = pd.read_csv('data/smr.csv').drop_duplicates(subset='Nodo', keep='first')
    df_smr = select_data_percentage(df_smr, 10)
    df_smr['categoría'] = np.select(
        [df_smr['Nodo'].str.endswith('L2100'), df_smr['Nodo'].str.endswith(('U850', 'U1900'))],
        ['TAC', 'LAC'],
        default='No clasificado'
    )

    smr_app = dash.Dash(__name__, server=server, routes_pathname_prefix=prefix)
    smr_app.layout = html.Div(style={'width': '100vw', 'height': '100vh'}, children=[
        dcc.Input(id='node-input', type='text', placeholder='Buscar Nodo...', style={'width': '50%', 'margin': '10px auto'}),
        dcc.Dropdown(
            id='category-dropdown',
            options=[{'label': 'TAC', 'value': 'TAC'}, {'label': 'LAC', 'value': 'LAC'}, {'label': 'Relación TAC-LAC', 'value': 'Relación TAC-LAC'}],
            value='TAC',
            style={'width': '50%', 'margin': '10px auto'}
        ),
        dcc.Graph(id='smr-map', style={'width': '100%', 'height': 'calc(100vh - 50px)'})
    ])

    @smr_app.callback(
        Output('smr-map', 'figure'),
        
        [Input('category-dropdown', 'value'), Input('node-input', 'value')]
    )
    def update_smr_map(selected_category, node_input):
        # Filtrar datos basados en la categoría seleccionada.
        filtered_df = df_smr[df_smr['categoría'] == selected_category] if selected_category != 'Relación TAC-LAC' else df_smr[df_smr['categoría'] == 'TAC']

        # Ajustar centro del mapa si hay un nodo buscado.
        if node_input:
            searched_node = filtered_df[filtered_df['Nodo'] == str(node_input)]
            center_lat = searched_node['Latitud'].mean() if not searched_node.empty else filtered_df['Latitud'].mean()
            center_lon = searched_node['Longitud'].mean() if not searched_node.empty else filtered_df['Longitud'].mean()
            zoom = 15 if not searched_node.empty else 4.8
        else:
            center_lat = filtered_df['Latitud'].mean()
            center_lon = filtered_df['Longitud'].mean()
            zoom = 4.8

        fig = go.Figure(go.Scattermapbox(
            lat=filtered_df['Latitud'],
            lon=filtered_df['Longitud'],
            mode='markers',
            marker=dict(size=7, color='blue', opacity=0.8),
            text=filtered_df['Nodo'],
            hoverinfo='text'
        ))

        fig.update_layout(mapbox=dict(style='open-street-map', zoom=5, center=dict(lat=19.4326, lon=-99.1332)),
                          margin=dict(l=0, r=0, t=0, b=0))
        return fig

    return smr_app

# Función para crear la aplicación Dash para SDR.
def create_sdr_app(server, prefix='/sdr/'):
    df_sdr = pd.read_csv('data/sdr.csv').dropna()
    df_sdr = select_data_percentage(df_sdr, 100)

    sdr_app = dash.Dash(__name__, server=server, routes_pathname_prefix=prefix)
    start_time = time.time()
    options = [{'label': site, 'value': site} for site in np.unique(df_sdr['Region'])]
    options.insert(0, {'label': 'ALL REGIONS', 'value': 'ALL REGIONS'})

    sdr_app.layout = html.Div(style={'width': '100vw', 'height': '100vh', 'display': 'flex', 'flexDirection': 'column'}, children=[
        html.Div(style={'display': 'flex', 'flexDirection': 'row'}, children=[
            dcc.Dropdown(id='region-dropdown', options=options, value='ALL REGIONS', style={'width': '33%'}),
            dcc.Dropdown(id='sub-region-dropdown', options=[], value=None, disabled=True, style={'width': '33%'}),
            dcc.Input(id='Fecha', value='2023-02-19', type='text', style={'width': '33%', 'textAlign': 'center'}),
        ]),
        html.Div(style={'display': 'flex', 'flexDirection': 'row', 'margin': '1%'}, children=[
            dcc.Graph(id='sdr-map', style={'width': '75%', 'height': 'calc(100vh - 12%)'}),
            html.Div(id='data-display', style={'maxHeight': '200px', 'overflowY': 'auto'})
        ]),
        dcc.Interval(id='intervalo-cronometro', interval=1000, n_intervals=0)
    ])

    @sdr_app.callback(
        [Output('sdr-map', 'figure'), Output('sub-region-dropdown', 'options'), Output('sub-region-dropdown', 'disabled')],
        [Input('region-dropdown', 'value'), Input('sub-region-dropdown', 'value')]
    )
    def update_sdr_map(selected_region, selected_sub_region):
        filtered_df = df_sdr[df_sdr['Region'] == selected_region] if selected_region != 'ALL REGIONS' else df_sdr
        center_lat = filtered_df['Latitude'].mean()
        center_lon = filtered_df['Longitude'].mean()
        zoom = 5 if selected_region != 'ALL REGIONS' else 4.5

        fig = go.Figure(go.Scattermapbox(
            lat=filtered_df['Latitude'],
            lon=filtered_df['Longitude'],
            mode='markers',
            marker=dict(size=7, color='green', opacity=0.8),
            text=filtered_df['Region'],
            hoverinfo='text'
        ))

        fig.update_layout(mapbox=dict(style='open-street-map', zoom=zoom, center=dict(lat=center_lat, lon=center_lon)),
                          margin=dict(l=0, r=0, t=0, b=0), height=850)
        options_sub_regions = [{'label': sub_region, 'value': sub_region} for sub_region in filtered_df['Grupo OyM'].unique()]
        disabled = selected_region == 'ALL REGIONS'
        return fig, options_sub_regions, disabled

    return sdr_app



