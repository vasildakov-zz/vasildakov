<?php
/**
 * User
 *
 * @package Application\Entity
 * @author Vasil Dakov <vasildakov@gmail.com>
 * @copyright Copyright (c) 2015 ict2biz (http://www.ict2biz.com/)
 */

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use JMS\Serializer\Annotation as Serializer;

/**
 * User
 *
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="Application\Repository\UserRepository")
 * @ORM\Table(
 *     name="user",
 *     options={"engine" = "InnoDB"},
 *     uniqueConstraints={
 *         @ORM\UniqueConstraint(name="UNIQ_email", columns={"email"})
 *     }
 * )
 *
 * @Serializer\AccessorOrder("custom", custom = {"id", "firstName", "lastName", "email"})
 */
class User
{

    /**
     * Roles
     */
    const ROLE_ADMINISTRATOR    = 1;
    const ROLE_TEACHER          = 2;
    const ROLE_STUDENT          = 3;
    const ROLE_AUTHOR           = 4;

    public static $roleOptions = array(
                    self::ROLE_ADMINISTRATOR    => "Administrator",
                    self::ROLE_TEACHER          => "Teacher",
                    self::ROLE_STUDENT          => "Student",
                    self::ROLE_AUTHOR           => "Author",
                );

    /**
     * Statuses
     */
    const STATUS_ACTIVE         = 1;
    const STATUS_PENDING        = 2;

    public static $statusOptions = array(
                    self::STATUS_ACTIVE    => "Active",
                    self::STATUS_PENDING   => "Pending"
                );

    /**
     * Genders
     */
    const GENDER_MALE           = 1;
    const GENDER_FEMALE         = 2;

    public static $genderOptions = array(
                    self::GENDER_MALE    => "Male",
                    self::GENDER_FEMALE  => "Female"
                );

    /**
     * @var integer
     *
     * @ORM\Id
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @Serializer\Groups({"UserEntity", "StudentEntity", "FileEntity", "AssignmentEntity"})
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=false)
     * @Serializer\Groups({"UserEntity", "StudentEntity"})
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255, nullable=true)
     */
    private $password;
}
