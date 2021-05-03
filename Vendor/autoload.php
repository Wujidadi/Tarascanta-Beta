<?php

/*
|--------------------------------------------------------------------------
| Autoload
|--------------------------------------------------------------------------
|
| Simplify and improve the usage of include/require and "use" by PHP's
| spl_autoload_register function.
|
*/

spl_autoload_register(function($_path)
{
    $namespace = '';
    $className = '';

    /* 去除傳入路徑最左邊的反斜線 */
    $path = ltrim($_path, '\\');

    /* 取得最後一個反斜線之前的部分（資料夾路徑）及 class 名稱（檔名） */
    if ($lastBackslash = strrpos($path, '\\'))
    {
        $namespace = substr($path, 0, $lastBackslash);
        $className = substr($path, $lastBackslash + 1);
    }

    /* 解析 class 路徑錯誤時，拋出程式碼中實際出現的 class 名稱 */
    if ($namespace == '' && $className == '')
    {
        throw new Exception($_path, 1);
    }

    /* 組裝路徑 */
    $path = empty($namespace)
          ? $className . '.php'
          : $namespace . DIRECTORY_SEPARATOR . $className . '.php';

    /* 變更路徑分隔符 */
    switch (DIRECTORY_SEPARATOR)
    {
        case '/':
            $path = BASE_DIR . DIRECTORY_SEPARATOR . preg_replace('/\\\/', DIRECTORY_SEPARATOR, $path);
            break;

        case '\\':
            $path = BASE_DIR . DIRECTORY_SEPARATOR . preg_replace('/\//', DIRECTORY_SEPARATOR, $path);
            break;
    }

    /* 引用檔案 */
    require_once $path;
});
