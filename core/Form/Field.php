<?php


namespace app\core\Form;


use app\core\Model;

class Field
{
    public const TYPE_TEXT ='text';
    public const TYPE_EMAIL ='email';
    public const TYPE_PASSWORD ='password';
    public const TYPE_NUMBER ='number';
   public string $type;
public Model $model;
public string $attribute;

public function __construct($model,$attribute)
{
    $this->type=self::TYPE_TEXT;
    $this->model = $model;
    $this->attribute= $attribute;
}

public function __toString()
{
    // TODO: Implement __toString() method.
    return sprintf('
      <div class="form-floating">
        <input type="%s" class="form-control %s" name="%s" value="%s" placeholder="%s" >
        <label for="fname">%s</label>
        <div class="invalid-feedback">
        %s
        </div>
    </div>
    ',
        $this->type,
        $this->model->hasError($this->attribute) ? 'is-invalid' : '',
    $this->attribute,
        $this->model->{$this->attribute},
    $this->attribute,
        $this->attribute,
        $this->model->getFirstError($this->attribute));
}
public function passwordField()
{
    $this->type = self::TYPE_PASSWORD;
    return $this;
}
}