<?php

use App\Models\Category;

function getTrendingCategories(){
    $categories = Category::trending()->select('title', 'slug')->get();
    return $categories;
}

function getCategories($limit = null){
    $query = Category::active();
    if($limit){
        $query->limit($limit);
    }
    $categories = $query->inRandomOrder()->select('title', 'slug')->get();
    return $categories;
}
