$( document ).ready(function() {
    var debug = false;
    var element = document.getElementById("juegoDado");

    var dice = {
    		position0: { y: 0, rotateX: 0, rotateY: 0 },
    		position1: { y: 600, rotateX: -900, rotateY: -180},
    		position2: { y: 600, rotateX: -1080, rotateY: -180},
    		position3: { y: 600, rotateX: -1080, rotateY: -90},
    		position4: { y: 600, rotateX: -990, rotateY: -270},
    		position5: { y: 600, rotateX: -810, rotateY: -90},
    		position6: { y: 600, rotateX: -1080, rotateY: -270},
    

    		roll: function(callback) {
    			var number = Math.floor((Math.random() * 6) + 1);
    			if (debug && callback) {
    				callback(prompt('Valor do dado') * 1);
    				//return;
    			}

    			//Verifica si el dado existe
    			if (!dice.element) {

    				//Creación del dado
    				dice.element = document.createElement('div');
    				dice.element.id = 'dice';
    				dice.element.innerHTML = '' +
    					'<div class="face front"></div>' +
    					'<div class="face back"></div>' +
    					'<div class="face left"></div>' +
    					'<div class="face bottom"></div>' +
    					'<div class="face top"></div>' +
                        '<div class="face right"></div>';
                    
    				element.appendChild(dice.element);
          }
    			dice.reset();
                console.log(dice.element)
    			$(dice.element).animate(dice['position' + number], 1300, 'linear', function() {
    				if (callback)
    					callback(number);
    			});
    		},
    		reset: function() {
    			$(dice.element).animate(dice.position0, 0);
    		}
    	};

    dice.roll();
    document.getElementById("play").addEventListener('click', function(e) {
    		e.preventDefault();
    		dice.roll(function(number) {
          document.getElementById("play").innerHTML = "Roll: " + number;
    			console.log(number);
    		});
    	});
});

