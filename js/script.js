let selectedProduct = document.getElementById("select-producto");
console.log(selectedProduct);

function confirmStockUpdate() {
    //Ingresamos un mensaje a mostrar
    var mensaje = confirm("¿Desea restaurar el stock del producto?");
    //Detectamos si el usuario acepto el mensaje
    if (mensaje) {
        alert("¡Gracias por aceptar!");
    }
    //Detectamos si el usuario denegó el mensaje
    else {
    alert("¡Haz denegado el mensaje!");
    }
    }