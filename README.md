# YOTO - Plataforma Integradora

YOTO es una plataforma integradora diseñada para la monitorización, auditoría y análisis del rendimiento de la red. La aplicación combina una interfaz de usuario amigable con la visualización de datos geoespaciales a través de mapas interactivos y dashboards que permiten un monitoreo detallado del estado de la red.

## Características

- **Inicio de Sesión**: Acceso seguro a través de una página de login.
- **Menú de Selección de Sistemas**: Después de iniciar sesión, el usuario puede elegir entre diferentes sistemas, como:
  - Sistema de Monitoreo de la Red
  - Sistema de Desempeño de la Red
  - Sistema Estadístico de la Red
  - Sistema Auditor de la Red
- **Dashboard Interactivo**: Visualización de datos en tiempo real usando gráficos y mapas interactivos.
- **Integración de Flask y Dash**: Combinación de Flask para la gestión de rutas y autenticación, y Dash para la visualización de gráficos interactivos.


## Tecnologías Utilizadas

- **Backend**: Flask (Python)
- **Frontend**: HTML, CSS, JavaScript
- **Visualización de Datos**: Dash, Plotly
- **Manejo de Datos**: Pandas, NumPy
- **Mapas**: Geopy y Plotly para visualización geoespacial
- **Autenticación**: Mecanismos de login y manejo de sesiones con Flask.

## Instalación y Configuración

### Prerrequisitos

- Python 3.8 o superior.
- pip (gestor de paquetes de Python).
- Git (para clonar el repositorio).

### Instrucciones de Instalación

1. Clona el repositorio:
   ```bash
   git clone https://github.com/adcueto/yoto.git
   cd yoto

2. Crea y activa un entorno virtual:

python -m venv venv
source venv/bin/activate  # En Windows: venv\Scripts\activate

3. Instala las dependencias:
pip install -r requirements.txt

4. Configura el archivo config.py con la secret_key y cualquier otro parámetro necesario:
SECRET_KEY = 'tu_clave_secreta'

5. Asegúrate de tener los datos en data/data.csv.

6. Ejecuta la aplicación:
python app.py

7. Abre tu navegador y visita:
http://127.0.0.1:5000

## Uso
Inicio de Sesión: Ingresa tus credenciales para acceder a la plataforma.
Menú de Sistemas: Selecciona el sistema que deseas explorar.
Dashboard de Monitoreo: Visualiza el estado de la red a través de gráficos y mapas interactivos.
Próximamente: Funcionalidades adicionales para los sistemas de Desempeño, Estadístico y Auditor.

## Contribución

¡Las contribuciones son bienvenidas! Si deseas mejorar el proyecto, sigue estos pasos:

Haz un fork del proyecto.

2. Crea una nueva rama:
    git checkout -b feature/nueva-funcionalidad
3. Realiza tus cambios y haz un commit:
    git commit -m "Agrega nueva funcionalidad"
4. Haz push a la rama
   git push origin feature/nueva-funcionalidad
5. Abre un Pull Request.

## Licencia
Este proyecto está bajo la licencia MIT. Consulta el archivo LICENSE para más información.

## Autor
Desarrollado por adcueto.