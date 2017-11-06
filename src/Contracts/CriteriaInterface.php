<?php
namespace Iwanli\Repository\Contracts;

/**
 * Interface CriteriaInterface
 * @package Iwanli\Repository\Contracts
 */
interface CriteriaInterface
{
    /**
     * Apply criteria in query repository
     *
     * @param                     $model
     * @param RepositoryInterface $repository
     *
     * @return mixed
     */
    public function apply($model, RepositoryInterface $repository);
}
