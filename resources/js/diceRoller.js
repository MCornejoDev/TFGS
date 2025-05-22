document.addEventListener('alpine:init', () => {
    Alpine.data('diceRoller', () => ({
        currentFace: 1,
        transformStyle: 'rotateX(0deg) rotateY(0deg)',

        rollDice() {
            const faces = [1, 2, 3, 4, 5, 6];
            const finalFace = faces[Math.floor(Math.random() * faces.length)];
            this.currentFace = finalFace;

            // Genera una rotación aleatoria para el efecto de tirada
            const rotationX = Math.floor(Math.random() * 360);
            const rotationY = Math.floor(Math.random() * 360);

            // Aplica la transformación inicial para simular el lanzamiento
            this.transformStyle = `rotateX(${rotationX}deg) rotateY(${rotationY}deg)`;

            // Calcula la transformación final que muestra la cara correcta
            setTimeout(() => {
                this.transformStyle = this.getFinalTransform(finalFace);
            }, 1000); // 1000ms coincide con la duración de la animación
        },

        getFinalTransform(face) {
            // Define las rotaciones finales para cada cara del dado
            const transforms = {
                1: 'rotateX(0deg) rotateY(0deg)',
                2: 'rotateX(0deg) rotateY(90deg)',
                3: 'rotateX(0deg) rotateY(180deg)',
                4: 'rotateX(0deg) rotateY(270deg)',
                5: 'rotateX(90deg) rotateY(0deg)',
                6: 'rotateX(-90deg) rotateY(0deg)'
            };
            console.log(face);
            return transforms[face];
        }
    }));

    Alpine.data('diceRoller2', () => ({
        isPlaying: false,
        x: 0,
        y: 0,
        z: 0,
        number: [],
        init() {
            console.log(this.dice);
        },
        check() {
            return this.$wire.get('die');
        },
        roll() {
            this.isPlaying = true;
            setTimeout(() => {
                let dice = document.querySelector('.diceSelected');
                let platform = this.$refs.platform;
                let number = Math.floor(Math.random() * 6) + 1;
                this.applyTransformations(number);
                //this.
                dice.style.transform = this.styles().dice.transform;
                platform.style.transform = this.styles().platform.transform;

                this.isPlaying = false;
            }, 1120);
        },
        styles() {
            return {
                dice: {
                    transform: `rotateX(${this.x}deg) rotateY(${this.y}deg) rotateZ(${this.z}deg)`
                },
                platform: {
                    transform: 'translate3d(0, 0, 0px)'
                },
            };
        },
        applyTransformations(number) {
            switch (number) {
                case 1:
                    this.x = 0;
                    this.y = 20;
                    this.z = -20;
                    break;
                case 2:
                    this.x = -100;
                    this.y = -150;
                    this.z = 10;
                    break;
                case 3:
                    this.x = 0;
                    this.y = -100;
                    this.z = -10;
                    break;
                case 4:
                    this.x = 0;
                    this.y = 100;
                    this.z = -10;
                    break;
                case 5:
                    this.x = 80;
                    this.y = 120;
                    this.z = -10;
                    break;
                case 6:
                    this.x = 0;
                    this.y = 200;
                    this.x = 10;
                    break;
            }
        }
    }));
});

