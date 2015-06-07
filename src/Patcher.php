<?php

namespace Clue\JsonMergePatch;

class Patcher
{
    public function patch($target, $patch)
    {
        if (!$this->isObject($patch)) {
            return $patch;
        }

        if (!$this->isObject($target)) {
            $target = (object)array();
        }
        foreach ($patch as $name => $value) {
            if ($value === null) {
                unset($target->$name);
            } else {
                if (!isset($target->$name)) {
                    $target->$name = null;
                }
                $target->$name = $this->patch($target->$name, $value);
            }
        }
        return $target;
    }

    private function isObject($var)
    {
        return is_object($var);
        /*if (is_object($var) || $var === array()) {
            return true;
        }
        if (!is_array($var)) {
            return false;
        }
        $expected = 0;
        foreach ($var as $key => $unused) {
            if ($key !== $expected++) {
                return true;
            }
        }
        return false;*/
    }
}
