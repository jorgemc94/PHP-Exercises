<?php
    require_once('./setup.php');
    echo $blade->run('rooms',array('rooms'=>$rooms));