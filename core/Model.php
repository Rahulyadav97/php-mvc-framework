<?php


namespace app\core;


abstract class Model
{
    public const RULE_REQUIRED = 'required';
    public const RULE_EMAIL = 'email';
    public const RULE_MIN = 'min';
    public const RULE_MAX = 'max';
    public const RULE_MATCH = 'match';
    public const RULE_UNIQUE = 'UNIQUE';
    public array $errors = [];
public function loadData($data)
{

foreach ($data as $key => $value){
    if (property_exists($this,$key))
    {

        $this->{$key} = $value;
    }
}

}
public function validate()
{
foreach ($this->rules() as $attribute => $rules){
    $value = $this->{$attribute};
    foreach ($rules as $rule)
    {
        $ruleName = $rule;
        if (!is_string($ruleName)){
            $ruleName = $rule[0];
        }
        if ($ruleName == self::RULE_REQUIRED && !$value){
            $this->addError($attribute,self::RULE_REQUIRED);
        }
        if ($ruleName == self::RULE_EMAIL && filter_var($value,FILTER_VALIDATE_EMAIL)){
            $this->addError($attribute,self::RULE_EMAIL);
        }
        if ($ruleName == self::RULE_MIN && strlen($value) < $rule['min']){
            $this->addError($attribute,self::RULE_MIN,$rule);
        }
        if ($ruleName == self::RULE_MAX && strlen($value) > $rule['max']){
            $this->addError($attribute,self::RULE_MAX,$rule);
        }
        if ($ruleName == self::RULE_MATCH && $value !== $this->{$rule['match']}){
            $this->addError($attribute,self::RULE_MATCH,$rule);
        }
        if($ruleName == self::RULE_UNIQUE){
            $className = $rule['class'];
            $uniqueAttr = $rule['attribute'] ?? $attribute;
            $tablename = $className::tableName();
            $statement = Application::$app->db->prepare("select * from $tablename where $uniqueAttr = :attr");
            $statement->bindValue(":attr",$value);
            $statement->execute();
            $record = $statement->fetchObject();
            if ($record)
            {
                $this->addError($attribute,self::RULE_UNIQUE,['field'=>$attribute]);
            }
        }
    }


}
    return empty($this->errors);
}
public function addError(string $attributes,string $rule,$params =[])
{
    $message = $this->errorMessage()[$rule] ?? '';
    foreach ($params as $key => $value){
        $message = str_replace("{{$key}}",$value,$message);
    }
    $this->errors[$attributes][] = $message;
}

public function errorMessage(){
    return[
       self::RULE_REQUIRED =>"This filed is required" ,
        self::RULE_EMAIL =>"This filed is required" ,
        self::RULE_MATCH =>"This {match} does not match " ,
        self::RULE_MIN =>"This field  too short, min {min} required" ,
        self::RULE_MAX=>"This filed exceeds error{max}" ,
        self::RULE_UNIQUE=>"This {field} already exist" ,
    ];
}
abstract public function rules(): array ;

public function hasError($attribute)
{
    return $this->errors[$attribute] ?? false;
}
public function getFirstError($attribute)
{
    return $this->errors[$attribute][0] ?? '';
}

}