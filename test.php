
<?php
    session_start();
    include 'conn_test.php';
    $nEsercizi = 0;
    $tempoTot = 60; 
    $esercizio = array(); 
    $muscoli = array('petto' => 20, 'schiena' => 20, 'gambe' => 35, 'spalle' => 10, 'bicipiti' => 6, 'tricipiti' => 9);
    function somma($ar, $tempotot, $arrEs){
        $somma = 0;
        if(!empty($ar)){
            foreach($ar as $musc){
                $somma += $arrEs[$musc];
            }
        }
        return $somma;
    }
    function tempoEs($muscolo, $arrEs, $tempotot, $somma){
        $tempoEs = (($tempotot * $arrEs[$muscolo])/$somma);
        $tempoEs *=  0.3;
        return $tempoEs;
    }
    function clear($ar) {
        foreach ($ar as $key => $value) {
            unset($ar[$key]);
        }
    }
    
    
          
                
                
    if(isset($_POST['checklist'])){
        $somma = somma($_POST['checklist'], $tempoTot, $muscoli);
        foreach($_POST['checklist'] as $musc){
            $tempoMusc[$musc] = tempoEs($musc, $muscoli, $tempoTot, $somma);
            echo $tempoMusc[$musc];
        }
        foreach($_SESSION['es'] as $key => $val){
            unset($_SESSION['es'][$key]);
        }
        foreach($tempoMusc as $musc => $val){
            $nEsercizi = $val/4;
            $_SESSION['numEsercizi'][$musc] = $nEsercizi;
            $sql = "SELECT * FROM " . $musc;
            $result = $conn -> query($sql);
            if($result -> num_rows > 0){
                if($nEsercizi > 1 or $musc == 'petto' or $musc == 'schiena' or $musc == 'gambe'){
                    $ids[0] = 1;
                    $randnum = rand(1,2);
                    if($randnum == 1){
                        $ids[1] = 3;
                    } else {
                        $ids[1] = 2;
                    }
                    for($i = 2; $i < $nEsercizi; $i++){
                        $ids[$i] = rand(4, $result -> num_rows);
                        for($j = 2; $j < $i; $j++){
                            if($ids[$i] == $ids[$j]){
                                $i--;
                                break;
                            }
                        }
                    }
                } else {
                    for($i = 0; $i < $nEsercizi; $i++){
                        $ids[$i] = rand(1, $result -> num_rows);
                        for($j = 0; $j < $i; $j++){
                            if($ids[$i] == $ids[$j]){
                                $i--;
                                break;
                            }
                        }
                    }
                }
            } else {
                echo 'connessione non riuscita';
            }
            $j = 0;
            
            for($i = 0; $i < $nEsercizi; $i++){
                $sql = "SELECT * FROM " . $musc . " WHERE id = " . $ids[$j];
                $result = $conn -> query($sql);
                if($result -> num_rows > 0){
                    $row = $result -> fetch_assoc();
                    $j++;
                    $_SESSION['id'][$i] = $row["id"];
                    $_SESSION['es'][$musc][$i] = $row['esercizi'];
                    $_SESSION['rep'][$musc][$i] = $row['serie'];
                    $_SESSION['recu'][$musc][$i] = $row['recupero'];
                    if($muscoli[$musc] >= 20){
                        if($val >= 20 && $row['esercizi_secondari']){
                            $i++;
                            $_SESSION['es'][$musc][$i] = $row['esercizi_secondari'];
                            $_SESSION['rep'][$musc][$i] = $row['rep_es_sec'];
                        }
                    }        
                } else {
                    echo 'connessione non riuscita';
                }
            } 
        }
        header('Location: tabella4.php');
        exit();
    }
?>