<?php


namespace App\Models;

use App\Token;
use Core\Model;
use PDO;


class RememberedLogin extends Model
{
    public static function findByToken($token)
    {
        $token = new Token($token);
        $token_hash = $token->getHashedToken();

        $sql = 'SELECT * FROM remembered_logins WHERE token_hash = :token_hash';

        $db = static::getDB();
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':token_hash', $token_hash, PDO::PARAM_STR);

        // get_called_class() returns the name of the called class with namespace
        $stmt->setFetchMode(PDO::FETCH_CLASS, get_called_class());

        $stmt->execute();

        return $stmt->fetch();
    }

    public function getUser()
    {
        return User::findByID($this->user_id);
    }

    public function hasExpired()
    {
        return strtotime($this->expires_at) < time();
    }

    public function delete()
    {
        $sql = 'DELETE FROM remembered_logins WHERE token_hash = :token_hash';

        $db = static::getDB();
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':token_hash', $this->token_hash, PDO::PARAM_STR);

        $stmt->execute();
    }
}