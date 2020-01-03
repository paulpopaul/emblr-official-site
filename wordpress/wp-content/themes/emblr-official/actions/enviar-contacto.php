<?php


    // Campos del formulario como Array para iterar:
    $campos = array(
        'nombre'     => $_POST[ 'nombre' ],
        'email'      => $_POST[ 'email' ],
        'consulta'   => $_POST[ 'consulta' ]
    )

    ;
    

    // Si hay algún campo vacío se muestra mensaje y se sale de la ejecución:
    foreach ( $campos as $campo => $valor ) :

        if ( ! $valor ) :

            echo "falta $campo";
            exit;

        endif;

    endforeach

    ;
    

    // Se extraen claves del Array en variables independientes:
    extract( $campos )
    
    ;


    // Se procede con la validación de los campos: email
    if ( false === filter_var( $email, FILTER_VALIDATE_EMAIL ) ) :

        echo 'email no válido';
        exit;
        
    endif
    
    ;
    
    // Se procede con la validación de los campos: consulta
    if ( strlen( $consulta ) < 15 or strlen( $consulta ) > 150 ) :

        echo 'consulta debe contener min. 15 y max. 150 caracteres';
        exit;

    endif
    
    ;


    // Se pasa validación + requisitos y se juntan campos:
    $from       =& $email;
    $to         = 'hola@ensambler.cl';
    $subject    = 'Hola';
    $message    =& $consulta;

    $headers    = "From: $from";

    // Se envía el mensaje y se almacena resultado en variable:
    $send_result = mail( $to, $subject, $message, $headers )
    
    ;

    if ( true === $send_result )
        echo 'OK';

    else
        echo 'Error en función mail(): false'
    ;


?>