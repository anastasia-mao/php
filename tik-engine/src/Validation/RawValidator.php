<?php

class RawValidator extends Validator //валидатор булева значения
{
    public function filter($value)
    {
        return $this->validate( $this->filterVar(
            $value,
            FILTER_UNSAFE_RAW
            ) );
    }

    public function validate($value)
    {
        return $value;
    }

}