<?php
session_start();

// Configuración de la base de datos localmente
// $servername = "localhost"; 
// $username_db = "root"; 
// $password_db = ""; 
// $dbname = "yotoss"; 
// $port = 3306; 

// Configuración de la base de datos
$servername = "db5016516212.hosting-data.io"; 
$username_db = "dbu3642945"; 
$password_db = "Y0t0SSA&f31415bd"; 
$dbname = "dbs13406378"; // Nombre de tu base de datos en el hosting
$port = 3306; 

// Crear conexión
$conn = new mysqli($servername, $username_db, $password_db, $dbname, $port);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$error_message = ""; // Variable para almacenar el mensaje de error

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener y limpiar los datos del formulario
    $username = $conn->real_escape_string(trim($_POST['username']));
    $password = trim($_POST['password']);

    // Preparar la consulta SQL para evitar inyecciones SQL
    $sql = "SELECT password FROM usuarios WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    // Verificar si el usuario existe
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($hashed_password);
        $stmt->fetch();

        // Verificar la contraseña
        if (password_verify($password, $hashed_password)) {
            // Iniciar sesión
            $_SESSION['username'] = $username;
            header("Location: ../../menu.php"); // Redirigir a menu.html
            exit();
        } else {
            // Si la contraseña es incorrecta
            $error_message = "Usuario o contraseña incorrectos.";
        }
    } else {
        // Si el usuario no existe
        $error_message = "Usuario o contraseña incorrectos.";
    }

    // Redirigir a ylogin.html con el mensaje de error si ocurre un error
    if (!empty($error_message)) {
        header("Location: ../../login.php?error=" . urlencode($error_message));
        exit();
    }

    // Cerrar la consulta
    $stmt->close();
    $conn->close();
}
?>