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
    if (document.getElementById('cores').value == 'CORREO CORRECTO') {
        var des = document.getElementById('destinatario').value;
        var emisor = document.getElementById('emisor').value;
        var asunto = document.getElementById('asunto').value;
        var mensaje = document.getElementById('mensaje').value;
        var asunto = document.getElementById('asunto').value;
        location.href = "../../../admin/controladores/usuario/crearCorreo.php?emisor=" +
            emisor + "&destinatario=" + des + "&asunto=" + asunto + "&mensaje=" + mensaje + "&cod=" + cod;
    } else {
        alert(document.getElementById('cores').value)
    }

}

function buscarCorreo() {
    var correo = document.getElementById("destinatario").value;
    if (correo == "") {
        document.getElementById("informacion").innerHTML = "";
    } else {
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("informacion").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "js/buscar.php?correo=" + correo, true);
        xmlhttp.send();
    }
    return false;
}
