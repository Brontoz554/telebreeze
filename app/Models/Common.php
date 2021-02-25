<?php

namespace App\Models;

use App\Http\Requests\UpdateStaffRequest as UpdateStaffRequestAlias;
use Exception;
use http\Client\Request;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Collection\Collection;

/**
 * Class Common
 * @package App\Models
 */
class Common extends Model
{
    /**
     * @param Model $object
     * @param null $request
     * @param string $do
     * @return array
     */
    public static function do(Model $object, $request, string $do): array
    {
        $oldObject = $object->getAttributes();
        try {
            self::determineEffect($object, $request, $do);
            return [
                'success' => true,
                'errors' => [],
                'data' => $oldObject,
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
     * @param Model $object
     * @param null $request
     * @param string $do
     */
    private static function determineEffect(Model $object, $request, string $do)
    {
        switch ($do) {
            case 'save':
                self::saveObject($object);
                break;
            case 'update':
                self::updateObject($object, $request);
                break;
            case 'remove':
                self::removeObject($object);
                break;
        }
    }

    /**
     * @param Model $object
     */
    private static function saveObject(Model $object)
    {
        $object->save();
    }

    /**
     * @param Model $object
     * @param $request
     */
    private static function updateObject(Model $object, $request)
    {
        $object->update($request->all());
    }

    /**
     * @param Model $object
     */
    private static function removeObject(Model $object)
    {
        //TODO СДЕЛАТЬ Удаленение ЗАПИСИ
    }

    /**
     * @param Model $model
     * @return array
     */
    public static function getOne(Model $model): array
    {
        return [
            'success' => true,
            'errors' => [],
            'data' => $model,
        ];
    }

    /**
     * @param $model
     * @return array
     */
    public static function getAll($model): array
    {
        return [
            'success' => true,
            'errors' => [],
            'data' => $model::all(),
        ];
    }

    /**
     * @param $model
     * @return array
     */
    public static function remove($model): array
    {
        return [
            'success' => true,
            'errors' => [],
            'data' => $model->delete(),
        ];
    }

}
