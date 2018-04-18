<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CityRepository")
 * @ORM\Table(name="city")
 */
class City
{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue
     */
    private $id;

    /**
     * @ORM\Column(type="string", name="name")
     */
    private $name;

    /**
     * @ORM\Column(type="string", name="post_code")
     */
    private $postCode;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Province", inversedBy="cities")
     * @ORM\JoinColumn(name="province_id", referencedColumnName="id", nullable=false)
     */
    private $province;

    public function __construct(Province $province)
    {
        $this->province = $province;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setPostCode($postCode)
    {
        $this->postCode = $postCode;

        return $this;
    }

    public function getPostCode()
    {
        return $this->postCode;
    }

    public function setProvince(\AppBundle\Entity\Province $province)
    {
        $this->province = $province;

        return $this;
    }

    public function getProvince()
    {
        return $this->province;
    }
}
