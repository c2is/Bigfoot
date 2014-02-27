<?php

namespace Sandbox\MovieBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Gedmo\Mapping\Annotation as Gedmo;

use Sandbox\MovieBundle\Entity\Movie\Type as MovieType;
use Sandbox\CastingBundle\Entity\Actor;
use Sandbox\CastingBundle\Entity\Director;

/**
 * Movie
 *
 * @ORM\Table(name="sandbox_movie")
 * @ORM\Entity(repositoryClass="Bigfoot\Bundle\ContentBundle\Entity\MovieRepository")
 */
class Movie
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @Gedmo\Translatable
     * @ORM\Column(name="name", type="string", length=255, unique=true)
     */
    private $name;

    /**
     * @var text
     *
     * @Gedmo\Translatable
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @Gedmo\Slug(fields={"name"}, updatable=false, unique=true)
     * @ORM\Column(name="slug", type="string", length=255, unique=true)
     */
    private $slug;

    /**
     * @var boolean
     *
     * @ORM\Column(name="active", type="boolean")
     */
    private $active = true;

    /**
     * @var datetime $created
     *
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime")
     */
    private $created;

    /**
     * @var datetime $updated
     *
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(type="datetime")
     */
    private $updated;

    /**
     * @Gedmo\Blameable(on="create")
     * @ORM\Column(name="created_by", type="string", nullable=true)
     */
    private $createdBy;

    /**
     * @Gedmo\Blameable(on="update")
     * @ORM\Column(name="updated_by", type="string", nullable=true)
     */
    private $updatedBy;

    /**
     * @Gedmo\Locale
     */
    private $locale;

    /**
     * @var ArrayCollection
     *
     * @ORM\ManyToOne(targetEntity="Sandbox\CastingBundle\Entity\Director", inversedBy="movies")
     */
    private $director;

    /**
     * @var ArrayCollection
     *
     * @ORM\ManyToMany(targetEntity="Sandbox\CastingBundle\Entity\Actor", inversedBy="movies")
     * @ORM\JoinTable(name="sandbox_movie_actor")
     */
    private $actors;

    /**
     * @var ArrayCollection
     *
     * @ORM\ManyToMany(targetEntity="Sandbox\MovieBundle\Entity\Movie\Type", inversedBy="movies")
     * @ORM\JoinTable(name="sandbox_movie_type_join")
     */
    private $types;

    /**
     * Construct Movie
     */
    public function __construct()
    {
        $this->actors = new ArrayCollection();
        $this->types  = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Movie
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
     * Set description
     *
     * @param string $description
     * @return Movie
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return Movie
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set active
     *
     * @param boolean $active
     * @return Movie
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return boolean
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return Movie
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set updated
     *
     * @param \DateTime $updated
     * @return Movie
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;

        return $this;
    }

    /**
     * Get updated
     *
     * @return \DateTime
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Get createdBy
     *
     * @return string
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * Get updatedBy
     *
     * @return string
     */
    public function getUpdatedBy()
    {
        return $this->updatedBy;
    }

    public function setTranslatableLocale($locale)
    {
        $this->locale = $locale;

        return $this;
    }

    /**
     * @param Actor $actor
     * @return $this
     */
    public function addActor(Actor $actor)
    {
        $this->actors[] = $actor;

        return $this;
    }

    /**
     * @param Actor $actor
     * @return $this
     */
    public function removeActor(Actor $actor)
    {
        $this->actors->removeElement($actor);

        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getActors()
    {
        return $this->actors;
    }

    /**
     * @param MovieType $type
     * @return $this
     */
    public function addType(MovieType $type)
    {
        $this->types[] = $type;

        return $this;
    }

    /**
     * @param MovieType $type
     * @return $this
     */
    public function removeType(MovieType $type)
    {
        $this->types->removeElement($type);

        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getTypes()
    {
        return $this->types;
    }

    /**
     * Set director
     *
     * @param Director $director
     * @return Movie
     */
    public function setDirector(Director $director)
    {
        $this->director = $director;

        return $this;
    }

    /**
     * Get director
     *
     * @return Director
     */
    public function getDirector()
    {
        return $this->director;
    }
}
