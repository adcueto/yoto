from flask import Flask, render_template, redirect, url_for, session, request, flash
from dash_app import app  # Importar la aplicación Dash.

# La aplicación Flask ya está definida en dash_app.py, así que usamos la misma.
server = app.server

# Establecer la clave secreta para manejar las sesiones de forma segura.
server.secret_key = '62334da7903ea889f0f2e1c87c0e8326'

# Usuario y contraseña de prueba.
USERNAME = 'admin'
PASSWORD = 'password123'

@server.route('/')
def home():
    return render_template('home.html')

@server.route('/about')
def about():
    return render_template('about.html')

@server.route('/services')
def services():
    return render_template('services.html')

@server.route('/contact')
def contact():
    return render_template('contact.html')

@server.route('/login', methods=['GET', 'POST'])
def login():
    if request.method == 'POST':
        username = request.form['username']
        password = request.form['password']

        # Verificar las credenciales.
        if username == USERNAME and password == PASSWORD:
            session['logged_in'] = True
            flash('Inicio de sesión exitoso', 'success')
            return redirect(url_for('menu'))
        else:
            flash('Usuario o contraseña incorrectos', 'danger')
            return redirect(url_for('login'))

    return render_template('login.html')

@server.route('/logout')
def logout():
    session.pop('logged_in', None)
    flash('Sesión cerrada', 'success')
    return redirect(url_for('login'))

@server.route('/menu')
def menu():
    if not session.get('logged_in'):
        flash('Por favor, inicie sesión primero.', 'danger')
        return redirect(url_for('login'))
    return render_template('menu.html')

@server.route('/dashboard')
def dashboard():
    if not session.get('logged_in'):
        flash('Por favor, inicie sesión primero.', 'danger')
        return redirect(url_for('login'))
    return render_template('dashboard.html')

if __name__ == '__main__':
    server.run(host='0.0.0.0', port=5000, debug=True)






