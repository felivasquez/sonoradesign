
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>La sonora de Martin</title>
  <link rel="stylesheet" href="style.css">
</head>
<style>
  *{
    margin:0;
    padding: 0;
    box-sizing: border-box;
  }
  /* secciones */
  .sectionNormal{
    width: 100%;
    height: 100vh;
  }
  .sectionConciertos{
    width: 100%;
    height: auto;
  }
  /* contenedor concierto*/
  .containerConcerts{
    display: grid;
    grid-auto-flow: row;
    grid-template-columns: repeat(1, 80%);
    grid-row-gap: 5px;
    grid-column-gap: 10px;
    justify-content: center;
  }

  @media screen and (max-width: 1000px){
    .containerConcerts{
      grid-template-columns: repeat(1, 90%);
    }
  }

  .infoConcierto{
    border: 3px solid orange ;
    background-color: #fef2e1;
    height: 100%;
    transition: 1s;
    padding: 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-direction:column;
    color: black;
    font-family: Arial;
  }  

  .containerConcerts a{
    color: white;
    background-color: orange;
  }

  /* seccion video */
  .containerVideo{
    display: flex;
    align-items: center;

  }
  .videoSonoraInicio{
    border-radius:10px;
  }
  .izquierdaVideo{
    display: flex;
    justify-content: center;
    align-items: center;
    width: 163%;
    height: 100vh;
  }
  .derechaVideo{
    display: flex;
    flex-direction:column;
    text-align:center;
    width: 57%;
    border-radius: 10px;
    height: 400px;
    background-color: #a0e2e4;s
  }
</style>
<body>
  <section class="sectionNormal">
  </section>
  <section class="sectionConciertos">
    <div class="container">
      <?php
        if(isset($_POST['search']))
        {
          $valueToSearh = $_POST['valueToSearh']; 
          $query = "SELECT * FROM conciertos WHERE titulo LIKE '%".$valueToSearh."%' OR descripcion LIKE '%".$valueToSearh."%'";
          $result = filterRecord($query);
        }
        else
        {
          $query = "SELECT *FROM conciertos";
          $result = filterRecord($query);
        }
        
        function filterRecord($query)
        {
          include("admin\config.php");
          $filter_result = mysqli_query($mysqli, $query);
          return $filter_result;
        }
      ?>
      <form method="POST">
        <input type="search" name="valueToSearh" placeholder="Búsqueda">
        <button type="submit" class="signupbtn" name="search" >Buscar</button>
      </form>
      <div class="contenedorLista">
        <ul class="containerConcerts">
        <?php
        while($row = mysqli_fetch_array($result))
        {
          echo "<div class='infoConcierto'>";
            echo "<div>";
            echo "<h2>" . $row['titulo'] . "</h2>";
            echo "</div>";
            echo "<div>";
            echo "<p>" . $row['fechayHs'] . "</p>";
            echo "</div>";
            echo "<div>";
            echo "<a href='". $row['linkEntradas'] . "'>Entradas</a>";
            echo "</div>";
          echo "</div>";
        }
        echo "</ul>";
        ?>
      </div>
    </div>
  </section>
  <section class="sectionNormal">
    <div class="containerVideo">
      <div class="izquierdaVideo">
        <iframe width="95%" height="400"  class="videoSonoraInicio"src="https://www.youtube.com/embed/51EWmC1dPHs" title="Carnavalito triste - La Sonora de Martín" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
      </div>
      <div class="derechaVideo">
        <h2>Visita nuestras redes sociales! </h2>
        <a href="#">Instagram</a>
        <a href="#">Youtube</a>
        <a href="#">Spotify</a>
      </div>
    </div>
  </section>
  <section class="sectionNormal">


  </section>
</body>
</html>