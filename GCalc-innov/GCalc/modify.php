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


    $_SESSION['modify'] = isset($_GET['modify']) ? $_GET['modify'] : null;

    if($_SESSION['modify'] !== null)
    {
           
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
            if($i != $_SESSION['modify'])
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
            else
            {

              
                echo "
                <tr>
                    <form action=\"modify-2.php\" method=\"get\">
                    <td> 
                        <input type=\"number\" name=\"d\" placeholder=\"Enter number \" required>
                    </td>
                        
                    <td>
                        <input type=\"number\" name=\"c\" placeholder=\"Enter number \" required>
                    </td>
                    <td>
                        <button type=\"submit\" class=\"button\">confirm</button>
                    </td>
                    <td> 
                        <p> <a href= ./modify.php?modify=$rownumber> Modifier </a> | <a href= ./suppress.php?suppress=$rownumber> Supprimer </a>
                    </td>
                    <td>
                    </td>
                </tr> 
                ";               
            }
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