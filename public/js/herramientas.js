$(document).on('change', '#elegirHerramienta', function(event) {

	var seleccionado = $('#elegirHerramienta').val();
	
	var ui_dado = document.getElementById('ui_dado');
	
	if(ui_dado.hasChildNodes())
	{
	  while(ui_dado.childNodes.length != 0)
	  {
		ui_dado.removeChild(ui_dado.firstChild);
	  }
	}

	switch(seleccionado){
		case '4caras':{
			$(ui_dado).append('<p id="result" style="margin-top:20px !important;"></p>');

			$(ui_dado).append('<div id="platform" style="margin-top:-35px !important; margin-left:calc(50% - 100px) !important;"></div>')

			var platform = document.getElementById('platform');

      var array = ['<div class="wrap"><div class="rotor-x"><div class="rotor-y"><div class="rotor-z">',
      '<div class="triangle face-1"><ul><li>1</li><li>2</li><li>3</li></ul></div>',
      '<div class="triangle face-2"><ul><li>1</li><li>4</li><li>2</li></ul></div>',
      '<div class="triangle face-3"></div>',
      '<div class="triangle face-4"></div>','</div></div></div></div>']
			var dice = $("<div id='dice' onclick='dado2()'></div>");   // Create with jQuery
			for (let index = 0; index < array.length; index++) {
				$(dice).append(array[index]);
			}
			$(platform).append(dice);
		}	
		break;
		case '6caras':{
			// $(ui_dado).append('<p id="result" style="margin-top:20px !important;"></p>');

			$(ui_dado).append('<div id="platform"></div>')

			var platform = document.getElementById('platform');

			var array = ['<div class="side front"><div class="dot center"></div></div>',
			'<div class="side front inner"></div><div class="side top"><div class="dot dtop dleft"></div><div class="dot dbottom dright"></div></div>',
			'<div class="side top inner"></div><div class="side right"><div class="dot dtop dleft"></div><div class="dot center"></div><div class="dot dbottom dright"></div></div>',
			'<div class="side right inner"></div><div class="side left"><div class="dot dtop dleft"></div><div class="dot dtop dright"></div><div class="dot dbottom dleft"></div><div class="dot dbottom dright"></div></div>',
			'<div class="side left inner"></div><div class="side bottom"><div class="dot center"></div><div class="dot dtop dleft"></div><div class="dot dtop dright"></div><div class="dot dbottom dleft"></div><div class="dot dbottom dright"></div></div>',
			'<div class="side bottom inner"></div><div class="side back"><div class="dot dtop dleft"></div><div class="dot dtop dright"></div><div class="dot dbottom dleft"></div><div class="dot dbottom dright"></div><div class="dot center dleft"></div><div class="dot center dright"></div></div>',
			'<div class="side back inner"></div><div class="side cover x"></div><div class="side cover y"></div><div class="side cover z"></div>']
			var dice = $("<div id='dice' onclick='dado()'></div>");   // Create with jQuery
			for (let index = 0; index < array.length; index++) {
				$(dice).append(array[index]);
			}
			$(platform).append(dice);
		}	
		break;
		case '8caras':{
			$(ui_dado).append('<p id="result" style="margin-top:20px !important;"></p>');

			$(ui_dado).append('<div id="platform"></div>')

			var platform = document.getElementById('platform');

			var array = ['<div class="cara1 frente"><div class="puntear centro">1</div></div>',
		'<div class="cara2 frente"><div class="puntear centro2">2</div></div>',
		'<div class="cara3 frente"><div class="puntear centro3">3</div></div>']
			var dice = $("<div id='dice' onclick='dado2()'></div>");   // Create with jQuery
			for (let index = 0; index < array.length; index++) {
				$(dice).append(array[index]);
			}
			$(platform).append(dice);
			
		}	
		break;
		case 'moneda':{
			console.log('moneda');
		}
		break;
	}
});


function dado(){
    $('#platform').removeClass('stop').addClass('playing');
    $('#dice');
    setTimeout(function(){
      $('#platform').removeClass('playing').addClass('stop');
      var number = Math.floor(Math.random() * 6) + 1;
      var x = 0, y = 20, z = -20;
      switch(number){
          case 1:
            x = 0; y = 20; z = -20;
            break;
          case 2:
            x = -100; y = -150; z = 10;
            break;
          case 3:
            x = 0; y = -100; z = -10;
            break;
          case 4:
            x = 0; y = 100; z = -10;
            break;
          case 5:
            x = 80; y = 120; z = -10;
            break;
          case 6:
            x = 0; y = 200; x = 10;
            break;
      }
      
      $('#dice').css({
        'transform': 'rotateX(' + x + 'deg) rotateY(' + y + 'deg) rotateZ(' + z + 'deg)'
      });
      
      $('#platform').css({
        'transform': 'translate3d(0,0, 0px)'
      });
      
      $('#result').html(number);
      
    }, 1120);
  };

  function dado2(){
    $('#platform').removeClass('stop').addClass('playing');
    $('#dice');
    setTimeout(function(){
      $('#platform').removeClass('playing').addClass('stop');
      var number = Math.floor(Math.random() * 6) + 1;
      var x = 0, y = 0, z = 50;
      switch(number){
          case 1:
            x = 0; y = 20; z = -20;
            break;
          case 2:
            x = -100; y = -150; z = 10;
            break;
          case 3:
            x = -110; y = -28; z = 0;
            break;
          case 4:
            x = 0; y = 100; z = -10;
            break;
          case 5:
            x = 80; y = 120; z = -10;
            break;
          case 6:
            x = 0; y = 200; x = 10;
            break;
      }
      
      $('#dice').css({
        'transform': 'rotateX(' + x + 'deg) rotateY(' + y + 'deg) rotateZ(' + z + 'deg)'
      });
      
      $('#platform').css({
        'transform': 'translate3d(0,0, 0px)'
      });
      
      $('#result').html(number);
      
    }, 1120);
  };