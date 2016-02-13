   function valida_envia(){ 
        var va1 = document.getElementById("nombre").value;
        var val2 = document.getElementById("apellido").value;
        var val3 = document.getElementById("telefono").value;
        var ercorreo=/^[^@\s]+@[^@\.\s]+(\.[^@\.\s]+)+$/; 
        var val4 = document.getElementById("Ciudades").selectedIndex;
        var elemento = document.getElementById("texto");
        var suma = 0;
        var los_cboxes = document.getElementsByName('cap[]'); 
        if(  va1== null || va1.length == 0 || /^\s+$/.test(va1) ) {
        alert("Debe llenar el campo Nombre")
        document.fvalida.nombre.focus() 
        return false;
        }
        if(  val2== null || val2.length == 0 || /^\s+$/.test(val2) ) {
        alert("Debe llenar el campo Apellido")
        document.fvalida.apellido.focus() 
        return false;
        }
        if(  val3== null || val3.length == 0 || /^\s+$/.test(val3) ) {
        alert("Debe llenar el campo Teléfono")
        document.fvalida.telefono.focus() 
        return false;
        }  
        if (!(ercorreo.test(fvalida.email.value))) {
        alert('El campo email no es un correo electrónico válido.');
        document.fvalida.email.focus()
        return false; 
        }
        if( val4 == null || val4 == 0 ) {
        alert("Debe seleccionar al menos una Ciudad")
        return false;
        }
        for (var i = 0, j = los_cboxes.length; i < j; i++) {
    
          if(los_cboxes[i].checked == true){
            suma++;
          }
        }
        if(suma == 0 || suma < 2){
         alert('Debe seleccionar al menos dos pasatiempos');
          return false;
       }
        if(elemento.value.length==0 ) {
          alert("El campo observacion no puede estar en blanco");
          document.fvalida.texto.focus()
          return false;
        }
      alert("Gracias por llenar el Formulario"); 
      document.fvalida.submit(); 
  }
  function sololetras(){
    if (event.keyCode >45 && event.keyCode  <58) event.returnValue = false;
  }
  function solonumeros(){
    if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;
  }
  function limita(maximoCaracteres) {
  var elemento = document.getElementById("texto");
  if(elemento.value.length >= maximoCaracteres ) {
    return false;
  }
  else {
    return true;
  }
}