function Cerrar_Modal(Objeto){
    $(Objeto).click(function(){
        $("#Form_Agregar").toggleClass("is-active");
        $("body").toggleClass("is-clipped");
    })
}

$(document).ready(function(){
    $("#Agregar").click(function(){
        $("#Form_Agregar").toggleClass("is-active");
        $("body").toggleClass("is-clipped");  
    })
    Cerrar_Modal("#Cancelar_Nuevo_Usuario");
    Cerrar_Modal(".modal-background");
    Cerrar_Modal(".delete");
    $("#Agregar_Nuevo_Usuario").click(function(){
        alert("Funcion aun no disponible");
    })
})