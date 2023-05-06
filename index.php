<?php

spl_autoload_register(function ($className) {
    $namespace = str_replace("\\", "/", __NAMESPACE__);
    $className = str_replace("\\", "/", $className);
    $class = CORE_PATH . "/classes/" . (empty($namespace) ? "" : $namespace . "/") . "{$className}.class.php";
    include_once($class);
});
