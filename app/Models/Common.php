<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Model;

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
     * @throws Exception
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
        $object->education
            ? self::saveEducation($object)
            : $object->save();
    }

    /**
     * @param $object
     */
    private static function saveEducation($object)
    {
        $request = [];
        $education = $object->education;
        unset($object->education);
        $object->save();
        $object = $object->getAttributes();
        foreach ($education as $item) {
            $item['user_id'] = $object['user_id'];
            $request[] = $item;
        }
        Education::insert($request);
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
     * @param Model $model
     * @throws Exception
     */
    private static function removeObject(Model $model)
    {
        $model->delete();
    }

    /**
     * @param $model
     * @return array
     */
    public static function getOne($model): array
    {
        empty($model->education) ?: $model['education'] = $model->education;
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
            'data' => self::getAllObjects($model),
        ];
    }

    /**
     * @param $model
     * @return array
     */
    private static function getAllObjects($model): array
    {
        $response = [];
        foreach ($model::all() as $object) {
            empty($object->education) ?: $object['education'] = $object->education;
            $response[] = $object;
        }
        return $response;
    }
}
