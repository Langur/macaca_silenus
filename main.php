<?php

namespace Silenus;

/**
 * Silenusの初期化処理。
 *
 * @param Kernel $kernel
 * @param array $param
 * @return true
 */
function init() {
    require_once MODPATH . 'silenus/silenus.php';
    foreach (glob(MODPATH . '*/*Model.php') as $path) {
        require_once $path;
    }
}
