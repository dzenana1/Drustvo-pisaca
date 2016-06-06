<?php

session_start();

if (isset($_SESSION['username']))
{
    print "OK";
}
else
    print "BAD";