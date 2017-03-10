<?php
/*
 * citeproc-php
 *
 * @link        http://github.com/seboettg/citeproc-php for the source repository
 * @copyright   Copyright (c) 2016 Sebastian Böttger.
 * @license     https://opensource.org/licenses/MIT
 */

namespace Seboettg\CiteProc\Constraint;


/**
 * Class Variable
 * @package Seboettg\CiteProc\Choose\Constraint
 *
 * @author Sebastian Böttger <seboettg@gmail.com>
 */
class Variable implements ConstraintInterface
{

    private $name;

    public function __construct($name, $match = null)
    {
        $this->name = $name;
    }

    public function validate($data)
    {
        return !empty($data->{$this->name});
    }
}