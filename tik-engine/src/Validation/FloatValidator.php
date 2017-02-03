<?php

class FloatValidator extends Validator //валидатор булева значения
{
    public function filter($value)
    {
        return $this->validate( $this->filterVar(
            $value,
            FILTER_SANITIZE_NUMBER_FLOAT,
            ['FILTER_FLAG_ALLOW_FRACTION', 'FILTER_FLAG_ALLOW_THOUSAND', 'FILTER_FLAG_ALLOW_SCIENTIFIC']
        ) );
    }

    public function validate($value)
    {
        return $this->filterVar($value, FILTER_VALIDATE_FLOAT);
    }

}