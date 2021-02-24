<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Common
 * @package App\Models
 */
class Common extends Model
{
    /**
     * @param Model $object
     * @param string $do
     * @return array
     */
    public static function do(Model $object, string $do = 'save')
    {
        try {
            self::determineEffect($object, $do);
            return [
                'success' => true,
                'errors' => [],
                'data' => $object,
            ];
        } catch (Exception $error) {
            return [
                'success' => false,
                'errors' => [
                    $error->getMessage(),
                ],
                'data' => [],
            ];
        }
    }

    /**
     * @param $do
     * @param $object
     * @return bool|void
     */
    protected static function determineEffect($object, $do)
    {
        switch ($do) {
            case 'save':
                self::saveObject($object);
                break;
            case 'update':
                self::updateObject($object);
                break;
            case 'remove':
                self::removeObject($object);
                break;
        }

        return $object;
    }

    /**
     * @param Model $object
     * @return bool|void
     */
    protected static function saveObject(Model $object)
    {
        return $object->save();
    }

    /**
     * @param Model $object
     */
    protected static function updateObject(Model $object)
    {
        //TODO СДЕЛАТЬ ОБНОВЛЕНИЕ ЗАПИСИ
    }

    /**
     * @param Model $object
     */
    protected static function removeObject(Model $object)
    {
        //TODO СДЕЛАТЬ Удаленение ЗАПИСИ
    }

}
