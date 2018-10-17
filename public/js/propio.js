
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the crurrent tab

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
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...ç
    if (escudo.value == "")
    {
      valid = true;
    }
    else{
      if (y[i].value == "") {
        // add an "invalid" class to the field:
        y[i].className += " invalid";
        // and set the current valid status to false
        valid = false;
      }
    }
  }
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
  option.setAttribute('value','Elija un arma');
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

function tipoArmadura(clase){
  //Guerrero,Barbaro,Paladin ->Armadura de maya Pesada

  //Explorador,Bardo,Pícaro -> Cuero Medio o Pesado

  //Clérigo,Druida,Mago,Hechicero,Monje -> Armadura de Tela
}


