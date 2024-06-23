<?php
header('Content-Type: application/json');

function authenticateRequest() {
    // Aquí puedes agregar una verificación más avanzada, como un token JWT.
    // En este ejemplo, simplemente comprobaremos si hay un token de autorización en el header.
    $headers = apache_request_headers();
    return isset($headers['Authorization']) && $headers['Authorization'] === 'Bearer yoshiro123';
}

if (authenticateRequest()) {
    // Si la solicitud es válida, devuelve la URL del video.
    echo json_encode(['url' => 'https://z8dpsptc.sw-cdnstreamwish.com/hls2/01/03974/8zen94yqm5jy_,n,h,.urlset/master.m3u8?t=YUVOeVtZ1W9vvAxeciKW2GH9l_ASSC8juwRlJR-wX3U&s=1719126381&e=129600&f=20565819&srv=xhisossxof6ziadr&i=0.4&sp=500&p1=xhisossxof6ziadr&p2=xhisossxof6ziadr&asn=28024']);
} else {
    // Si no, devuelve un error de autorización.
    http_response_code(403);
    echo json_encode(['error' => 'Unauthorized']);
}
?>
