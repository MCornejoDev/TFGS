window.addEventListener("keypress", function(event){
  if (event.keyCode == 13){
      event.preventDefault();
  }
}, false);
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the crurrent tab
var valid = true
function showTab(n) {
  // This function will display the specified tab of the form...
  
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
   document.getElementById("nextBtn").style.display = "none";
   document.getElementById("divCrear").removeAttribute("quitar");
   document.getElementById('divCrear').setAttribute('class',"poner");
    /*<div class="form-group" style="width:200px !important; margin:auto !important;padding-bottom: 15px;" >
        <button class="btn btn-primary btn-block" id="crearV" type="submit">Crear personaje</button>
    </div*/
   
  } else {
    
    document.getElementById("nextBtn").innerHTML = "Siguiente";
    document.getElementById("nextBtn").style.display = "block";
    document.getElementById("divCrear").removeAttribute("poner");
    document.getElementById('divCrear').setAttribute('class',"quitar");
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...
  if (currentTab >= x.length) {
    // ... the form gets submitted:
    alert("hello");
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  var escudo = document.getElementById('escudo');
  // This function deals with validation of the form fields
  var tab, inputs, i;
  tab = document.getElementsByClassName("tab");
  inputs = tab[currentTab].getElementsByTagName("input");

  //Bucle especial para darle las clases especificas a los inputs
  // con id peso y sexo
  for (let index = 0; index < inputs.length; index++) {
    if(inputs[index].id == 'peso')
    {
      inputs[index].removeAttribute('class'," invalid");
      inputs[index].setAttribute("class","hijos hijosv2");
    }
    else
    {
      if(inputs[index].id != 'sexo')
      {
        inputs[index].removeAttribute('class'," invalid");
        inputs[index].setAttribute("class","hijos");
      }
    }
  }
  
  //Recorremos con un bucle el array 
  //de nombres de partida que el usuario tiene.
  var inputNickPartida = document.getElementById('nickPartida');
  var existeNick = false;
  for (let index = 0; index < arrayNombres.length; index++) {
      if(arrayNombres[index]['nickPartida'] == inputNickPartida.value)
      {
        existeNick = true;
        document.getElementById('nickPartida').setAttribute('class',inputNickPartida.className + " invalid");
      }
  }

  //#region //Comprobación de los selected
  var selected = document.getElementsByTagName("select");
  
  if(currentTab == 0)
  {
    if(selected[0].value == "")
    {
      valid = false;
      selected[0].style = "padding:5px !important; background:#ffdddd !important;";
    }
    else
    {
      valid = true;
      selected[0].style = "padding:5px !important;";
    }
  }

  if(currentTab == 1)
  {
    if(selected[1].value == "")
    {
      valid = false;
      selected[1].style = "padding:5px !important; background:#ffdddd !important;";
    }
    else
    {
      selected[1].style = "padding:5px !important;";
      selected[2].style = "padding:5px !important; background:#ffdddd !important;";
      if(selected[2].value == "")
      {
        valid = false;
        selected[2].style = "padding:5px !important; background:#ffdddd !important;";
      }
      else
      {
        valid = true;
        selected[2].style = "padding:5px !important;";
      }
    }
  }
  //#endregion

  //#region RadioButton
  var sexo = document.getElementsByName('sexo');
  var lsexo = document.getElementById('lsexo');

  
  if(sexo[0].checked == false || sexo[1].checked == false)
  {
    lsexo.innerText = "Seleccione un sexo";
    valid = false;
  }
  else
  {
    lsexo.innerText = "Sexo seleccionado";
    valid = true;
  }
  
  //#endregion

  //#region  // A loop that checks every input field in the current tab: // Un bucle que chequea los campos inputs en el actual formulario
  for (i = 0; i < inputs.length; i++) {
    
    if(inputs[i].id == 'escudo'){
      if(escudo.disabled == false)
      {
        if(escudo.value == "")
        {
          valid = false;
          escudo.removeAttribute('class'," hijos");
          escudo.setAttribute("class"," invalid");
        }
      }
      else
      {
        if(escudo.value == "")
        {
          valid = true;
          escudo.removeAttribute('class'," invalid");
          escudo.setAttribute("class","hijos");
        }
      }
    }
    else
    {
      if (inputs[i].value == "") 
      {
        // add an "invalid" class to the field:
        // Añadimos una clase invalid al campo designado
        inputs[i].setAttribute('class',inputs[i].className + " invalid");
        // and set the current valid status to false
        // y colocamos al actual estado de la variable valid a falso
        valid = false;
      }
      else{
        //Comprobación del nick de partida que no esté vacío y el estilo de su label
        if(nickPartida.value != "")
        {
          if(existeNick == true)
          {
            valid = false;
            document.getElementById('lnick').innerText = "Nick de partida ya existente";
          }
          else
          {
            valid = true;
            document.getElementById('lnick').innerText = "Nick de partida disponible";
          }
        }
        else
        {
          valid = false;
            document.getElementById('lnick').innerText = "Escribe un nick de partida";
        }
      }
    }  
  }
  //#endregion

  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
 
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}

function annadirArmas(clase){
  var escudo = document.getElementById('escudo');
  escudo.disabled = true;
  escudo.setAttribute('value','');
  var select = document.getElementById('selectArma');
  if(select.hasChildNodes())
  {
    while(select.childNodes.length != 1)
    {
      select.removeChild(select.lastChild);
    }
  }

  select.disabled = false;
  //Array de armas para Clérigo,Hechicero,Mago,Monje,Druida
  var arrayArmas = ['Baston','Cetro','Varita'];

  //Array de armas para Barbaro,Guerrero,Paladín
  var arrayArmasB = ['Espada','Hacha','Mandoble','Maza','Pico','Espadas Dobles'];

  //Array de armas para el Explorador,Bardo
  var arrayArmasC = ['Arco','Ballesta'];

  //Array de armas para el Pícaro
  var arrayArmasD = ['Puñales','Cuchillos'];

  var option = document.createElement('option');
  var textOption = document.createTextNode('--Elija un arma--');
  option.appendChild(textOption);
  option.setAttribute('value',"");
  option.selected = 'selected';
  option.disabled = true;
  select.appendChild(option);
  
  if(clase == 'Clérigo' || clase == 'Hechicero' || clase == 'Mago' || clase == 'Monje' || clase == 'Druida')
  {
    for (let index = 0; index < arrayArmas.length; index++) {
      option = document.createElement('option');
      textOption = document.createTextNode(arrayArmas[index]);
      option.appendChild(textOption);
      option.setAttribute('value',arrayArmas[index]);
      select.appendChild(option);
    }
  }
  else
  {
    if(clase == 'Barbaro' || clase == 'Guerrero' || clase == 'Paladín')
    {
      for (let index = 0; index < arrayArmasB.length; index++) {
        var option = document.createElement('option');
        var textOption = document.createTextNode(arrayArmasB[index]);
        option.appendChild(textOption);
        option.setAttribute('value',arrayArmasB[index]);
        select.appendChild(option);
      }
    }
    else
    {
      if(clase == 'Explorador' || clase == 'Bardo')
      {
        for (let index = 0; index < arrayArmasC.length; index++) {
          var option = document.createElement('option');
          var textOption = document.createTextNode(arrayArmasC[index]);
          option.appendChild(textOption);
          option.setAttribute('value',arrayArmasC[index]);
          select.appendChild(option);
        }
      }
      else
      {
        if(clase == 'Pícaro')
        {
          for (let index = 0; index < arrayArmasD.length; index++) {
            var option = document.createElement('option');
            var textOption = document.createTextNode(arrayArmasD[index]);
            option.appendChild(textOption);
            option.setAttribute('value',arrayArmasD[index]);
            select.appendChild(option);
          }
        }
      }
    }
  }
}

function habilitarEscudo(arma)
{
  //Armas que no pueden usar el escudo :Mandoble,Hacha,Arco,Ballesta,Cuchillos,Baston,Pico,Puñales.
  var escudo = document.getElementById('escudo');
  escudo.disabled = true;
  if(arma == 'Espada' || arma == 'Cetro' || arma == 'Varita') 
  {
      escudo.disabled = false;
  }
  else{
    escudo.disabled = true;
  }
}

function tipoArmadura(clase)
{
  var documentoDondeAnnadir = document.getElementById('armadura');
 
  if(documentoDondeAnnadir.hasChildNodes())
  {
    while(documentoDondeAnnadir.childNodes.length != 0)
    {
      documentoDondeAnnadir.removeChild(documentoDondeAnnadir.firstChild);
    }
  }
  var input = document.createElement('input');
  input.setAttribute('type','hidden');
  if(clase == 'Guerrero' || clase == 'Barbaro' || clase == 'Paladín')
  {
  //Guerrero,Barbaro,Paladin ->Armadura de malla pesada
  input.setAttribute('name','armadura');
  input.setAttribute('value','Armadura de malla pesada');
  
  }
  else{
    if(clase == 'Explorador' || clase == 'Bardo' || clase == 'Pícaro'){
      //Explorador,Bardo,Pícaro -> Cuero Medio o Pesado
      input.setAttribute('name','armadura');
      input.setAttribute('value','Cuero medio o pesado');
  
    }
    else
    {
      if(clase == 'Clérigo' || clase == 'Druida' || clase == 'Mago' || clase == 'Hechicero' || clase == 'Monje')
      {
        //Clérigo,Druida,Mago,Hechicero,Monje -> Armadura de Tela
        input.setAttribute('name','armadura');
        input.setAttribute('value','Armadura de tela');
      }
    }
  }

  documentoDondeAnnadir.appendChild(input);
}
