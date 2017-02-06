<?php
namespace Mao\TikEngine\Validation;

abstract class Validator
{
    protected $default;// при ошибки возвращиет значение по умолчанию??? или не так
    protected $forceArray = false; //отвалидировать значение как массив
    protected $message; //сообщение об ошибки

    public function __construct(array $options =[])
    {
        foreach ($options as $name => $value){
            $method = 'set'.$name;

            if (method_exists($this, $method)){
                $this->$method($value);
            }
        }

    }

    public function setForceArray(bool $forceArray)
    {
        $this->forceArray = $forceArray;
        return $this;
    }

    public function getDefault()
    {
        return $this->default;
    }

    public function getMessage(): string
    {
        $template = $this->massege ?? $this->getMessageTemplate();

        preg_match_all('~{(\w+)}~i', $template, $replaceKeys);//составление нашего сообщения
        $replaceKeys = array_combine($replaceKeys[1],$replaceKeys[0]);

        $replace = [];

        foreach ($replaceKeys as $prop => $name){
            if (isset($this->$prop)){
                $replace[$name] = $this->$prop;
            }
        }
        return strtr ($template, $replace);
    }

    protected function getMessageTemplate(): string
    {
        return  'Не корректное значение.';
    }

    public function setDefault($value): Validator
    {
        $this->default = $this->validate($value);
        return $this;
    }
    public function setMessage(string $message): Validator //метод установщик, устанавливает значение message
    {
        $this->massege = $message;
        return $this;
    }

    abstract public function filter($value);//очищает

    protected function filterVar($value, $filter, array $options = [])//настойка фильтра
    {
        $options['flags'] = ($options['flags'] ?? 0) | FILTER_NULL_ON_FAILURE;

        if($this->forceArray){
            $options['flags'] |= FILTER_FORCE_ARRAY;
        }

        return filter_var($value, $filter, $options);
    }

    abstract public function validate($value);//валидирует

}
