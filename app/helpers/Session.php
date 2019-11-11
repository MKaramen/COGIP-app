<?php declare(strict_types=1);


/** 
* Session class
*/
class Session
{
    /* */
    public static function get($field): string {return array_key_exists($field, $_SESSION) ? $_SESSION[$field] : '';}

    /* */
    public static function createUser(array $user): void
    {
        $_SESSION['id']        = $user['id'];
        $_SESSION['username']  = $user['people_lastname'];
        $_SESSION['firstname'] = $user['people_firstname'];
        $_SESSION['email']     = $user['people_email'];
        $_SESSION['start']     = time();  // get the time the session started
        session_regenerate_id();          // regenerate the session PHPSESSID (security)
        Helper::to('/admin/dashboard');   // redirect to dashboard page
    }

    /* Logout a user (redirect to login page) */
    public static function logout(): void
    {
        // Empty the $_SESSION array
        $_SESSION = array();

        // Invalidate the session cookie
        if (isset($_COOKIE[session_name()])) setcookie(session_name(), '', time()-86400, '/');

        // End session 
        session_destroy();             // destroy session
        Helper::to('/admin/login/no'); // redirect to login page
    }

    /* Checks if user is logged in */
    public static function isLoggedIn(): bool {return isset($_SESSION['id']);}

    /**
     * Ending a session after a period of inactivity (redirect to login page) 
     * @param string $timeLimit: timeLimit (15 minutes by default)
     */
    public static function timeout(int $timeLimit=15): void
    {
        ob_start();
        
        $timelimit = 60*$timeLimit; // set a time limit in seconds
        $now = time();              // get the current time

        // If session variable not set, redirect to login page
        if (!isset($_SESSION['id']))  Helper::to('/admin/login/no'); 
        elseif ($now > $_SESSION['start'] + $timelimit) 
        {
            // If timeLimit has expired, destroy session and redirect
            $_SESSION = array();

            // Invalidate the session cookie
            if (isset($_COOKIE[session_name()])) setcookie(session_name(), '', time()-86400, '/');

            // End session and redirect with query string
            session_destroy();
            Helper::to('/admin/login/yes');
        } 
        else $_SESSION['start'] = time(); // if user session is active, so update start time
    }

}