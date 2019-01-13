<?php

class Pagination 
{
    
    public function paginate($start)
    {
         
        $commentsPerPage = 5;




        // echo $page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // ternaire
        // if(isset($_GET['page'])) {
        //     $currentPage = intval($_GET['page']);
        //     if($currentPage < $commentsPerPage){ 
        // } else {
        //     $page = 1;
        // }
        // // echo $page;
        
        // if(isset($_GET['per-page']) && $_GET['per-page'] <= 50) {
        //     $perPage = $_GET['per-page'];
        // } else {
        //     $perPage = 5;
        // }
        // echo $perPage;

        /**
         * Positionnement de la page
         */
        // $start = ($page > 1) ? ($page * $perPage) - $perPage : 0;
        // var_dump($start);
        // if($page > 1) {
        //     $start = ($page * $perPage);
        // } else {
        //     $start = 0;
        // }
        // echo $start;
    }
}