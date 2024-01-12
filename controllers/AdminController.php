<?php

class AdminController
{
    public function actionIndex()
    {
        
        // Подключаем вид
        require_once(ROOT . '/views/admin/index.php');
        return true;
    }
}