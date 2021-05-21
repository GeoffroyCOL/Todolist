<?php

namespace Tests;

use Symfony\Component\Validator\Validator\ValidatorInterface;

class AssertHasErrors
{
    public function __construct(private ValidatorInterface $validator)
    {}

    public function hasErrors($entity, int $number = 0)
    {
        $messages = [];
        $errors = $this->validator->validate($entity);

        /** @var ConstraintViolation $error */
        foreach ($errors as $error) {
            $messages[] = $error->getPropertyPath() . ' => ' . $error->getMessage();
        }

        $this->assertCount($number, $errors, implode(', ', $messages));
    }
}