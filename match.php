<?php
session_start();
$i=$_SESSION['id'];
$xml = simplexml_load_file("Books/Book{$i}.xml") or die("Error: Cannot create object");
        $title=$xml->title;
        $writer=$xml->writer;
        $about=$xml->about_the_Book;
        $url=$xml->picture->url;
        $description=$xml->picture->description;
        $number=$xml->pages->number;
?>
<html>
<head>
    <meta charset="utf-8">  
    <meta name="author" content="HAMZA BENJELLOUN & IMADEDDINE ELAASSALI G.INFO">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title><?php echo $title ; ?></title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="turnjs4\lib\turn.min.js"></script>
    <link rel="stylesheet" href="main_match.css">
    <style>
        body{
            font-family: serif;
            font-size:small;
        }
    </style>
</head>
<body>    
    <audio id="music" loop>
		<source src="Music_books/book<?php echo $i; ?>.mp3" type="audio/mp3">
    </audio>    
    <div id="flipbook">    
        <div class="hard" id="cover">
            <h1><?php echo $title ; ?></h1>
            <h5><?php echo $writer ; ?></h5>
        </div>
        <div class="hard" id="cover"></div>
        <div>
            <h1 class="black"><?php echo $title ; ?></h1>
            <h5 class="black"><?php echo $writer ; ?></h5>            
        </div>
        <div>
        </div>
        <div>            
            <p><?php echo $about ; ?></p>             
            <h2 align="center"><img src=<?php echo $url ; ?> width="250px" height="250px"></h2>
            <h6 align="center"><?php echo $description ; ?></h6>
        </div>
        <div>
        </div>
        <?php
        for ($i=1;$i<=$number;$i++){
            echo "<div>";
                foreach($xml->pages->page[($i-1)]->content->children() as $p){
                    echo "<p>".$p."</p>";
                }           
            echo "<h6 align='center'>".$i."</h6>";
            echo "</div>";
            echo "<div>";
            echo "</div>";
        }
        ?>
        <div class="Last">
            <h1 class="black" >The END</h1>
        </div>
        <div></div>        
        <div class="hard" id="cover" ></div>
        <div class="hard" id="cover" ></div>
    </div>
    <br/>
    <form action="traitement.php" method="post">
    <h4 align="center">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <button type="submit" name="Home" class="btn btn-light">
                                    Home
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-house-door" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                      <path fill-rule="evenodd" d="M7.646 1.146a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 .146.354v7a.5.5 0 0 1-.5.5H9.5a.5.5 0 0 1-.5-.5v-4H7v4a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .146-.354l6-6zM2.5 7.707V14H6v-4a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v4h3.5V7.707L8 2.207l-5.5 5.5z"/>
                                      <path fill-rule="evenodd" d="M13 2.5V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                                    </svg>
                                </button>                                 
                                <button type="submit" name="Library"  class="btn btn-dark">
                                    Library
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-book-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M15.261 13.666c.345.14.739-.105.739-.477V2.5a.472.472 0 0 0-.277-.437c-1.126-.503-5.42-2.19-7.723.129C5.696-.125 1.403 1.56.277 2.063A.472.472 0 0 0 0 2.502V13.19c0 .372.394.618.739.477C2.738 12.852 6.125 12.113 8 14c1.875-1.887 5.262-1.148 7.261-.334z"/>
                                    </svg>
                                </button>
                            </div>
                        </h4>
    </form>
    <script type="text/javascript">
        $("#flipbook").turn({     
            width: 612,
            height: 490,
            duration:2000
        });    
        var audio=document.getElementById("music");
	    audio.volume=1;		
	    document.addEventListener('mouseup', musicPlay);
        function musicPlay() {
	        document.getElementById('music').play();
            document.removeEventListener('mousemove', musicPlay);
        }
    </script>
</body></html>