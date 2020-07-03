<?php
session_start();
if(isset($_SESSION['error'])){
  echo '
  <div class="alert alert-danger" role="alert">
    Result not found please check again or enter the library directly
  </div>
  ';
  session_destroy();
  header("refresh:2;url=Search.php");
}
?>
<!DOCTYPE html>
<html>
    <head>      
        <meta charset="utf=8">        
        <meta name="author" content="HAMZA BENJELLOUN & IMADEDDINE ELAASSALI G.INFO">
        <title>Rechercher</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link rel="stylesheet" href="main.css">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="container-fluid-fluid">
        <!-- Carousel start-->    
        <div id="carouselExampleCaptions" class="carousel slide carousel-fade d-block " data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
              <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
              <div class="carousel-item active fixed" data-interval="30000">
                <img  src="carousel/lib1.jpg" class="d-block w-100" >
                <div class="carousel-caption d-none d-md-block">
                  <h2 style="opacity:0.7;">A room without books is like a body without a soul</h2 style="opacity:0.7;">
                </div>
              </div>
              <div class="carousel-item " data-interval="30000">
                <img  src="carousel/lib2.jpg" class="d-block w-100" >
                <div class="carousel-caption d-none d-md-block">
                  <h2 style="opacity:0.7;">Good friends, good books, and a sleepy conscience: this is the ideal life</h2 style="opacity:0.7;">
                </div>
              </div>
              <div class="carousel-item " data-interval="30000">
                <img  src="carousel/lib3.jpg" class="d-block w-100" >
                <div class="carousel-caption d-none d-md-block">
                  <h2 style="opacity:0.7;">Fairy tales are more than true: not because they tell us that dragons exist, but because they tell us that dragons can be beaten.</h2 style="opacity:0.7;">
                </div>
              </div>
            </div>
          </div>
          <!--carousel end-->
          <!--input start-->
          <form action="traitement.php" method="post">
            <div style="margin-top: 400px;" class="input-group mb-3 fixed-top w-50 ml-auto mr-auto">
                <input type="text" name="enter" class="form-control " placeholder="Enter the author's name or book's title" aria-describedby="button-addon2 " >
                <div class="input-group-append">
                  <!--<button class="btn btn-success" name="search" type="submit" id="button-addon2" >Search</button>-->
                  <!--<button class="btn btn-success" name="search" type="submit" id="button-addon2" ><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span></button>-->
                  <!--<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>-->
                  <div class="btn-group" role="group" aria-label="Basic example">
                    <button class="btn btn-success" name="search" type="submit" id="button-addon2" >                                                                   
                          <svg class="bi bi-search" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
                            <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
                          </svg>                                                          
                    </button>
                    <button class="btn btn-outline-success" name="biblio" type="submit" id="button-addon2" >                                                                   
                      <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-book" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M3.214 1.072C4.813.752 6.916.71 8.354 2.146A.5.5 0 0 1 8.5 2.5v11a.5.5 0 0 1-.854.354c-.843-.844-2.115-1.059-3.47-.92-1.344.14-2.66.617-3.452 1.013A.5.5 0 0 1 0 13.5v-11a.5.5 0 0 1 .276-.447L.5 2.5l-.224-.447.002-.001.004-.002.013-.006a5.017 5.017 0 0 1 .22-.103 12.958 12.958 0 0 1 2.7-.869zM1 2.82v9.908c.846-.343 1.944-.672 3.074-.788 1.143-.118 2.387-.023 3.426.56V2.718c-1.063-.929-2.631-.956-4.09-.664A11.958 11.958 0 0 0 1 2.82z"/>
                        <path fill-rule="evenodd" d="M12.786 1.072C11.188.752 9.084.71 7.646 2.146A.5.5 0 0 0 7.5 2.5v11a.5.5 0 0 0 .854.354c.843-.844 2.115-1.059 3.47-.92 1.344.14 2.66.617 3.452 1.013A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.276-.447L15.5 2.5l.224-.447-.002-.001-.004-.002-.013-.006-.047-.023a12.582 12.582 0 0 0-.799-.34 12.96 12.96 0 0 0-2.073-.609zM15 2.82v9.908c-.846-.343-1.944-.672-3.074-.788-1.143-.118-2.387-.023-3.426.56V2.718c1.063-.929 2.631-.956 4.09-.664A11.956 11.956 0 0 1 15 2.82z"/>
                      </svg>                                                       
                    </button>
                  </div>
                </div>
            </div>
          </div>
          </form>
          <!--Input end-->          
    </body>
</html>