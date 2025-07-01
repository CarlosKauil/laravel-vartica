<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vartica Metaverse</title>
    <link rel="stylesheet" href="{{asset ('/Template/css/main.css')}}">
    <link rel="icon" type="image/png" href="{{ asset('Template/img/vartica-white.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
</head>
<body>
    <section id="Inicio"></section>

    <header class="header">

        <video src="{{asset ('/Template/img/BANNER.mp4')}}" autoplay loop muted plays-inline preload="auto" class="intro-vid"></video>

        <div class="video-overlay"></div>
       
        <div class="menu container">
            
            <a href="#" class="logo">Kreaverse</a>

            <input type="checkbox" id="menu">
            <label for="menu" > <img src="{{asset ('Template/img/menu.png')}}" class="menu-icono" alt=""></label>

            <nav class="navbar">
                <ul>
                    <li><a href="#Inicio">Inicio</a></li>
                    <li><a href="#Informacion">Información</a></li>
                    <li><a href="#Areas">Areas</a></li>
                    
                    <li><a href="#Metaverso">Metaverso</a></li>
                     
                    <li><a href="{{ route('login')}}">Login</a></li>
                </ul>
            </nav>
        </div>

        <div class="header-info">
            <div class="header-content">
                
                <h1  class="animate__zoomInLeft" style="animation-duration: 2s;">VARTICA <strong class="metaverse-txt">Metaverse</strong></h1>

                <p class="sub-title animate__zoomIn" style="animation-duration: 2s;">
                    ¡El Metaverso dirigido al ámbito del arte y a la cultura real!
                </p>

                <div class="container-button">
                    <a href="#" class="btn-animado">
                        <span>Iniciar</span>
                        <span></span>
                    </a>
                </div>
                
            </div>
        </div>
    </header>

    <section id="Informacion">
        <div class="container">
            <div class="vartica-info">
                <div class="container-1">

                    <h2>¿Qué es VARTICA Metaverse?</h2>

                    <p>
                        VARTICA Metaverse, es un entorno digital inmersivo que combina el arte tradicional y la tecnología actual para crear experiencias únicas en un espacio tridimensional. Este metaverso está diseñado específicamente para artistas, brindándoles un escenario global donde pueden compartir sus creaciones de manera innovadora e interactiva, además de aumentar la popularidad de su trabajo y obtener un mejor feedback de más personas.
                    </p>
                        
                    <p>
                        ¿Eres un pintor, escultor, cantante, compositor o escritor y quieres exponer tus creaciones de una forma asombrosa y nueva? ¡Únete a VARTICA Metaverse!
                    </p>

                    <div class="container-button">
                        <a href="#" class="btn-animado">
                            <span>Empieza</span>
                            <span></span>
                        </a>
                    </div>
                </div>

                <div class="container-2">
                    <img src="{{asset ('Template/img/img-meta.png')}}" class="img-meta" alt="Imagen-metaverso">
                </div>
            </div>
        </div>
    </section>
    <!-- 
    <section id="Metaverso">
        <main class="metaverse">
            <div class="container">
                <div class="metaverse-content">
                    <h2>Metaverso</h2>
                    <h3>Explora nuevas dimensiones en el mundo digital</h3>
                    <div class="iframe-container">
                        <iframe 
                            src="https://www.youtube.com/embed/dQw4w9WgXcQ" 
                            frameborder="0" 
                            allowfullscreen>
                        </iframe>
                    </div>
                </div>
            </div>
        </main>
    </section>
     -->

    <section id="Servicios">
        <main class="services">
            <div class="container">
                <div class="services-content">
                    <h2>¿Quiénes pueden unirse?</h2>

                    <div class="services-group">
                        <h3>
                            Pintores, escultores, músicos, compositores, escritores y cualquier artista que desee dar un giro innovador a la forma en que comparte su arte con el mundo.
                        </h3>
                    </div>
                    <a href="{{ route('artista.register.form')}}" class="btn-animado">
                        <span>Registrarme</span>
                        <span></span>
                    </a>
                </div>
            </div>
        </main>
    </section>

    <section id="Areas">
        <div class="container">
            <div class="vartica-areas">
                <h1 class="title-areas">Áreas en Vartica Metaverse</h1>

                <p class="parrafo-areas">
                   Conoce el talento de multiples artistas en un solo espacio que contiene áreas que muestran diferentes ramas.
                </p>

                <div class="areas-meta">
                    <div class="card">
                        
                        <img src="{{asset('Template/img/literatura.png')}}" alt="img-1">
                        <div class="info txt-areas">
                            Literatura
                        </div>
                    </div>
                    <div class="card">
                        <img src="{{asset('Template/img/Pintura.jpg')}}" alt="Imagen 2">
                        <div class="info txt-areas">
                            <h3>Pintura</h3>
                        </div>
                    </div>
            
                    <div class="card">
                        <img src="{{asset('Template/img/Musica.jpg')}}" alt="Imagen 3">
                        <div class="info txt-areas">
                            <h3>Música</h3>
                        </div>
                    </div> 
                     <div class="card">
                        <img src="{{asset('Template/img/Escultura.png')}}" alt="Imagen 3">
                        <div class="info txt-areas">
                            <h3>Escultura</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    
    <footer class="footer container">
        <h3>KREAVERSE</h3>

        <div class="links">
            <ul>
                <li><a href="#Inicio">Inicio</a></li>
                <li><a href="#Informacion">Información</a></li>
                <li><a href="#Metaverso">Metaverso</a></li>
                <li><a href="#">Login</a></li>
            </ul>
        </div>
    </footer>

   
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener("click", function(event) {
                    event.preventDefault();
    
                    const targetId = this.getAttribute("href");
                    const targetElement = document.querySelector(targetId);
    
                    if (targetElement) {
                        window.scrollTo({
                            top: targetElement.offsetTop - 80, // Ajuste si hay un header fijo
                            behavior: "smooth"
                        });
                    }
                });
            });
        });
    </script>
    

</body>
</html>