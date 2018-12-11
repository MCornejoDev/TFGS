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
		
		case '6D':{
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
    case '18D':{
			
			$(ui_dado).append('<div id="platform"></div>')

			var platform = document.getElementById('platform');

			var array = ['<div class="color3 side front"><div id="numero111">3</div></div>',
			'<div class="color3 side front inner"></div><div class="color3 side top"><div id="numero222">6.</div></div></div>',
			'<div class="color3 side top inner"></div><div class="color3 side right"><div id="numero333">.9</div></div>',
			'<div class="color3 side right inner"></div><div class="color3 side left"><div id="numero444">12</div></div>',
			'<div class="color3 side left inner"></div><div class="color3 side bottom"><div id="numero555">15</div></div>',
			'<div class="color3 side bottom inner"></div><div class="color3 side back"><div id="numero666">18</div></div>',
			'<div class="color3 side back inner"></div><div class="coverS3 side cover x"></div><div class="coverS3 side cover y"></div><div class="coverS3 side cover z"></div>']
			var dice = $("<div id='dice' onclick='dado()'></div>");   // Create with jQuery
			for (let index = 0; index < array.length; index++) {
				$(dice).append(array[index]);
			}
			$(platform).append(dice);
			
		}	
    break;
		case '30D':{
			
			$(ui_dado).append('<div id="platform"></div>')

			var platform = document.getElementById('platform');

			var array = ['<div class="color2 side front"><div id="numero11">5</div></div>',
			'<div class="color2 side front inner"></div><div class="color2 side top"><div id="numero22">10</div></div></div>',
			'<div class="color2 side top inner"></div><div class="color2 side right"><div id="numero33">15</div></div>',
			'<div class="color2 side right inner"></div><div class="color2 side left"><div id="numero44">20</div></div>',
			'<div class="color2 side left inner"></div><div class="color2 side bottom"><div id="numero55">25</div></div>',
			'<div class="color2 side bottom inner"></div><div class="color2 side back"><div id="numero66">30</div></div>',
			'<div class="color2 side back inner"></div><div class="coverS2 side cover x"></div><div class="coverS2 side cover y"></div><div class="coverS2 side cover z"></div>']
			var dice = $("<div id='dice' onclick='dado()'></div>");   // Create with jQuery
			for (let index = 0; index < array.length; index++) {
				$(dice).append(array[index]);
			}
			$(platform).append(dice);
			
		}	
    break;
    case '60D':{
			$(ui_dado).append('<div id="platform"></div>')

			var platform = document.getElementById('platform');

			var array = ['<div class="color1 side front"><div id="numero">10</div></div>',
			'<div class="color1 side front inner"></div><div class="color1 side top"><div id="numero2">20</div></div></div>',
			'<div class="color1 side top inner"></div><div class="color1 side right"><div id="numero3">30</div></div>',
			'<div class="color1 side right inner"></div><div class="color1 side left"><div id="numero4">40</div></div>',
			'<div class="color1 side left inner"></div><div class="color1 side bottom"><div id="numero5">50</div></div>',
			'<div class="color1 side bottom inner"></div><div class="color1 side back"><div id="numero6">60</div></div>',
			'<div class="color1 side back inner"></div><div class="coverS side cover x"></div><div class=" coverS side cover y"></div><div class="coverS side cover z"></div>']
			var dice = $("<div id='dice' onclick='dado()'></div>");   // Create with jQuery
			for (let index = 0; index < array.length; index++) {
				$(dice).append(array[index]);
			}
			$(platform).append(dice);
		}	
		break;
		case 'moneda':{
			// $(ui_dado).append('<p id="result" style="margin-top:20px !important;"></p>');

			$(ui_dado).append('<div id="platform2"></div>')

      var platform = document.getElementById('platform2');
      
			/*var array = ["<div class='flip-box' onclick='girarMoneda()'><div class='flip-box-inner' ><div id='cara' class='flip-box-front'><img  src='../img/cara.png'/></div><div id='cruz' class='flip-box-back'><img src='../img/cruz.png'/></div></div></div>"]
			var dice = $("<div ></div>");   // Create with jQuery
			for (let index = 0; index < array.length; index++) {
				$(dice).append(array[index]);
      }*/
      
      var dice = $("<div class='floor'><div class='line'></div><div class='line'></div><div class='line'></div><div class='line'></div><div class='line'></div><div class='line'></div><div class='line'></div><div class='line'></div><div class='line'></div><div class='line'></div><div class='line'></div><div class='line'></div></div><div class='coin'><div class='edge'><div class='segment'></div><div class='segment'></div><div class='segment'></div><div class='segment'></div><div class='segment'></div><div class='segment'></div><div class='segment'></div><div class='segment'></div><div class='segment'></div><div class='segment'></div><div class='segment'></div><div class='segment'></div><div class='segment'></div><div class='segment'></div><div class='segment'></div><div class='segment'></div></div></div>"); 
      var edge = $(".edge");
      
      for (let index = 0; index < 16; index++) {
        var divSegment = document.createElement("div"); 
        
        $(divSegment).addClass("segment");
        
        $(edge).append(divSegment);
      }
      
      $(platform).append(dice);

      let flippin = false, doc = document;
   
      doc.querySelector('.coin').addEventListener('click', e => {
      if(flippin) return false; flippin = true;
      
      //declare objects to animate, remove any existing anim
      let objs = doc.querySelectorAll('.line, .coin');
      objs.forEach((line) => line.classList.remove('anim'));
      
      //choose heads or tails
      let winner = Math.random() > 0.5 ? '900deg' : '720deg';
      doc.querySelector(':root').style.setProperty('--flips', winner)
      
      //apply animation and wait for completion
      setTimeout(() => {
        objs.forEach((line) => line.classList.add('anim'));
        e.target.addEventListener('animationend', () => flippin = false);
      });
    });
    
    //click once on load for the thumbnail
    setTimeout(() => doc.querySelector('.coin').click(), 750)
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
  }

function dado2()
  {
    $('#platform').removeClass('stop').addClass('playing');
    $('#dice');
    setTimeout(function(){
      $('#platform').removeClass('playing').addClass('stop');
      var number = Math.floor(Math.random() * 4) + 1;
      var x = 0, y = 0, z = 50;
      switch(number){
          case 1:
            x = 0; y = 20; z = 20;
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
}
