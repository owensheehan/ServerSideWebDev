<! DOCTYPE HTML>
<html lang = "en">
    <head>
        <meta charset="UTF-8" />
        <title>good_isbn</title>
    </head>
    <body>
        <header>
            <h1>Result</h1>
        </header>
        <section>
            <p>
            <?php
                $isbn = str_replace(array('-','_',' '), '',$_POST['isbn']);
                echo $isbn;
                $len = strlen($isbn);
                $arrayisbn = str_split($isbn);
                if($len == 10){
                    if ($arrayisbn[9] == "x" || $arrayisbn[9] == "X"){
                        $arrayisbn[9] = 10;
                        $modarray = array(10,9,8,7,6,5,4,3,2);
                        mod11($arrayisbn,$modarray);
                    }
                    
                }elseif($len == 13){
                    $modarray = array(1,3,1,3,1,3,1,3,1,3,1,3);
                    mod10($arrayisbn,$modarray);
                }else{echo "Not correct format for ISBN";}
                

                function mod11 ($arrayisbn,$modarray){
                    $checksum = 0;
                    for ($i = 0; $i < 9; $i++ ){
                        $eq = $arrayisbn[$i]*$modarray[$i];
                        $checksum += $eq;
                     }
                    $checknum = $checksum%11;
                    $checknum = $checknum + $arrayisbn[9];
                    if ($checknum == 11){
                        echo " is a valid ISBN 10 number.";
                    }else{ echo " is not a valid ISBN number.";}
             
                    
                }
                function mod10 ($arrayisbn,$modarray){
                    $checksum = 0;
                    for ($i = 0; $i < 12; $i++ ){
                        $eq = $arrayisbn[$i]*$modarray[$i];
                        $checksum += $eq;
                    }
                    $checknum = $checksum%10;
                    $checknum = 10 - $checknum;
                    if ($checknum == 10){
                        $checknum = 0;
                    }
                    if ($checknum == $arrayisbn[12]){
                        echo " is a valid ISBN 13 number.";
                    }else{ echo " is not a valid ISBN number.";}
                    
                    
                }
            ?>
            </p>
        </section>
    </body>
</html>