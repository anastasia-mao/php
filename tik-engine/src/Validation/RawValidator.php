<?php
namespace Mao\TikEngine\Validation;

class RawValidator extends Validator //валидатор булева значения
{
    public function filter($value)
    {
        return $this->filterVar(
            $value,
            FILTER_UNSAFE_RAW
            );
    }

    public function validate($value)
    {
        return $this->filter($value) ?: $this->getDefault();
    }

}