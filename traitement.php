<?php
session_start();
if(isset($_POST['search'])){
    $v=0;
    $enter=$_POST['enter'];
    for($i=0;$i<3;$i++){
        $xml = simplexml_load_file("Books/Book{$i}.xml") or die("Error: Cannot create object");
        $title=$xml->title;
        $writer=$xml->writer;
        if($enter==$title || $enter==$writer ){
            $v=1;
            $id=$i;
        }        
    }
    if($v==1){    
        $_SESSION['id']=$id;
        header( "location:match.php" );
    }
    $f=0;
    for($i=0;$i<3;$i++){
        $xml = simplexml_load_file("Books/Book{$i}.xml") or die("Error: Cannot create object");
        foreach($xml->title_keywords->children() as $key){
            $key=strtolower($key);
            $enter=strtolower($enter);
            if($key==$enter){
                $f=1;
                if($i==0){
                    $_SESSION['book0']=1;
                }
                if($i==1){
                    $_SESSION['book1']=1;
                }
                if($i==2){
                    $_SESSION['book2']=1;
                }
            }
        }
        foreach($xml->writer_keywords->children() as $key){
            $key=strtolower($key);
            $enter=strtolower($enter);
            if($key==$enter){
                $f=1;
                if($i==0){
                    $_SESSION['book0']=1;
                }
                if($i==1){
                    $_SESSION['book1']=1;
                }
                if($i==2){
                    $_SESSION['book2']=1;
                }
            }
        }  
    }
    if($f==1){
        header("refresh:2;url=result.php");
    }
    else{
        $_SESSION['error']=1;
        header("location:Search.php");
    }
}
if(isset($_POST['biblio'])){
    header("location:biblio.php");
}
if(isset($_POST['zero'])){
    $_SESSION['id']=0;
    header("location:match.php");
}
if(isset($_POST['one'])){
    $_SESSION['id']=1;
    header("location:match.php");
}
if(isset($_POST['two'])){
    $_SESSION['id']=2;
    header("location:match.php");
}
if(isset($_POST['Home'])){
    session_destroy();
    header("location:Search.php");
}
if(isset($_POST['rate'])){
    header("location:rate.php");
}
if(isset($_POST['Library'])){
    header("location:biblio.php");
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
              <div class="carousel-item" data-interval="30000">
                <img  src="carousel/lib1.jpg" class="d-block w-100" >
                <div class="carousel-caption d-none d-md-block">
                  <h2 style="opacity:0.7;">A room without books is like a body without a soul</h2 style="opacity:0.7;">
                </div>
              </div>
              <div class="carousel-item" data-interval="30000">
                <img  src="carousel/lib2.jpg" class="d-block w-100" >
                <div class="carousel-caption d-none d-md-block">
                  <h2 style="opacity:0.7;">Good friends, good books, and a sleepy conscience: this is the ideal life</h2 style="opacity:0.7;">
                </div>
              </div>
              <div class="carousel-item active fixed" data-interval="30000">
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
                <input type="text" name="enter" class="form-control " placeholder="Enter the author's name or book's title" aria-describedby="button-addon2 " required>
                <div class="input-group-append">
                  <!--<button class="btn btn-success" name="search" type="submit" id="button-addon2" >Search</button>-->
                  <!--<button class="btn btn-success" name="search" type="submit" id="button-addon2" ><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span></button>-->
                  <!--<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>-->
                  <button class="btn btn-success" name="search" type="submit" id="button-addon2" >                                                                   
                     <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>                           
                  </button>
                </div>
            </div>
          </div>
          </form>
          <!--Input end-->          
    </body>
</html>