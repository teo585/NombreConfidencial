<?php


    $dependencia = \App\Dependencia::All();
    // print_r($dependencia);
    // exit;
    $row = array();

    foreach ($dependencia as $key => $value) 
    {  
        $row[$key][] = '<a href="dependencia/'.$value['idDependencia'].'/edit">'.
                            '<span class="glyphicon glyphicon-pencil"></span>'.
                        '</a>&nbsp;'.
                        '<a href="dependencia/'.$value['idDependencia'].'/edit?accion=eliminar">'.
                            '<span class="glyphicon glyphicon-trash"></span>'.
                        '</a>';
        $row[$key][] = $value['idDependencia'];
        $row[$key][] = $value['codigoDependencia'];
        $row[$key][] = $value['nombreDependencia'];
        $row[$key][] = $value['abreviaturaDependencia'];    
    }

    $output['aaData'] = $row;
    echo json_encode($output);
?>