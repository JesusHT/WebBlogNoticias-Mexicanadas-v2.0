<?php
    // Publicaciones 
        # General
        $txtid=(isset($_POST['txtid'])?$_POST['txtid']:"");
        $numPosts = "SELECT id, title, autor, description, created_at, image FROM post WHERE id=1 ORDER BY id ASC limit 0,2";
        $consulta = $conn->query($numPosts);
        $general = $consulta->fetchAll(\PDO::FETCH_ASSOC);

        # Politica
        $numPosts = "SELECT id, title, description, image  FROM post WHERE category_id=1 AND status=1 ORDER BY id ASC limit 0,4 ";
        $consulta = $conn->query($numPosts);
        $Politica = $consulta->fetchAll(\PDO::FETCH_ASSOC);

        # Tecnología
        $numPosts = "SELECT id, title, description, image  FROM post WHERE category_id=2 AND status=1 ORDER BY id ASC limit 0,4 ";
        $consulta = $conn->query($numPosts);
        $tecnologia = $consulta->fetchAll(\PDO::FETCH_ASSOC);

        # Deportes
        $numPosts = "SELECT id, title, description, image  FROM post WHERE category_id=3 AND status=1 ORDER BY id ASC limit 0,4 ";
        $consulta = $conn->query($numPosts);
        $deportes = $consulta->fetchAll(\PDO::FETCH_ASSOC);

        # Cultura
        $numPosts = "SELECT id, title, description, image  FROM post WHERE category_id=4 AND status=1 ORDER BY id ASC limit 0,4 ";
        $consulta = $conn->query($numPosts);
        $cultura = $consulta->fetchAll(\PDO::FETCH_ASSOC);

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    // Contacto
        # Información de contacto
        $datos = [["nombre" => "Chipres Arteaga Juan Pablo", "rol" => "Programador", "ruta" => "coding.png"],
                  ["nombre" => "Flores Alcalá Anayansi Valeria", "rol" => "Programador", "ruta" => "coding.png"],
                  ["nombre" => "Gutiérrez Bejarano Braulio Roberto", "rol" => "Diseñador", "ruta" => "developer.png"],
                  ["nombre" => "Preciado Ayala Jairo", "rol" => "Documentador", "ruta" => "internet.png"]];
?>