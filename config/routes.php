<?php

return array(
    'admin/update/([0-9]+)' => 'admin/update/$1',                  //actionUpdate в AdminController
    'admin/index' => 'admin/index',                                //actionIndex в AdminController
    'admin' => 'admin/login',                                      //Login в AdminController

    'tasks/create' => 'site/create',                               //actionCreate в SiteController
    'tasks/page-([0-9]+)' => 'site/view/$1',                       //actionView в SiteController
    'tasks' => 'site/view',                                        //actionView в SiteController
    '' => 'site/index'                                            //actionIndex в SiteController
);