<?php
// Example 1:
// create new Phar
$phar = new Phar('lemon.phar');
$phar->startBuffering();
$phar->addFromString('test.txt', 'text');
$phar->setStub('<?php __HALT_COMPILER(); ? >');

// add object of any class as meta data
class AnyClass {}
$object = new AnyClass;
$object->data = 'Chanh';
$phar->setMetadata($object);
$phar->stopBuffering();


/*
and read it by:
class AnyClass {
    function __destruct() {
        echo $this->data;
    }
}
*/

// output: Chanh
file_get_contents('phar://test.phar');


// Example 2
$filename = "default";
$dir = "./";
$regex = "/^(?!.*build\\.php)(?:.*)$/";
$main = "main.php";
$shebang = "#!/usr/bin/env php";
$chmod = true;

for ($i = 0; $i < $argc; $i++) {
    switch ($argv[$i]) {
        case "-o":
            $i++;
            if ($i >= $argc) {
                echo "Missing output file name" . PHP_EOL;
                exit(1);
            }
            $filename = $argv[$i];
            break;
        case "-i":
            $i++;
            if ($i >= $argc) {
                echo "Missing input directory name" . PHP_EOL;
                exit(1);
            }
            $dir = $argv[$i];
            break;
        case "-p":
            $i++;
            if ($i >= $argc) {
                echo "Missing regular expression pattern" . PHP_EOL;
                exit(1);
            }
            $regex = $argv[$i];
            break;
        case "-m":
            $i++;
            if ($i >= $argc) {
                echo "Missing main file" . PHP_EOL;
                exit(1);
            }
            $main = $argv[$i];
            break;
        case "-b":
            $i++;
            if ($i >= $argc) {
                echo "Missing shebang of file" . PHP_EOL;
                exit(1);
            }
            $shebang = $argv[$i];
            break;
        case "--no-chmod":
            $chmod = false;
            break;
    }
}
if (file_exists($filename)) unlink($filename);
$phar = new Phar($filename);
$phar->buildFromDirectory($dir, $regex);
$phar->setStub(($shebang ? $shebang . PHP_EOL : "") . $phar->createDefaultStub($main));
if ($chmod) {
    chmod($filename, fileperms($phar) | 0700);
}



// Example 3:

class BuildPhar
{
    private $_sourceDirectory = null;
    private $_stubFile        = null;
    private $_outputDirectory = null;
    private $_pharFileName    = null;

    /**
     * @param $_sourceDirectory       // This is the directory where your project is stored.
     * @param $stubFile               // Name the entry point for your phar file. This file have to be within the source
     *                                   directory.
     * @param null $_outputDirectory  // Directory where the phar file will be placed.
     * @param string $pharFileName    // Name of your final *.phar file.
     */
    public function __construct($_sourceDirectory, $stubFile, $_outputDirectory = null, $pharFileName = 'myPhar.phar') {

        if ((file_exists($_sourceDirectory) === false) || (is_dir($_sourceDirectory) === false)) {
            throw new Exception('No valid source directory given.');
        }
        $this->_sourceDirectory = $_sourceDirectory;

        if (file_exists($this->_sourceDirectory.'/'.$stubFile) === false) {
            throw new Exception('Your given stub file doesn\'t exists.');
        }

        $this->_stubFile = $stubFile;

        if(empty($pharFileName) === true) {
            throw new Exception('Your given output name for your phar-file is empty.');
        }
        $this->_pharFileName = $pharFileName;

        if ((empty($_outputDirectory) === true) || (file_exists($_outputDirectory) === false) || (is_dir($_outputDirectory) === false)) {

            if ($_outputDirectory !== null) {
                trigger_error ( 'Your output directory is invalid. We set the fallback to: "'.dirname(__FILE__).'".', E_USER_WARNING);
            }

            $this->_outputDirectory = dirname(__FILE__);
        } else {
            $this->_outputDirectory = $_outputDirectory;
        }

        $this->prepareBuildDirectory();
        $this->buildPhar();
    }

    private function prepareBuildDirectory() {
        if (preg_match('/.phar$/', $this->_pharFileName) == FALSE) {
            $this->_pharFileName .= '.phar';
        }

        if (file_exists($this->_pharFileName) === true) {
            unlink($this->_pharFileName);
        }
    }

    private function buildPhar() {
        $phar = new Phar($this->_outputDirectory.'/'.$this->_pharFileName);
        $phar->buildFromDirectory($this->_sourceDirectory);
        $phar->setDefaultStub($this->_stubFile);
    }
}
//END Class

//Example Usage:
$builder = new BuildPhar(
    dirname(__FILE__).'/_source',
    'my_default_stub.php',
    dirname(__FILE__).'/_output',
    'my-phar-file.phar'
);


// Example 4:
/*
include 'phar://ArPHP.phar/Arabic.php';
$obj = new I18N_Arabic('Numbers');

echo $obj->int2str(1975);
*/
?>