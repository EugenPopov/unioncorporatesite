<?php

namespace App\Validator;

use App\Repository\SettingsRepository;
use phpDocumentor\Reflection\Type;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class SlugValidator extends ConstraintValidator
{
    /**
     * @var SettingsRepository
     */
    private $repository;

    public function __construct(SettingsRepository $repository)
    {
        $this->repository = $repository;
    }

    public function validate($value, Constraint $constraint)
    {
        /* @var $constraint \App\Validator\Slug */                                                                          

        if (null === $value || '' === $value) {
            return;
        }

        if($this->isSlugExist($value)) {
            $this->context->buildViolation($constraint->message)
                ->setParameter('{{ value }}', $value)
                ->addViolation();
        }

    }

    private function isSlugExist(string $slug): bool
    {
       return $this->repository->findOneBy(['slug' => $slug ]) ? true : false;
    }
}
