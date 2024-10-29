function filtrar_datos()
{
    document.getElementById('tipo').value = document.getElementById('tipo_dato').value
    document.getElementById('dato').value = document.getElementById('buscar').value;
    document.getElementById('filtrar').submit();
}

function recargar_pagina(pagina)
{
    window.location.href = pagina;
}