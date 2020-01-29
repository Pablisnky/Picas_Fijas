var http_request = false;
var peticion= conexionAJAX();

function conexionAJAX(){
    http_request = false;
    if(window.XMLHttpRequest){ // Mozilla, Safari,...
        http_request = new XMLHttpRequest();
        if (http_request.overrideMimeType){
            http_request.overrideMimeType('text/xml');
        }
    } 
    else if(window.ActiveXObject){ // IE
        try{
            http_request = new ActiveXObject("Msxml2.XMLHTTP");
        } 
        catch (e){
            try{
                http_request = new ActiveXObject("Microsoft.XMLHTTP");
            } 
            catch (e) {}
        }
    }
    if(!http_request){
        alert('No es posible crear una instancia XMLHTTP');
        return false;
    }
    // else{
    // alert("Instancia creada exitosamente ok");
    // }
    return http_request;
} 

//-----------------------------------------------------------------------------------------------
//-----------------------------------------------------------------------------------------------

function llamar_evaluar(){//Es llamada desde index.php
    A=document.getElementById("Numero_us").value;//se inserta el numero que indicó el usuario desde index.php
    var url="controlador/recibe_Index.php?val_1=" + A;
    http_request.open('GET',url,true);     
    peticion.onreadystatechange = respuesta_llamar_evaluar;
    peticion.setRequestHeader("content-type","application/x-www-form-urlencoded");
    peticion.send("null");
}                                                           
function respuesta_llamar_evaluar(){
    if (peticion.readyState == 4){
        if (peticion.status == 200){
            document.getElementById('Mostrar_evaluar').innerHTML=peticion.responseText;
        } 
        else{
            alert('Hubo problemas con la petición.');
        }
    }
    //Se cambia el numero en el boton de los intentos
    setTimeout(llamar_cambiarNum,10);
}

// **************************************************************************************************
// llamada desde index.php

function llamar_cambiarNum(){
    A= "SoloRequisito";//se inserta el numero que indicó el usuario desde index.php
    var url="controlador/intentos.php?val_1=" + A;
    http_request.open('GET',url,true);     
    peticion.onreadystatechange = respuesta_llamar_cambiarNum;
    peticion.setRequestHeader("content-type","application/x-www-form-urlencoded");
    peticion.send("null");
}                                                           
function respuesta_llamar_cambiarNum(){
    if (peticion.readyState == 4){
        if (peticion.status == 200){
            document.getElementById('Mostrar_boton').innerHTML=peticion.responseText;
        } 
        else{
            alert('Hubo problemas con la petición.');
        }
    }
}

// **************************************************************************************************
//llamada desde registro.php

function llamar_verificaCorreo(){
    A=document.getElementById("Correo").value;//se inserta el ID_Especialidad desde Citas.php
    var url="../controlador/VerificarCorreo.php?val_1=" + A;
    http_request.open('GET',url,true);     
    peticion.onreadystatechange = respuesta_verificaCorreo;
    peticion.setRequestHeader("content-type","application/x-www-form-urlencoded");
    peticion.send("null");
}                                                           
function respuesta_verificaCorreo(){
    if (peticion.readyState == 4){
        if (peticion.status == 200){
           document.getElementById('Mostrar_verificaCorreo').innerHTML=peticion.responseText;//se recoje el numero de pacientes
        } 
        else{
            alert('Hubo problemas con la petición');
        }
    }
}

