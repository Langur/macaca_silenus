<?php
/**
 * Silenusのクラス
 *
 * Silenusにおける処理のコアとなります。
 * Modelの操作を行うためのクラスを定義します。
 * 
 * @copyright Copyright (c) 2017-2023 Akihisa ONODA
 * @license https://github.com/Langur/macaca_sylvanus/blob/main/LICENSE MIT
 * @link https://github.com/Langur/macaca_sylvanus#readme
 * @author Akihisa ONODA <akihisa.onoda@osarusystem.com>
 */

namespace Silenus;

/**
 * Silenusクラス
 *
 * Modelを操作するためのabstructクラス。
 * 
 * @category Silenus
 * @package  Silenus
 */
abstract class Silenus
{
    protected $parameter;
    const FLAG_NONE       = (0);
    const FLAG_PRIMARYKEY = (1 << 0);
    const FLAG_UNEDITABLE = (1 << 1);

    public function __construct()
    {
        $this->parameter = [];
    }
    
    // クラスを拡張するための処理
    public function __call($name, $args)
    {
        if (strncmp($name, 'get', 3) === 0) {
            return $this->get(substr($name, 3), reset($args));
        } 
        elseif (strncmp($name, 'set', 3) === 0) {
            return $this->set(substr($name, 3), reset($args));
        }
        elseif (strncmp($name, 'exec', 4) === 0) {
            return $this->exec(substr($name, 4), reset($args));
        }


        throw new \BadMethodCallException('Method "' . $name . '" does not exist.');
    }

    // クラスを拡張するための処理
    public function __set($key, $value)
    {
        $this->set($key, $value);
    }

    // クラスを拡張するための処理
    public function get($key, $default=null)
    {
        if (array_key_exists($key, $this->parameter)) {
              return $this->parameter[$key];
        }

        return $default;
    }

    // クラスを拡張するための処理
    public function set($key, $value)
    {
        $this->parameter[$key] = $value;
    }

    // クラスを拡張するための処理
    public function exec($key, $func=null)
    {
        $func();
    }

    /**
     * Table名を取得する。
     *
     * @return string | null
     */
    public function getTable()
    {
        if (array_key_exists('Table', $this->parameter)) {
              return DB_PREFIX . $this->parameter['Table'];
        }

        return null;
    }
}
