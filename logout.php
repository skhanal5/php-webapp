<?php
session_start();
session_unset();
session_destroy();
file_get_contents("index.html")