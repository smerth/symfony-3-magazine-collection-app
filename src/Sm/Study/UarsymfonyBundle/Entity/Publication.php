<?php

namespace Sm\Study\UarsymfonyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

use Sm\Study\UarsymfonyBundle\Entity\Issue;

/**
 * Publication
 *
 * @ORM\Table(name="publications")
 * @ORM\Entity(repositoryClass="Sm\Study\UarsymfonyBundle\Repository\PublicationRepository")
 */
class Publication
{
    /**
    * @var ArrayCollection
    *
    * @ORM\OneToMany(targetEntity="Issue", mappedBy="publication")
    */
    private $issues;

    public function __construct(){
      $this->issues = new ArrayCollection();
    }

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Publication
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Add issue
     *
     * @param \Sm\Study\UarsymfonyBundle\Entity\Issue $issue
     *
     * @return Publication
     */
    public function addIssue(\Sm\Study\UarsymfonyBundle\Entity\Issue $issue)
    {
        $this->issues[] = $issue;

        return $this;
    }

    /**
     * Remove issue
     *
     * @param \Sm\Study\UarsymfonyBundle\Entity\Issue $issue
     */
    public function removeIssue(\Sm\Study\UarsymfonyBundle\Entity\Issue $issue)
    {
        $this->issues->removeElement($issue);
    }

    /**
     * Get issues
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIssues()
    {
        return $this->issues;
    }
    
    /**
     * Render a Publication as a string.
     *
     * @return string
     */
    public function __toString() {
        return $this->getName();
    }
}
