//Abre ventana mostrando las insrucciones, es llamada en index.php
function instrucciones(){
    window.open("vista/Instrucciones.php", "ventana1", "width=360,height=650,scrollbars=YES");
}

// *****************************************************************************************

//Función llamada desde intentos.php
function limpiar(){
    var A= document.getElementById("Numero_us");
    var B= document.getElementById("Mostrar_evaluar");
    var C= document.getElementById("Contendor_6");
    A.value = '';
    B.style.display = "block";
    C.style.display = "none";   
	document.getElementById('Numero_us').focus();
}

// *****************************************************************************************

//Valida que el usuario haya insertado un numero de cuatro digitos,Función llamada desde intentos.php
function ValidaNumero(){
    campo = event.target;
    var emailRegex = /^([0-9])*$/;

    var Codigo = document.getElementById("Numero_us");
    if(Codigo.value =="" || Codigo.value.indexOf(" ") == 0 || Codigo.value.length > 4 || isNaN(Codigo.value)){
        alert ("Introduzca una Codigo de cuatro digitos numericos");
        document.getElementById("Codigo").value = "";
        document.getElementById("Codigo").focus();
        return false;
    }
    // else{
    //     if(emailRegex.test(campo.value)){      
    //        return true;
    //     } 
    //     else{
    //         alert("Indique número de cuatro digitos");      
    //         document.getElementById("Codigo").value = "";
    //         document.getElementById("Codigo").focus();
    //         return false;
    //     }
    // }
}

//************************************************************************************************

//Impide que se sigan introduciendo caracteres al alcanzar el limite maximo, llamada desde index.php 
var contenido_textarea = "";    
function valida_Longitud_1(){  
    var num_caracteres_permitidos = 100;

    //se averigua la cantidad de caracteres escritos
    num_caracteres = document.forms[0].comentario.value.length; 

    if(num_caracteres > num_caracteres_permitidos){ 
        document.forms[0].comentario.value = contenido_textarea; 
    }
    else{ 
        contenido_textarea = document.forms[0].comentario.value; 
    } 
} 

//************************************************************************************************
//Impide que se inserte un correo invalido invocada desde registro.php
function validarFormatoCorreo(){ 
    campo = event.target;
    var emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
      
    if(document.getElementById("Correo").style.backgroundColor == "red"){
      document.getElementById("Correo").value = "";        
      document.getElementById("Correo").style.backgroundColor = "white";
      document.getElementById("Correo").focus();
    }
    else{
      if(emailRegex.test(campo.value)){      
         return true;
      } 
      else{
          alert("Correo no aceptado");      
          document.getElementById("Correo").style.backgroundColor="red"; 
          document.getElementById("Correo").value = "";
      }
    }  
}

//---------------------------------------------------------------------------------------------
//Coloca el campo correo en colr white invocada desde registro.php
function ColorearCorreo(){
    document.getElementById("Correo").style.backgroundColor="white";
}

// *************************************************************************************************
// Abre ventana modal de registro de usuario en registro.php

function MostrarRegistro(){
    var A = document.getElementById("Contenedor_17").style.display = "block"; 
    // alert("hola");
}

// *************************************************************************************************
//Coloca el foco en principal.php

function autofocusInicioSesion(){
    document.getElementById('Correo').focus();
}

// *************************************************************************************************
//Coloca el foco en index.php

function autofocusNumero(){
    document.getElementById('Numero_us').focus();
}