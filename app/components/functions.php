<?php

/**
 * Debug function
 * @param mixed $data
 * @param boolean $die
 */
function pre($data, $die = true) {
    header('Content-Type:text/html;charset=UTF-8');
    if (is_bool($data) || empty($data)) {
        var_dump($data);
    } else if (is_string($data)) {
        print_r($data);
    } else {
        echo '<pre>';
        print_r($data);
        echo '</pre>';
    }
    $die && die;
}

/**
 * 
 * @param mixed $data
 * @param int $code
 * @param array $ext
 * @return json
 */
function response($data, $code = 200, $ext = []) {
    if (is_string($data) || empty($data)) {
        $response['message'] = $data;
    } else {
        $response['data'] = $data;
    }
    $response['code'] = $code;
    if (!empty($ext) && is_array($ext)) {
        $response = array_merge($response, $ext);
    }
    return json_encode($response);
}

/**
 * List sub-directories
 * @param string $path
 * @return array
 */
function directory($path) {
    if (!is_dir($path)) {
        return false;
    }
    $subs = [];
    opendir($path);
    while ($sub = readdir()) {
        if ($sub !== '.' && $sub !== '..' && is_dir($path . '/' . $sub)) {
            $subs[] = $sub;
        }
    }
    return $subs;
}

function getExtendModules() {
    $dirs = directory(__APP__ . '/modules/');
    $modules = null;
    foreach ($dirs as $dir) {
        $modules[$dir] = [
            'class' => 'app\modules\\' . $dir . '\Module',
        ];
    }
//    pre($modules);
    return $modules;
}
