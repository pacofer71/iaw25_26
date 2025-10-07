<?php
$opcionBuena=0;
do{
    echo "###### ** MENU PRINCIPAL ** #####\n";
    echo "1.- Ir a Documentos\n";
    echo "2.- Ir a Impresión\n";
    echo "3.- Guardar\n";
    echo "q.- Para salir\n";
    //pedimos la opcion
    $op=readline("Dame una opción (1, 2, 3, q): ");
    //echo "\n has escrito: $op";
    if(strtolower($op)=="q"){
        echo "\nHas elegido salir!!!";
        break;
    }
    $opcionBuena=(int) $op;
    if($opcionBuena<=0 || $opcionBuena>3 ){
        echo "\n Error, se esperaba un número entre 1 y 3 o 'q' para salir.!!!\n";
        //continue;
    }else{
        //la opcion ha sido 1, 2, o 3
        break;
    }
}while(true);
switch($opcionBuena){
    case 1: 
        echo "\nEntrando en documentos, la opcion elegida fue la 1";
        break;
    case 2: 
        echo "\nImprimiendo documentos, la opcion elegida fue la 2";
        break;
    case 3: 
        echo "\nGuardando documentos, la opcion elegida fue la 3";
        break;
    default:

}