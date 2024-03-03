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

    $_SESSION['c'] = isset($_GET['c']) ? $_GET['c'] : null;
    $_SESSION['d'] = isset($_GET['d']) ? $_GET['d'] : null;

    if($_SESSION['c'] !== null && $_SESSION['d'] !== null)
    {
        $_SESSION['table'][$_SESSION['modify']] = $_SESSION['d'];
        $_SESSION['multiplicator'][$_SESSION['modify']] = $_SESSION['c'];
        $_SESSION['result'][$_SESSION['modify']] = $_SESSION['table'][$_SESSION['modify']] * $_SESSION['multiplicator'][$_SESSION['modify']];

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

        echo"
        <a href= ./index.php?a={$_SESSION['a']}&b={$_SESSION['b_2']}>reset</a>
    ";

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