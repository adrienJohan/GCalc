<?php

    session_start();

    echo "<!DOCTYPE html>
    <html lang=\"en\">
    <head>
        <meta charset=\"UTF-8\">
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
        <title>Document</title>
        <link href=\"result.css\" rel=\"stylesheet\"> 
    </head>
    ";

    $_SESSION['a'] = isset($_GET['a']) ? $_GET['a'] : null;
    $_SESSION['b'] = isset($_GET['b']) ? $_GET['b'] : null;
    $_SESSION['b_2'] = $_SESSION['b'];

    
    if($_SESSION['a'] !== null && $_SESSION['b'] !== null)
    {
        for($i=0;$i<$_SESSION['b'];$i++)
        {
            $_SESSION['table'][$i] = $i+1;
            $_SESSION['multiplicator'][$i] = $_SESSION['a'];
        }
        for($i=0;$i<$_SESSION['b'];$i++)
        {
            $_SESSION['result'][$i] = $_SESSION['table'][$i] * $_SESSION['multiplicator'][$i];
        }

        echo"
            <a href=\"forms.html\">get back to forms</a>
        ";

        echo "<table>
                    <tr>
                        <th> table </th>
                        <th> multiplied by </th>
                        <th> result </th>
                        <th> actions </th>
                    </tr>
        ";

        for($i = 0; $i < $_SESSION['b'] ; $i++)
        {
            $rownumber = $i;
            echo "
                    <tr>
                        <td> {$_SESSION['table'][$i]} </td>
                        <td> {$_SESSION['multiplicator'][$i]} </td>
                        <td> {$_SESSION['result'][$i]}</td>
                        <td> 
                            <p> <a href= ./modify.php?modify=$rownumber> Modifier </a> | <a href= ./suppress.php?suppress=$rownumber> Supprimer </a>
                        </td>
                    </tr>
                    
            ";
        }
        echo "</table>";
    }
    else
    {
        echo "
            <p>error: undefined parameters</p>
        ";  
    }


    echo "</body>
          </html>
    ";

?>