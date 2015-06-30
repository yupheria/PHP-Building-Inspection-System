<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');


function unique_salt() {  
    return substr(sha1(mt_rand()),0,22);  
} 