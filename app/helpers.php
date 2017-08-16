<?php

function vdump(...$param)
{
    foreach($param as $value) {
        dump($value);
    }

    exit;
}

/**
 * Renders view
 * @return [type] [description]
 */
function view($file, array $data = [])
{
    extract($data);

  require(sprintf('%s/../views/%s.php', __DIR__, $file));
}