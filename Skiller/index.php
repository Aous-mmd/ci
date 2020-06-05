
<?php ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skiller</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
    <main>
        <div class="waveWrapper waveAnimation">
            <div class="waveWrapperInner bgTop">
                <div class="wave waveTop"
                    style="background-image: url('http://front-end-noobs.com/jecko/img/wave-top.png')"></div>
                    <section class="logo">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-2">
                                    <img class="img-fluid" src="img/logo.png">
                                </div>
                                <div class="col-md-8">
                                    <p>
                                        <span>
                                            Skiller
                                        </span>
                                    </p>
                                </div>
                                <div class="col-md-2">
                                    <img class="img-fluid" src="img/logo.png">
                                </div>
                                <div class="offset-md-2"></div>
                                <div class="col-md-8">
                                    <div class="download-app">
                                        <div class="text-center">
                                            Download The application
                                        </div><br>
                                        <div class="ctn">
					    <form name="zips" action="" method="post">
					    	<input class="button b-pink" type="submit" id="submit" name="createzip" value="Download " >
                                            </form>    
				    </div>
                                    </div>
                                </div>
                                <div class="offset-md-2"></div>
                            </div>
                        </div>
                    </section>
            </div>
            <div class="waveWrapperInner bgMiddle">
                <div class="wave waveMiddle"
                    style="background-image: url('http://front-end-noobs.com/jecko/img/wave-mid.png')"></div>
            </div>
            <div class="waveWrapperInner bgBottom">
                <div class="wave waveBottom"
                    style="background-image: url('http://front-end-noobs.com/jecko/img/wave-bot.png')"></div>
            </div>
        </div>
    </main>
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>


<?php
// Get real path for our folder
$rootPath = realpath('/var/www/html/Skiller/files');

// Initialize archive object
$zip = new ZipArchive();
$zip->open('/var/www/html/Skiller/file.zip', ZipArchive::CREATE | ZipArchive::OVERWRITE);

// Create recursive directory iterator
/** @var SplFileInfo[] $files */
$files = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator($rootPath),
    RecursiveIteratorIterator::LEAVES_ONLY
);

foreach ($files as $name => $file)
{
    // Skip directories (they would be added automatically)
    if (!$file->isDir())
    {
        // Get real and relative path for current file
        $filePath = $file->getRealPath();
        $relativePath = substr($filePath, strlen($rootPath) + 1);

        // Add current file to archive
        $zip->addFile($filePath, $relativePath);
    }
}

// Zip archive will be created only after closing object
$zip->close();
$file = "/var/www/html/Skiller/file.zip";
header('Content-type: application/x-download');
header('Content-Disposition: attachment; filename="'.$file.'"');
header('Content-Length: '.filesize($file));
readfile($file);
?>



