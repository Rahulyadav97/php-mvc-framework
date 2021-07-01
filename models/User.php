<?php


namespace app\models;


use app\core\DbModel;
use app\core\Model;

class User extends DbModel
{
    const STATUS_INACTIVE = "0";
    const STATUS_ACTIVE = "1";
    public string $firstname="";
    public string  $lastname="";
    public string $email="";
    public string $password="";
    public string $confirmPassword="";
    public string $status = self::STATUS_ACTIVE;

    public function tableName(): string
    {
        // TODO: Implement tableName() method.
        return 'user';
    }

    public function save()
{
$this->password = password_hash($this->password,PASSWORD_DEFAULT);
    return parent::save();
}

public function rules(): array
{
    // TODO: Implement rules() method.
    return [
        'firstname' =>[self::RULE_REQUIRED],
        'lastname' =>[self::RULE_REQUIRED],
        'email' =>[self::RULE_REQUIRED,self::RULE_EMAIL,[self::RULE_UNIQUE,'class'=>self::class]],
        'password' =>[self::RULE_REQUIRED,[self::RULE_MIN,'min'=>'6']],
        'confirmPassword' =>[self::RULE_REQUIRED,[self::RULE_MATCH,'match'=>'password']],
    ];
}

public function attribute(): array
{
    // TODO: Implement attribute() method.
    return ['firstname','lastname','email','password','status'];
}
}