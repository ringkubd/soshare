<?php

/**
 * @Author: anwar
 * @Date:   2018-01-02 12:28:30
 * @Last Modified by:   anwar
 * @Last Modified time: 2018-01-03 15:04:01
 */
Route::get('calculator', function(){
    echo 'Hello from the calculator package!';
});

Route::get('abc','Anwar\Soshare\SoshareController@soshare_script');