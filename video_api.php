<?php
header('Content-Type: application/json');

// Función para generar un token único
function generateAccessToken() {
    return bin2hex(random_bytes(16)); // Genera un token hexadecimal de 32 caracteres (16 bytes)
}

// Función para validar el token de acceso
function validateAccessToken($token) {
    // Aquí podrías implementar una lógica más avanzada de validación según tus necesidades
    return $token === $_COOKIE['access_token']; // Aquí se compara con un token almacenado en una cookie
}

// Función para configurar los encabezados CORS
function setCorsHeaders() {
    header("Access-Control-Allow-Origin: *"); // Cambia * por el dominio específico si es necesario
    header("Access-Control-Allow-Methods: GET, OPTIONS");
    header("Access-Control-Allow-Headers: Authorization");
}

// Si la solicitud es de tipo OPTIONS, devuelve los encabezados CORS y termina el script
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    setCorsHeaders();
    http_response_code(200);
    exit();
}

// Si no hay un token de acceso válido, devuelve un error de autorización
if (!validateAccessToken($_GET['token'])) {
    setCorsHeaders();
    http_response_code(403);
    echo json_encode(['error' => 'Unauthorized']);
    exit();
}

// Si la solicitud es válida, devuelve la URL del video
setCorsHeaders();
echo json_encode(['url' => 'https://z8dpsptc.sw-cdnstreamwish.com/hls2/01/03974/8zen94yqm5jy_,n,h,.urlset/master.m3u8?t=YUVOeVtZ1W9vvAxeciKW2GH9l_ASSC8juwRlJR-wX3U&s=1719126381&e=129600&f=20565819&srv=xhisossxof6ziadr&i=0.4&sp=500&p1=xhisossxof6ziadr&p2=xhisossxof6ziadr&asn=28024']);
?>
