<?php declare(strict_types=1);


class Redirect
{
    /**
     * Redirect to specific page
     * @param $page
     */
    public static function to(string $page): void {
        header('location: ' . $page);
    }
    
    /**
     * Redirect to same page
     */
    public static function back(): void {
        $uri = $_SERVER['REQUEST_URI'];
        header('location: ' . $uri);
    }
}