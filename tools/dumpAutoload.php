<?php

/*
|--------------------------------------------------------------------------
| 建構 autoload class map
|--------------------------------------------------------------------------
|
| 依 autoload.json 中的頂層資料夾重命名及排除規則，
| 建構 autoload class map。
|
*/

require_once '_startup.php';

$autoloadConf   = BASE_DIR . DIRECTORY_SEPARATOR . 'autoload.json';
$autoloadJson   = file_get_contents($autoloadConf);
$autoloadMap    = json_decode($autoloadJson, true);
$autoloadTopDir = $autoloadMap['top'];
$autoloadExcept = $autoloadMap['exception'];

$classMap = "<?php\n\nreturn " . var_export(traverse($autoloadTopDir, BASE_DIR . DIRECTORY_SEPARATOR, $autoloadExcept), true) . ";\n";
$mapFile  = VENDOR_DIR . DIRECTORY_SEPARATOR . 'autoload_map.php';
file_put_contents($mapFile, $classMap);


/*
| 輔助函數
*/

/**
 * Traverse given directories with base path.
 *
 * @param  array   $dir        Array of directories to traverse
 * @param  string  $base       Base path of the directories
 * @param  array   $exception  Directories and files to exclude
 * @return array               Array of class map
 */
function traverse($dir, $base = '', $exception = [])
{
    # Combine the exception array (with strange characters to avoid accidental matching) 
    # as a string to enhance the performance of Regex matching
    $exceptions = ';;;' . implode(';;;', $exception);

    $map = [];

    # "n" for New/Namespace, "o" for Old/Original
    foreach ($dir as $nDir => $oDir)
    {
        $entity = glob($base . $oDir . '*', GLOB_MARK);

        $subDir = [];

        foreach ($entity as $subEnt)
        {
            # "r" for Relative. Remove the base path from the full path of the sub-entity
            $rPath = str_replace($base, '', $subEnt);

            # "n" for Namespace
            $nPath = preg_replace(
                [
                    '/^' . str_replace('/', '\/', $oDir) . '/',    // Rename the path with the translating namespace key difined in autoload.json
                    '/\.php$/',                                    // Remove trailing extension name of PHP
                    '/\/$/'                                        // Convert trailing slash to backslash
                ],
                [
                    $nDir,
                    '',
                    '\\'
                ],
                $rPath
            );

            # Recursively handle the sub-entity if it is a directory
            if (is_dir($subEnt))
            {
                # Exclude the excepting directories
                $pattern = '/;;;' . str_replace('/', '\/', $rPath) . '/';    // Make the relative path string a Regex pattern
                if (!preg_match_all($pattern, $exceptions))
                {
                    $subDir[$nPath] = $rPath;
                }
            }
            # File
            else
            {
                $map[$nPath] = $rPath;
            }
        }

        $map = array_merge($map, traverse($subDir, BASE_DIR . DIRECTORY_SEPARATOR, $exception));
    }

    ksort($map);
    return $map;
}
