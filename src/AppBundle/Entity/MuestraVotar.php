<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;


/**
 * MuestraVotar
 *
 * @ORM\Table(name="muestra_votar")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MuestraRepository")
 * @Vich\Uploadable
 */
class MuestraVotar
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     *
     * @Vich\UploadableField(mapping="muestra_votar", fileNameProperty="imageName")
     *
     * @var File
     */
    private $imageFile;


    /**
     * @ORM\Column(type="string", length=255)
     *
     * @var string
     */
    private $imageName;


    /**
     * @ORM\Column(type="datetime")
     *
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @var string
     */
    private $descripcion;

    /**
     * @var int
     */
    private $muestraSeleccionada;


    /**
     * @var int
     *
     */
    private $estado;

    /**
     * @var int
     *
     */
    private $numeroVotos;


    /**
     * @ORM\OneToMany(targetEntity="GrupoMuestraVotar", mappedBy="muestraVotar", cascade={"persist", "remove"})
     */
    private $gruposMuestrasVotar;

    /**
     * @ORM\OneToMany(targetEntity="UsuarioMuestraVotar", mappedBy="muestraVotar")
     */
    private $usuarios_muestras_votar;



    public function __construct()
    {
        $this->gruposMuestrasVotar = new ArrayCollection();
        $this->muestraSeleccionada = 0;
        $this->usuarios_muestras_votar = new ArrayCollection();
    }


    public function __toString()
    {
        // TODO: Implement __toString() method.
        return (string) $this->getImageName();
    }

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
     * @return int|null
     */
    public function getMuestraSeleccionada()
    {
        return $this->muestraSeleccionada;
    }

    /**
     * @param int $accion
     *
     * @return MuestraVotar
     */
    public function setMuestraSeleccionada($accion)
    {
        $this->muestraSeleccionada = $accion;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * @param int $accion
     *
     * @return MuestraVotar
     */
    public function setEstado($accion)
    {
        $this->estado = $accion;

        return $this;
    }


    public function setImageFile(File $image = null)
    {
        $this->imageFile = $image;

        if ($image) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }

        return $this;
    }

    /**
     * @return File|null
     */
    public function getImageFile()
    {
        return $this->imageFile;
    }

    /**
     * @param string $imageName
     *
     * @return MuestraVotar
     */
    public function setImageName($imageName)
    {
        $this->imageName = $imageName;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getImageName()
    {
        return $this->imageName;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return MuestraVotar
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }


    /**
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return MuestraVotar
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Add gruposMuestrasVotar
     *
     * @param \AppBundle\Entity\GrupoMuestraVotar $gruposMuestrasVotar
     *
     * @return MuestraVotar
     */
    public function addGruposMuestrasVotar(\AppBundle\Entity\GrupoMuestraVotar $gruposMuestrasVotar)
    {
        $this->gruposMuestrasVotar[] = $gruposMuestrasVotar;

        return $this;
    }

    /**
     * Remove gruposMuestrasVotar
     *
     * @param \AppBundle\Entity\GrupoMuestraVotar $gruposMuestrasVotar
     */
    public function removeGruposMuestrasVotar(\AppBundle\Entity\GrupoMuestraVotar $gruposMuestrasVotar)
    {
        $this->gruposMuestrasVotar->removeElement($gruposMuestrasVotar);
    }

    /**
     * Get gruposMuestrasVotar
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGruposMuestrasVotar()
    {
        return $this->gruposMuestrasVotar;
    }

    /**
     * Add usuariosMuestrasVotar
     *
     * @param \AppBundle\Entity\UsuarioMuestraVotar $usuariosMuestrasVotar
     *
     * @return MuestraVotar
     */
    public function addUsuariosMuestrasVotar(\AppBundle\Entity\UsuarioMuestraVotar $usuariosMuestrasVotar)
    {
        $this->usuarios_muestras_votar[] = $usuariosMuestrasVotar;

        return $this;
    }

    /**
     * Remove usuariosMuestrasVotar
     *
     * @param \AppBundle\Entity\UsuarioMuestraVotar $usuariosMuestrasVotar
     */
    public function removeUsuariosMuestrasVotar(\AppBundle\Entity\UsuarioMuestraVotar $usuariosMuestrasVotar)
    {
        $this->usuarios_muestras_votar->removeElement($usuariosMuestrasVotar);
    }

    /**
     * Get usuariosMuestrasVotar
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUsuariosMuestrasVotar()
    {
        return $this->usuarios_muestras_votar;
    }
    /**
     * Set numeroVotos
     *
     * @param int $votos
     *
     * @return MuestraVotar
     */
    public function setNumeroVotos($votos)
    {
        $this->numeroVotos = $votos;

        return $this;
    }

    /**
     * Get estado
     *
     * @return int
     */
    public function getNumeroVotos()
    {
        return $this->numeroVotos;
    }
}
