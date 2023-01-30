<?php

namespace App\Interfaces;

use BackedEnum;

interface EnumHelperInterface
{
    /**
     * Returns the enum associated with the string value passed as a parameter.
     *
     */
    public function enum(string $from) : BackedEnum;


    /**
     * Check if the test variable is of the same enum type of the passed value.
     *
     */
    public function check(string|object $test, string|object $value) : bool;

    /**
     * Check if test variable matches any enums associated with the array of values.
     *
     */
    public function in(string|object $test,array $values) : bool;

    /**
     * Return a string array of the names associated with the enum.
     *
     */
    public function names() : array;

    /**
     * Return a string array of the values associated with the enum.
     *
     */
    public function values(): array;

    /**
     * Return the id in the database of the enum associated with the parameter.
     *
     */
    public function id(string $from) : int;

    /**
     * Return the enum from its database id.
     *
     */
    public function fromId($id) : BackedEnum;
}
