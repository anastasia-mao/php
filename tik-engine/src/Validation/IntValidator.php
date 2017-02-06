<?php
namespace Mao\TikEngine\Validation;

class IntValidator extends Validator //валидатор булева значения
{
    public function filter($value)
    {
        return $this->filterVar($value, FILTER_SANITIZE_NUMBER_INT);
    }

    public function validate($value)
    {
        $options = [];

        return $this->filterVar($value, FILTER_VALIDATE_INT, ['options' => $options]);
    }

}

//переделать