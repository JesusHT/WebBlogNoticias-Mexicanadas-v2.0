<h2 class="text-center">Sugerencias</h2>
<nav class="navbar navbar-light bg-light shadow-sm p-3 mb-5 bg-body rounded border border-secondary"> <!-- Aqui se pone el buscador -->
    <div class="container-fluid">
        <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Buscar</button>
        </form>
    </div>
</nav>
<?php for ($i=0;$i < 6; $i++): ?>
    <div class="card shadow-sm bg-body rounded border border-secondary mb-2">
        <img class="card-img-top" src="https://www.elfinanciero.com.mx/resizer/kgNM8XLpTdoJxt3kF5qvXksqQ9s=/400x225/filters:format(jpg):quality(70)/cloudfront-us-east-1.images.arcpublishing.com/elfinanciero/MG7PQV7DNVDG5PPBCSUPR5MCHY.jpeg">
        <div class="colore-carta3 card-body">
            <h5 class="card-title">Titulo del articulo</h5>
            <p class="card-text">Contenido del articulo.</p>
            <a href="#" class="btn btn-primary">Más</a>
        </div>
    </div>
<?php endfor ?>