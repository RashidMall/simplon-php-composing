<?php 
    /* Create an array of associative arrays with the 
    first row column headers as the keys.*/
    $mycsv = array_map('str_getcsv', file('cs_figures.csv'));
    array_walk($mycsv, function(&$a) use ($mycsv){
        $a = array_combine($mycsv[0], $a);
    });
    array_shift($mycsv);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Composing</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/1.11.8/semantic.min.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/1.11.8/semantic.min.js"></script>
</head>
<body>
    <h1>Computer science figures</h1>
    <div class="ui link cards">
        <?php 
            foreach($mycsv as $person){
                echo "<div class=\"ui card\">";
                echo    "<div class=\"image\">";
                echo        "<img src=\"".$person['picture']."\">";
                echo    "</div>";
                echo    "<div class=\"content\">";
                echo        "<a class=\"header\">".$person['name']."</a>";
                echo        "<div class=\"meta\">";
                echo            "<span class=\"date\">".ucfirst($person['title'])."</span>";
                echo        "</div>";
                echo        "<div class=\"description\">";
                echo            ucfirst($person['role']);
                echo        "</div>";
                echo    "</div>";
                echo    "<div class=\"extra content\">";
                echo        "<span class=\"right floated\">";
                echo            "Born in " . ucfirst($person['birthyear']);
                echo        "</span>";
                echo    "</div>";
                echo "</div>";          
            }
        ?>
    </div>
</body>
</html>