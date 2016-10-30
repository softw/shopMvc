<?php

/**
 * Created by PhpStorm.
 * User: eduardo
 * Date: 30/10/16
 * Time: 04:16 PM
 */
class homeController
{
    public function index($params = null)
    {
        echo "felicidades estas en home controller";
    }

    public function show($id)
    {
        echo "estas en homecontroller show : ". $id;
    }
}