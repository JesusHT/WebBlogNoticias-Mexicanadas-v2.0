let html = "";  

html +=`      <img class="img-fluid d-block mx-auto" style="width: 30pc" src="resources/imagenes/articuloblogrecorte.png">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          
          <li class="nav-item">
            <a class="nav-link" href="includes/index.php">General</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="includes/seccionPolitica.php">Politica</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="includes/seccionTecnologia.php">Tecnología</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="includes/seccionDeportes.php">Deporte</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="includes/seccionCultural.php">Cultura</a>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Información</a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="includes/contacto.php">Contacto</a></li>
              <li><a class="dropdown-item" href="includes/creadores.php">Creadores</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Seguridad</a></li>
            </ul>
          </li>
        
        </ul>
        
      </div>`;

const le = document.querySelector("#menu"); 
le.innerHTML = html;