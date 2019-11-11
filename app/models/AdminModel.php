<?php declare(strict_types=1);


/*
 * Admin model class
 */
class AdminModel extends Model
{
    /* Check if the username (people_lastname) is in the database */
    public function isUserFound(string $username): bool
    {
        $this->open();
        $userQuery = $this->db->prepare("SELECT * FROM people WHERE people_lastname=:people_lastname");
        $userQuery->execute(array('people_lastname' => $username));
        $this->close();

        return boolval($userQuery->rowCount());
    }

    /* Check if user is logged in and returns user info  */
    public function login(string $username, string $password): array
    {
        $this->open();
        $userQuery = $this->db->prepare("SELECT * FROM people WHERE people_lastname=:people_lastname");
        $userQuery->execute(array('people_lastname' => $username));
        $user = $userQuery->fetch();
        $passwordHashed = $user['people_password'] ? $user['people_password'] : ''; // prevent errors (if returns FALSE)
        $this->close();

        return password_verify($password, $passwordHashed) ? $user : array();
    }
}