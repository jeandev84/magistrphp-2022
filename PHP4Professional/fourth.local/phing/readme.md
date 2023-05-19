https://phing.info
https://phing.info/guide/chunkhtml/ch04s02.html
https://phing.info/guide/chunkhtml
https://phing.info/guide/chunkhtml/ch06s06.html

# PHING используется для выполнения много команд или действия

$ php ./vendor/bin/phing

$ php ./vendor/bin/phing
Buildfile: /home/yao/Desktop/PHPSkills/Specialist/Magistrphp2022/PHP4Professional/fourth.local/monitoring/build.xml

monitoring > prepare:

     [echo] Making directory ./build

monitoring > build:

     [echo] Copying files to build directory...
     [echo] Copying ./index.php to ./build directory...
     [copy] index.php omitted, is up to date
     [echo] Copying ./test.php to ./build directory...
     [copy] test.php omitted, is up to date
     [echo] Copying ./contact.php to ./build directory...
     [copy] contact.php omitted, is up to date

monitoring > dist:

     [echo] Creating archive...
      [zip] Nothing to do: /home/yao/Desktop/PHPSkills/Specialist/Magistrphp2022/PHP4Professional/fourth.local/monitoring/build/build.zip is up to date.
     [echo] Files copied and compressed in build directory OK!

BUILD FINISHED

Total time: 0.0347 seconds

