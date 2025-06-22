<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background: linear-gradient(135deg, #ff9a9e 0%, #fad0c4 100%);
            font-family: 'Arial', cursive;
            overflow: hidden;
        }
        #container {
            text-align: center;
            max-width: 800px;
            padding: 20px;
        }
        #mensaje {
            font-size: 1.8em;
            color: #d23669;
            margin-bottom: 20px;
            min-height: 4em;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
            line-height: 1.6;
        }
        .corazon {
            font-size: 2em;
            animation: latido 1s infinite alternate;
            display: inline-block;
            margin-top: 20px;
        }
        @keyframes latido {
            from { transform: scale(1); }
            to { transform: scale(1.2); }
        }
        .flores {
            position: absolute;
            font-size: 1.5em;
            opacity: 0.7;
            animation: caer 10s linear infinite;
        }
        @keyframes caer {
            0% { transform: translateY(-100px) rotate(0deg); }
            100% { transform: translateY(100vh) rotate(360deg); }
        }
    </style>
</head>
<body>
    <div id="container">
        <div id="mensaje"></div>
        <div class="corazon">❤️</div>
    </div>
  
    <script>
        const texto = "Mi amorcito precioso, hoy como todos los días quiero decirle que la amo Usted se ha vuelto una parte tan esencial en mi vida que sinceramente ya no me imagino mi vida sin usted. Espero que siempre note que cada día me gustas más que el día de ayer y que cada día me esmero por demostrárselo para que siempre te sienta bien y sobre todo amada. con usted me he imaginado muchas cosas y esas cosas se tienen que cumplir ok? Porque si no, no me imagino eso con nadie más que no sea usted. Te amo Yoselin Grisel Solis";
        let index = 0;
        const elemento = document.getElementById("mensaje");
        
        // Crear flores que caen
        function crearFlores() {
            const flores = ['🌸', '🌹', '💐', '🌺', '🌷', '🌻', '🏵️'];
            for (let i = 0; i < 15; i++) {
                const flor = document.createElement('div');
                flor.className = 'flores';
                flor.textContent = flores[Math.floor(Math.random() * flores.length)];
                flor.style.left = Math.random() * 100 + 'vw';
                flor.style.animationDuration = (Math.random() * 5 + 5) + 's';
                flor.style.animationDelay = Math.random() * 5 + 's';
                document.body.appendChild(flor);
            }
        }
        
        function mostrarProgresivo() {
            if (index < texto.length) {
                elemento.textContent = texto.substring(0, index + 1);
                index++;
                setTimeout(mostrarProgresivo, 50); // Velocidad más rápida por el texto largo
            }
        }
        
        crearFlores();
        setTimeout(mostrarProgresivo, 1000); // Inicio con retraso para mejor efecto
    </script>
</body>
</html>