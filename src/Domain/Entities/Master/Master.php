<?php


namespace Malendar\Domain\Entities\Master;


class Master
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $acronym;

    /**
     * @var string
     */
    private $description;

    private $courses;

    public function __construct()
    {

    }
}