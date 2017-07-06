<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Contact Entity
 *
 * @property int $id
 * @property string $name
 * @property string $reference
 * @property int $type_id
 * @property int $profession_id
 * @property string $email
 * @property \Cake\I18n\Time $date_of_birth
 * @property string $phone_one
 * @property string $phone_two
 * @property string $phone_tree
 * @property string $special_phone
 * @property string $cep
 * @property string $address
 * @property string $number
 * @property string $neighborhood
 * @property string $complement
 * @property string $city
 * @property string $state
 * @property string $observations
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\Type $type
 * @property \App\Model\Entity\Profession $profession
 */
class Contact extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}
