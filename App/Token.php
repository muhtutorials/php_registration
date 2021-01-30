<?php


namespace App;


class Token
{
    // in db table "remembered_logins" look at "Structure->Relation view" tab for relation with "users" table
    // separate table with multiple tokens is needed for logging in from multiple devices
    protected $token;

    public function __construct($token = null)
    {
        if ($token) {
            $this->token = $token;
        } else {
            $this->token = bin2hex(random_bytes(16));  // 16 bytes = 128 bits = 32 hex characters
        }
    }

    public function getToken()
    {
        return $this->token;
    }

    public function getHashedToken()
    {
        return hash_hmac('sha256', $this->token, Config::SECRET_KEY);  // sha256 = 64 chars
    }
}