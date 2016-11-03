<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Funcionario
 *
 * @ORM\Table(name="funcionario")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\FuncionarioRepository")
 */
class Funcionario
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=200)
     *
     * @Assert\NotBlank()
     * @Assert\Length(min="3", max="200")
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="apellido", type="string", length=200)
     *
     * @Assert\NotBlank()
     * @Assert\Length(min="3", max="200")
     */
    private $apellido;

    /**
     * @var string
     *
     * @ORM\Column(name="documento_identidad", type="string", length=30)
     *
     * @Assert\NotBlank()
     * @Assert\Length(min="3", max="30")
     */
    private $documentoIdentidad;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo_documento", type="string", length=20)
     *
     * @Assert\NotBlank()
     * @Assert\Length(min="3", max="20")
     */
    private $tipoDocumento;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_nacimiento", type="datetime")
     *
     *
     */
    private $fechaNacimiento;

    /**
     * @var \string
     *
     * @ORM\Column(name="sexo", type="string", length=20)
     *
     * @Assert\NotBlank()
     * @Assert\Length(min="3", max="20")
     */
    private $sexo;

    /**
     * @var Dependencia
     *
     * @ORM\ManyToOne(targetEntity="Dependencia", cascade={"persist"})
     * @ORM\JoinColumn(name="dependencia_id", referencedColumnName="id")
     *
     * @Assert\NotNull()
     */
    private $dependencia;

    /**
     * @var int
     *
     * @ORM\Column(name="salario", type="integer")
     *
     * @Assert\NotNull()
     */
    private $salario;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     *
     * @Assert\NotBlank()
     * @Assert\Email()
     * @Assert\Length(min="3", max="255")
     */
    private $email;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_inicio", type="datetime")
     */
    private $fechaInicio;

    /**
     * @var \Time
     *
     * @ORM\Column(name="horario_entrada", type="time")
     */
    private $fechaEntrada;

    /**
     * @var \Time
     *
     * @ORM\Column(name="horario_salida", type="time")
     */
    private $fechaSalida;

    /**
     * @var \string
     *
     * @ORM\Column(name="curriculum", type="string", length=30)
     *
     * @Assert\NotBlank()
     * @Assert\Length(min="3", max="30")
     */
    private $curriculum;

    /**
     * @var \text
     *
     * @ORM\Column(name="observaciones", type="text", nullable=true)
     */
    private $observaciones;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param string $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @return string
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * @param string $apellido
     */
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
    }

    /**
     * @return string
     */
    public function getDocumentoIdentidad()
    {
        return $this->documentoIdentidad;
    }

    /**
     * @param string $documentoIdentidad
     */
    public function setDocumentoIdentidad($documentoIdentidad)
    {
        $this->documentoIdentidad = $documentoIdentidad;
    }

    /**
     * @return string
     */
    public function getTipoDocumento()
    {
        return $this->tipoDocumento;
    }

    /**
     * @param string $tipoDocumento
     */
    public function setTipoDocumento($tipoDocumento)
    {
        $this->tipoDocumento = $tipoDocumento;
    }

    /**
     * @return \DateTime
     */
    public function getFechaNacimiento()
    {
        return $this->fechaNacimiento;
    }

    /**
     * @param \DateTime $fechaNacimiento
     */
    public function setFechaNacimiento($fechaNacimiento)
    {
        $this->fechaNacimiento = $fechaNacimiento;
    }

    /**
     * @return string
     */
    public function getSexo()
    {
        return $this->sexo;
    }

    /**
     * @param string $sexo
     */
    public function setSexo($sexo)
    {
        $this->sexo = $sexo;
    }

    /**
     * @return Dependencia
     */
    public function getDependencia()
    {
        return $this->dependencia;
    }

    /**
     * @param Dependencia $dependencia
     */
    public function setDependencia($dependencia)
    {
        $this->dependencia = $dependencia;
    }

    /**
     * @return int
     */
    public function getSalario()
    {
        return $this->salario;
    }

    /**
     * @param int $salario
     */
    public function setSalario($salario)
    {
        $this->salario = $salario;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return \DateTime
     */
    public function getFechaInicio()
    {
        return $this->fechaInicio;
    }

    /**
     * @param \DateTime $fechaInicio
     */
    public function setFechaInicio($fechaInicio)
    {
        $this->fechaInicio = $fechaInicio;
    }

    /**
     * @return \DateTime
     */
    public function getFechaEntrada()
    {
        return $this->fechaEntrada;
    }

    /**
     * @param \DateTime $fechaEntrada
     */
    public function setFechaEntrada($fechaEntrada)
    {
        $this->fechaEntrada = $fechaEntrada;
    }

    /**
     * @return \DateTime
     */
    public function getFechaSalida()
    {
        return $this->fechaSalida;
    }

    /**
     * @param \DateTime $fechaSalida
     */
    public function setFechaSalida($fechaSalida)
    {
        $this->fechaSalida = $fechaSalida;
    }

    /**
     * @return string
     */
    public function getCurriculum()
    {
        return $this->curriculum;
    }

    /**
     * @param string $curriculum
     */
    public function setCurriculum($curriculum)
    {
        $this->curriculum = $curriculum;
    }

    /**
     * @return string
     */
    public function getObservaciones()
    {
        return $this->observaciones;
    }

    /**
     * @param string $observaciones
     */
    public function setObservaciones($observaciones)
    {
        $this->observaciones = $observaciones;
    }

}
