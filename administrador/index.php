<?php #require_once "../includes/validarSesion.php" 
      require "../includes/database.php"?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link href="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../resources/css/bootstrap.min.css">
    <link href="../resources/assets/favicon.ico" rel="icon">
    <link rel="stylesheet" href="../resources/css/adminMenu.css">
    <script src="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.js" type="text/javascript"></script>
    <title>Mexicanadas</title>
  </head>
  <body>
    <!-- Sidebar  -->
    <nav class="site-sidebar">
      <div class="scroller">
        <div class="m-2">
          <div class="sidebar-header text-center">
              <h4>Bienvenido <? //= $user['email']?></h4>
          </div>
          <ul class="nav nav-pills mb-3 flex-column" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
              <a class="nav-link buttons-nav active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true" href="#">Administrador</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link buttons-nav" id="pills-borradores-tab" data-bs-toggle="pill" data-bs-target="#pills-borradores" type="button" role="tab" aria-controls="pills-borradores" aria-selected="true" href="#">Borradores</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link buttons-nav" id="pills-estadistica-tab" data-bs-toggle="pill" data-bs-target="#pills-estadistica" type="button" role="tab" aria-controls="pills-estadistica" aria-selected="true" href="#">Estadisticas</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link buttons-nav" id="pills-mensajes-tab" data-bs-toggle="pill" data-bs-target="#pills-mensajes" type="button" role="tab" aria-controls="pills-mensajes" aria-selected="true" href="#">Mensajes</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link buttons-nav" href="../includes/logout.php">Cerrar sesion</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link buttons-nav article" id="pills-articulo-tab" data-bs-toggle="pill" data-bs-target="#pills-articulo" type="button" role="tab" aria-controls="pills-articulo" aria-selected="true" href="#"><i class="bi bi-plus"></i></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="site-heading">
      <div class="m-3">
        <div class="tab-content" id="pills-tabContent">
          <!-- AdminTodos    -->
          <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <article>
              <div id="content">
                <nav class="navbar navbar-expand-sm navbar-light bg-light shadow-sm p-3 mb-5 bg-body rounded border border-secondary">
                    <div class="container-fluid"><h3>Administrador de noticias</h3></div>
                </nav>
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                  <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-admin-tab" data-bs-toggle="pill" data-bs-target="#pills-admin" type="button" role="tab" aria-controls="pills-admin" aria-selected="true">Home</button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-ver-tab" data-bs-toggle="pill" data-bs-target="#pills-ver" type="button" role="tab" aria-controls="pills-ver" aria-selected="false"><i class="bi bi-eye-fill"></i></button>
                  </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                  <div class="tab-pane fade show active" id="pills-admin" role="tabpanel" aria-labelledby="pills-admin-tab">
                    <?php
                     $redireccion=0;
                     $txtid=(isset($_POST['txtid'])?$_POST['txtid']:"");
                     $numPosts = "SELECT id, autor, title, description, content, image, created_at, status FROM post WHERE status=1 ORDER BY id ASC limit 0,4";
                     $consulta= $conn->query($numPosts);
                     $idPost = ($consulta->fetchAll(PDO::FETCH_ASSOC));
                    ?>
                    <table class="table table-hover table-success table-striped table-fixed" id="tabla">
                      <thead>
                        <tr>
                          <th class="align-middle text-center">ID</th>
                          <th class="align-middle text-center">Autor</th>
                          <th class="align-middle text-center">Titulo</th>
                          <th class="align-middle text-center">Descripcion</th>
                          <th class="align-middle text-center">Contenido</th>
                          <th class="align-middle text-center">Imagen</th>
                          <th class="align-middle text-center">Fecha de creacion</th>
                          <th class="align-middle text-center">Editar/Borrar</th>   
                          <th class="align-middle text-center">Ver</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($idPost as $lisPost) { ?>
                        <tr>
                          <td class="align-middle"><?php echo $lisPost['id']?></td>
                          <td class="align-middle "><?php echo $lisPost['autor']?></td>
                          <td class="align-middle "><?php echo $lisPost['title']?></td>
                          <td class="align-middle "><?php echo substr($lisPost['description'],0,40)?>.......</td>
                          <td class="align-middle "><?php echo substr($lisPost['content'],0,40)?>.......</td>
                          <td class="align-middle "><img src="<?php echo substr($lisPost['image'],0) ?>" width="120" alt="" srcset=""></td>
                          <td class="align-middle "><?php echo $lisPost['created_at']?></td>
                          <td class= "align-middle">
                            <form method="post" action="./deletePost.php">
                              <input type="hidden" name="txtid" id="txtid" value="<?php echo $lisPost['id']; ?>" />
                              <input type="hidden" name="redireccion" id="redireccion" value="<?php echo $redireccion; ?>" />
                              <input type="submit" name="accion" value="Borrar" class="btn btn-danger mt-3"/>
                            </form>
                              <!--</td> class="align-middle "><button type="submit" id="eliminar"
                              class="btn btn-danger mt-3"><i class="bi bi-trash"></i></button> 
                              <td class="align-middle "><button type="submit" name="accion"
                              class="btn btn-warning mt-3"><i class="bi bi-pencil-square"></i></button> -->
                            <form method="post" action="./formEditar.php">
                              <input type="hidden" name="txtid" id="txtid" value="<?php echo $lisPost['id']; ?>" />
                              <input type="submit" name="accion" value="Editar" class="btn btn-warning mt-3"/>
                            </form>
                          </td>
                          <td>
                            <form method="post" action="./articulo.php">
                              <input type="hidden" name="txtid" id="txtid" value="1">
                              <button type="submit" name="accion" class="btn btn-success mt-3"><i class="bi bi-eye-fill"></i></button>
                            </form>
                          </td>
                        </tr>
                        <?php }?>
                      </tbody>
                    </table>
                  </div>
                  <div class="tab-pane fade" id="pills-ver" role="tabpanel" aria-labelledby="pills-ver-tab">
                      <?php $txtid=(isset($_POST['txtid'])?$_POST['txtid']:"");
                       $numPosts = "SELECT id, title, autor, description, created_at, image FROM post WHERE id=1 ORDER BY id ASC limit 0,2";
                       $consulta = $conn->query($numPosts);
                       $general = $consulta->fetchAll(\PDO::FETCH_ASSOC);?>
                    <div class="container-xl">
                    <div class="row">
                      <div class="p-2 p-md-3 mb-2 text-white rounded bg- mt-3"><p class="textcoloraized">N O T I C I A S</p></div>      
                    </div>
                    </div>
            <div class="container-sm">
                <div class="row justify-content-md-center">
                    <div class="col-auto col-md-4 mb-3"> <!-- Primera columna-->
                        <nav class="navbar navbar-light bg-light shadow-sm p-3 mb-5 bg-body rounded border border-secondary"> <!-- Aqui se pone el buscador -->
                            <div class="container-fluid">
                                <form class="d-flex">
                                    <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
                                    <button class="btn btn-outline-success" type="submit">Buscar</button>
                                </form>
                            </div>
                        </nav>
                        <div class="colore-carta3 card border border-secondary"> <!-- Aqui se pone la tarjeta de autor -->
                            <img src="../resources/assets/nosotros.png" class="card-img-top border border-5" alt="...">
                            <div class="colore-carta3 card-body">
                                <h5 class="card-title">¡NOSOTROS SOMOS!</h5>
                                <p class="card-text"><small class="text-muted">C R E A D O R E S</small></p>
                                <p class="card-text">Nosotros somos el equipo de Mexicanadas.</p>
                                <a href="#" class="btn btn-primary">Más</a>
                            </div>
                        </div>
                        <div class="card border-secondary mt-2 mb-2">
                            <div class="colore-carta3 card-body">
                                <h5 class="card-title">¡Contactanos!</h5>
                                <p class="card-text">Ponte en contacto con los creadores de la página.</p>
                                <a href="#" class="btn btn-primary">Contactar</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-1"> <!-- segunda columna--></div>
                    <div class="col-sm-7 mb-2"> <!-- tercera columna-->
                        <?php foreach ($general as $lisId) { ?>
                            <div class="card border-secondary mb-2">
                                <img src="<?php echo substr($lisId['image'],0) ?>" class="imgs">
                                <div class="colore-carta3 card-body">
                                    <div class="card-title fw-bold"><?php echo $lisId["created_at"]?></div>
                                    <h5><div class="card-title fw-bold"><?php echo $lisId["title"]?></div></h5>
                                    <h5><div class="card-title fw-bold fs-6">Autor: <?php echo $lisId["autor"]?></div></h5>
                                    <p class="card-text"><?php echo $lisId["description"]?></p>
                                    <form method="post" action="articulo.php"> 
                                        <input type="hidden" name="txtid" id="txtid" value="<?php echo $lisId['id']; ?>">
                                        <input type="submit" name="accion" value="Ver más... " class="btn btn-primary mt-3">
                                    </form>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
                  </div>
                </div>
              </div>
            </article>
          </div>
          <!-- Borradores    -->
          <div class="tab-pane fade" id="pills-borradores" role="tabpanel" aria-labelledby="pills-borradores-tab">
             <!-- Margin 5px y padding 5px -->
            <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm p-3 mb-5 bg-body rounded border border-secondary">
              <div class="container-fluid"><h3>Borradores</h3></div>
            </nav>
            <?php
              $redireccion=1;
              $txtid=(isset($_POST['txtid'])?$_POST['txtid']:"");
              $numPosts = "SELECT id, autor, title, description, content, image, created_at, status FROM post WHERE status=0 ORDER BY id ASC limit 0,4";
              $consulta= $conn->query($numPosts);
              $idPost = ($consulta->fetchAll(PDO::FETCH_ASSOC));
            ?>
            <div class="card text-dark bg-light mb-3 border border-secondary p-3 mb-5">
              <form method="post" action="./formDraft.php">
                 <input type="hidden" name="txtid" id="txtid" value="<?php if(!empty($idPost)){ $idPost['id'];} ?>">
                <input type="submit" name="submit" class="btn btn-sm btn-success " value="Agregar un nuevo borrador">
              </form>
            </div>
            <?php foreach ($idPost as $lisPost) { ?>
            <div class="card">
              <div class="card-header"><?php echo $lisPost['created_at']; ?></div>
              <div class="card-body">
                <h5 class="card-title"><?php echo $lisPost["title"]; ?></h5>
                <p class="card-text"><?php echo $lisPost["description"]; ?></p>
                <div class="input-group mb-3">
                  <form method="post" action="./statusPost.php">
                    <input type="hidden" name="txtid" id="txtid" value="<?php echo $lisPost['id']; ?>" />
                    <input type="submit" class="form-control btn btn-success" name="accion" value="Publicar" />
                  </form>
                  <form method="post" action="./formEditar.php">
                    <input type="hidden" name="txtid" id="txtid" value="<?php echo $lisPost['id']; ?>" />
                    <input type="submit" class="form-control btn btn-warning" name="accion" value="Editar" />
                  </form>
                  <form method="post" action="articulo.php"> 
                    <input type="hidden" name="txtid" id="txtid" value="<?php echo $lisPost['id']; ?>" />
                    <input type="submit"  class="form-control btn btn-primary" name="accion" value="Vista previa"/>
                  </form>
                  <form method="post" action="./deletePost.php">
                    <input type="hidden" name="txtid" id="txtid" value="<?php echo $lisPost['id']; ?>" />
                    <input type="hidden" name="redireccion" id="redireccion" value="<?php echo $redireccion; ?>" />
                    <input type="submit"  class="form-control btn btn-danger" name="accion" value="Eliminar borrador"/>
                  </form>
                </div>
              </div>
            </div>
            <?php }?>
          </div>
          <!-- Estadisticas  -->
          <div class="tab-pane fade" id="pills-estadistica" role="tabpanel" aria-labelledby="pills-estadistica-tab">
            <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm p-3 mb-5 bg-body rounded border border-secondary">
              <div class="container-fluid">
               <h3>Estadisticas</h3>
              </div>
            </nav>
          </div>
          <!-- Mensajes      -->
          <div class="tab-pane fade" id="pills-mensajes" role="tabpanel" aria-labelledby="pills-mensajes-tab">
            <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm p-3 mb-5 bg-body rounded border border-secondary">
              <div class="container-fluid"><h3>Mensajes</h3></div>
            </nav>
            <?php
              $redireccion=1;
              $txtid=(isset($_POST['txtid'])?$_POST['txtid']:"");
              $numContact = "SELECT id, name, email, content FROM contact ORDER BY id ASC";
              $consulta = $conn->query($numContact);
              $idContact = ($consulta->fetchAll(PDO::FETCH_ASSOC));
              foreach ($idContact as $lisContact) {   
            ?>
            <div class="card">
              <div class="card-header"><?php echo $lisContact["email"]; ?></div>
              <div class="card-body">
                <h5 class="card-title"><?php echo $lisContact["name"]; ?></h5>
                <p class="card-text"><?php echo $lisContact["content"]; ?></p>
              </div>
            </div>
            <?php }?>
          </div>
          <!-- NuevoArticulo -->
          <div class="tab-pane fade" id="pills-articulo" role="tabpanel" aria-labelledby="pills-articulo-tab">
            <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm p-3 mb-5 bg-body rounded border border-secondary">
               <div class="container-fluid"><h3>Nueva noticia</h3></div>
            </nav>
               <div class="container-sm">
                <div class="row">
                 <form method="post" action="../php/upload.php" enctype="multipart/form-data">
                  <div class="grid">  <!-- Columna -->             
                   <div class="card text-dark bg-light mb-3 border border-secondary p-3 mb-5">
                    <label class="visually-hidden" for="autoSizingInputGroup">Autor</label>
                     <div class="input-group">
                      <div class="input-group-append" >
                       <span class="input-group-text"><i class="bi bi-person-circle"></i></span>
                      </div>
                       <input type="text" class="form-control" name="autor" id='autor' placeholder="Autor" required>
                     </div>
                   </div>  
                    <div class="card text-dark bg-light mb-3 border border-secondary p-3 mb-5">
                       <label for="" class="form-label">Titulo del articulo</label>
                       <input type="text" class="form-control" name='title' id="title" required>
                       <div class="valid-feedback">Looks good!</div>
                       <label for="exampleFormControlTextarea1" class="form-label">Descripcion</label>
                       <textarea class="story-editor medium-editor-element medium-editor-placeholder form-control" name="description"></textarea>
                       <label for="exampleFormControlTextarea1" class="form-label">Contenido</label>
                       <textarea class="story-editor medium-editor-element medium-editor-placeholder form-control" id="exampleFormControlTextarea1" name="content" rows="6"></textarea>
                       <!--<div class="story-editor medium-editor-element medium-editor-placeholder form-control" role="textarea" aria-label="Escribe tu historia" aria-multiline="true" contenteditable="true" spellcheck="true" data-medium-editor-element="true" data-medium-editor-editor-index="1" medium-editor-index="ac44f950-0d98-6673-8139-ede0ad718cbb" data-placeholder="Type your text"><p name="description" data-p-id="d41d8cd98f00b204e9800998ecf8427e"><br></p><p><br></p>
                       </div>-->
                       <label for="exampleFormControlTextarea1" class="form-label">Fecha</label><br>
                       <input type="date" name="created_at" class="input-group date form-control" date="" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd" required>
                    </div>
                    <div class="card text-dark bg-light mb-3 border border-secondary p-3 mb-5">
                      <label for="categoryselect">Categoría</label>
                        <select name="category_id"id="categoryselecy" class="form-control">
                          <option value="-1">Selecciona una categoría</option>
                          <option value="1">Política</option>
                          <option value="2">Deporte</option>
                          <option value="3">Cultura</option>
                          <option value="4">Tecnología</option>
                        </select>
                        <br>
                        <div>
                         <div class="card text-dark bg-light mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Fuentes consultadas</label>
                            <input type="text" class="form-control" name='link1' id="links" required>
                            <input type="text" class="form-control" name='link2' id="links" required>
                            <input type="text" class="form-control" name='link3' id="links" required>
                          </div>
                          <div class="card text-dark bg-light mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Foto</label>
                            <input type="file" class="form-control" name="foto">
                          </div>
                        </div>
                    </div>
                  </div>
                  <div class="card text-dark bg-light mb-3 border border-secondary p-3 mb-5">
                   <input type="submit" name="submit" class="btn btn-sm btn-primary" value="Publicar">
                  </div>
                 </form>
                </div>
          </div>
          
        </div>
      </div>
    </div>

  </body>
  <!-- Scripts -->
  <script src="../resources/js/bootstrap.bundle.min.js"></script>
  <script src="../resources/js/datatable.js"></script>
</html>