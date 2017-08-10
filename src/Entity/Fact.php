<?php

namespace Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fact
 *
 * @ORM\Table(name="fact")
 * @ORM\Entity(repositoryClass="Repository\FactRepository")
 */
class Fact
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=false)
     */
    private $title;
}
