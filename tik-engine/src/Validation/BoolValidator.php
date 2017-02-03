<?php

class BoolValidator extends Validator //валидатор булева значения
{
    public function filter($value)
    {
        return (string) $this->validate($value);
    }

    public function validate($value)
    {
        return $this->filterVar($value, FILTER_VALIDATE_BOOLEAN);
    }

}