<html> <head> <title> Setup Removal-BitSell </ title> <body>
<?php
/**
* Deletes all files in the current folder and each subfolder, with the exception of script
* Based on a snippet: <a
*/
define ('DS', DIRECTORY_SEPARATOR);
error_reporting (E_ALL);
ini_set ('display_errors', 'On');
$ script_name = basename (__FILE__);
$ directory = dirname (__FILE__);
echo '<h1> Deleting all files and sub-folder'. $ directory. '</ h1>';
$it = new RecursiveDirectoryIterator($directory);
foreach (new RecursiveIteratorIterator($it, RecursiveIteratorIterator::CHILD_FIRST) as $file) {
if (($ file-> isDir ()) && (! in_array ($ file-> getFilename (), array ('.', '..')))) {
echo '<h3> Deleting file'. $ file-> getPathname (). '</ h3>';
@ rmdir ($ file-> getPathname ());
} else {
if (($ file-> isFile ()) && ($ file-> GetPathName ()! = __FILE__)) {
echo '<p> Deleting file'. $ file-> getPathname (). </ p> ';
@ unlink ($ file-> getPathname ());           
}
}
} // foreach
echo 'Deleting <h4 style="color:black;"> completed. There remains only the '. $ Script_name. " in the folder. 
If you need to update anything, re-upload the files for the setup or manually configure the setup in /includes/configuration.php. 
To start using your BitSell ATM, visit <?php echo "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']; ?>/bitsellatm/.</ h4> ';
?>
</body></html>
