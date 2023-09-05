<?php 
class Title 
{
    public function showTitle($title = null) {
        if ($title) {
            return 'Laundry | ' . $title;
        }
        return $title;
    }
}
