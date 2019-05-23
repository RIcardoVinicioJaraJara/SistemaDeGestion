function cambiar(opc) {
    switch (opc) {
        case '1':
            var element = document.getElementById('1');
            element.style.display = 'none';
            var element1 = document.getElementById('2');
            element1.style.display = 'block';
            var element2 = document.getElementById('3');
            element2.style.display = 'none';
            break;
        case '2':
            var element = document.getElementById('1');
            element.style.display = 'none';
            var element1 = document.getElementById('3');
            element1.style.display = 'block';
            var element2 = document.getElementById('2');
            element2.style.display = 'none';
            break;

        case '3':
            var element = document.getElementById('2');
            element.style.display = 'none';
            var element1 = document.getElementById('1');
            element1.style.display = 'block';
            var element2 = document.getElementById('3');
            element2.style.display = 'none';
        default:
            break;
    }
}


function correo(cod) {
    var des = document.getElementById('destinatario').value;
    var emisor = document.getElementById('emisor').value;;
    var asunto = document.getElementById('asunto').value;
    var mensaje = document.getElementById('mensaje').value;
    var asunto = document.getElementById('asunto').value;
    location.href = "../../../admin/controladores/usuario/crearCorreo.php?emisor=" +
        emisor + "&destinatario=" + des + "&asunto=" + asunto + "&mensaje=" + mensaje + "&cod=" + cod;
}
