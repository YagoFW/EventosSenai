<?php
session_start();

if($_SERVER['REQUEST_METHOD']=='POST'){
    if (!isset($_SESSION['inscritos'])){
    $_SESSION['inscritos']=[];
}
    if($evento['status'] !=="Ativo"){
    echo "Não é possível se inscrever ao evento, pois o mesmo está inativo.";
}

$total_inscritos_eventos=0;
foreach($_SESSION['inscritos'] as $inscrito){
    if($inscrito['eventoId']===$eventoId){
        $total_inscritos_eventos++;
    }
if($total_inscritos_eventos>$evento['vagas']){
    echo "não é possível se inscrever no evento, pois a capacidade de vagas seria excedida";
}
}
foreach($_SESSION['inscritos'] as $inscrito){
    if($inscrito['eventoId']==$eventoId && $inscrito['email']==$email);
    echo "Já existe um email inscrito nesse evento..";
};
}

?>