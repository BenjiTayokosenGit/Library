<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">  
        <meta name="author" content="HAMZA BENJELLOUN & IMADEDDINE ELAASSALI G.INFO">
        <title>Biblio</title>        
        <link rel="stylesheet" href="Biblio.css">   
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">     
    </head>
    <body>
        <form action="traitement.php" method="post">
        <h1>
            <table cellspacing="20px" cellpadding="20px" >
                <tr><td></td><td><u><h1 align="center">Results</h1></u></td><td></td></tr>
                <tr>
                    <td>
                        <?php
                        if(isset($_SESSION['book0'])){
                            echo '<input class="image0" name="zero" type="submit" value="">';
                        }
                        else{
                            echo '<img src="Img_books/x.png" width=300px height=500px>';
                        }
                        ?>                        
                    </td>
                    <td>
                        <?php
                        if(isset($_SESSION['book1'])){
                            echo '<input class="image1" name="one" type="submit"  value="">';
                        }
                        else{
                            echo '<img src="Img_books/x.png" width=300px height=500px>';
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        if(isset($_SESSION['book2'])){
                            echo '<input class="image2" name="two" type="submit"  value="">';
                        }
                        else{
                            echo '<img src="Img_books/x.png" width=300px height=500px>';
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>                                                    
                    </td>
                    <td>
                        <h4 align="center">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <button type="submit" name="Home" class="btn btn-light">
                                    Try again ?
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-house-door" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                      <path fill-rule="evenodd" d="M7.646 1.146a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 .146.354v7a.5.5 0 0 1-.5.5H9.5a.5.5 0 0 1-.5-.5v-4H7v4a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .146-.354l6-6zM2.5 7.707V14H6v-4a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v4h3.5V7.707L8 2.207l-5.5 5.5z"/>
                                      <path fill-rule="evenodd" d="M13 2.5V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                                    </svg>
                                </button>                                                                 
                            </div>
                        </h4>
                    </td>
                    <td>                            
                    </td>
                </tr>
            </table>
            </form>
        </h1>        
    </body>
</html>