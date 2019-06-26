<?php

/**
  определение функций для TWIG
 */
$function = new Twig_SimpleFunction('getUsersSite', function ( $db, string $folder = '' ) {

    if ($folder == '')
        $folder = \Nyos\Nyos::$folder_now;

    $ff = $db->prepare('SELECT * FROM `gm_user` WHERE `folder` = :folder ');
    $ff->execute(array(':folder' => $folder));

    $re = [];

    while ($e = $ff->fetch()) {
        $re[$e['id']] = $e;
    }

    return $re;
});
$twig->addFunction($function);
