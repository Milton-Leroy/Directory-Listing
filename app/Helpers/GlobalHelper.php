<?php

/* Set sidebar Active */
if (!function_exists('setSidebarActive')) {
    function setSidebarActive(array $routes) : ?string
    {
        foreach($routes as $route){
            if(request()->routeIs($route)){
                return 'active';
            }
        }
        return null;
    }
}

/* Get youtube Thumbnail*/
if (!function_exists('getYtThumbnail')) {
    function getYtThumbnail(string $url)  : ?string
    {
        $pattern = '/[?&]v=([a-zA-Z0-9_-]{11})/';

        if(preg_match($pattern, $url, $matches)){
           $id = $matches[1];

           //To grab the thumbnnail from a youtube video and what we will store in the database
           return "https://img.youtube.com/vi/$id/mqdefault.jpg";
        }

        return null;
    }
}

/* Truncate functiom*/
if (!function_exists('truncate')) {
    function truncate(string $text, int $limit = 25)  : ?string
    {
        return \Str::of($text)->limit($limit);
    }
}
