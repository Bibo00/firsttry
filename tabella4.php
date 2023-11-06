<?php
    include 'test.php';
    if(!empty($_SESSION['es'])){
        $esercizi = null;
        $esercizi = $_SESSION['es'];
        $rep = $_SESSION['rep'];
        $recupero = $_SESSION['recu'];
        $nEsercizi = $_SESSION['numEsercizi'];
    ?>

<!DOCTYPE html>

<html>
    <head>
        <style>
            table, th, td {
            border:1px solid black;
        }
        </style>
    </head>
    <body>
        <table style="width: 35%; ">
            <tr>
                <td style="height: 40px;">esercizio</td>
                <td>serie</td>
                <td>recupero</td>
            </tr>
            <tr>
                <td>riscaldamento</td>
                <td>5'<td>
            </tr>
            <?php 
                foreach($esercizi as $musc => $es){
                    for($i = 0; $i < $nEsercizi[$musc]; $i++){?>  
                        <tr> 
                            <td>    
                                <?php echo $es[$i]; ?>
                            </td>
                            <td>
                                <?php echo  $rep[$musc][$i]?>
                            </td>
                            <td>
                                <?php echo  $recupero[$musc][$i]?>
                            </td>
                        </tr>
                    <?php
                    }
                }
            }?>
            <tr>
                <td>stretching</td>
                <td>5'<td>
            </tr>
        </table>
    </body>
</html>
