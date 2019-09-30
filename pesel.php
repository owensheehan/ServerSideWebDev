<! DOCTYPE HTML>
<html lang = "en">
    <head>
        <meta charset="UTF-8" />
        <title>good_pesel</title>
    </head>
    <body>
        <header>
            <h1>Result</h1>
        </header>
        <section>
            <p>
            <?php
                $pesel = str_replace(array('-','_',' '), '',$_POST['pesel']);
                $len = strlen($pesel); 
                $okay = TRUE;
                echo $pesel;
                if ($len > 11) {
                    echo " This is not the correct lenght to be a valid pesel.";
                    $okay = FALSE;
                }elseif($len < 11 ){
                    echo " This is not the correct lenght to be a valid pesel.";
                    $okay = FALSE;
                }
                if ($okay == TRUE){
                    $arraypesel = str_split($pesel);
                    calc($arraypesel);
                }
                function calc ($arraypesel){
                    $checksum = 0;
                    $calc = array(1,3,7,9,1,3,7,9,1,3);
                    for ($i = 0; $i <= 9; $i++ ){
                        $eq = $arraypesel[$i]*$calc[$i];
                        $checksum = $checksum + $eq;
                    } 
                    $checknum = $checksum%10;
                    if ($checknum == 0){
                        if ($checknum == $arraypesel[10]){
                            echo " is a valid pesel.";
                        }else{echo " is not a valid pesel.";}
                    }elseif($checknum == 5){
                        if ($checknum == $arraypesel[10]){
                            echo " is a valid pesel.";
                        }else{echo " is not a valid pesel.";}
                    }else{
                        $checknum = 10-$checknum;
                        if ($checknum == $arraypesel[10]){
                            echo " is a valid pesel.";
                        }else{echo " is not a valid pesel.";}
                    }

                }
               
            ?>
            </p>
        </section>
    </body>
</html>