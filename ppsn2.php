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
                $ppsn = str_replace(array('-','_',' '), '',$_POST['ppsn']);
                $ppsn = trim($ppsn);
                $len = strlen($ppsn); 
                $okay = TRUE;
                echo $ppsn;
                if ($len > 9) {
                    echo " This is not the correct lenght to be a valid pesel.";
                    $okay = FALSE;
                }elseif($len < 8 ){
                    echo " This is not the correct lenght to be a valid pesel.";
                    $okay = FALSE;
                }
                if ($okay == TRUE){
                    $arrayppsn = str_split($ppsn);
                    calc($arrayppsn,$len);
                }
                function calc ($arrayppsn,$len){
                    $checksum = 0;
                    $calc = array(8,7,6,5,4,3,2);
                    for ($i = 0; $i <= 6; $i++ ){
                        $eq = $arrayppsn[$i]*$calc[$i];
                        $checksum = $checksum + $eq;
                    } 
                    $checknum = $checksum%23;
                    $eight = strtoupper($arrayppsn[7]);
                    $eight = ord($eight)-64;
                    if ($checknum == $eight){
                        echo " Valid ppsn number.";
                    }else{ echo " Invalid ppsn number.";}

                }
                function calc9 ($arrayppsn,$len){
                    $checksum = 0;
                    $calc = array(8,7,6,5,4,3,2);
                    for ($i = 0; $i <= 6; $i++ ){
                        $eq = $arrayppsn[$i]*$calc[$i];
                        $checksum = $checksum + $eq;
                    } 
                    $ninth = strtoupper($arrayppsn[8]);
                    $ninth = ord($ninth)-64;
                    $ninth = $ninth * 9;
                    $checksum = $checksum + $ninth;
                    $checknum = $checksum%23;
                    $eight = strtoupper($arrayppsn[7]);
                    $eight = ord($eight)-64;
                    if ($checknum == $eight){
                        echo " Valid ppsn number.";
                    }else{ echo " Invalid ppsn number.";}

                }
            ?>
            </p>
        </section>
    </body>
</html>