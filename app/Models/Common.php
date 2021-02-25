<?php

namespace App\Models;

use App\Http\Requests\updateStaffRequest;
use Exception;
use http\Env\Request;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Collection\Collection;

/**
 * Class Common
 * @package App\Models
 */
class Common extends Model
{
    /**
     * @param Model|Collection|null $object
     * @param updateStaffRequest|null $request
     * @param string|null $do
     * @return array
     */
    public static function do(Model $object, updateStaffRequest $request = null, string $do = null): array
    {
        $oldObject = $object->getOriginal();
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
     * @param updateStaffRequest $request
     * @param string $do
     */
    protected static function determineEffect(Model $object, updateStaffRequest $request, string $do)
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
    protected static function saveObject(Model $object)
    {
        $object->save();
    }

    /**
     * @param Model $object
     * @param updateStaffRequest $request
     */
    protected static function updateObject(Model $object, updateStaffRequest $request)
    {
        $object->update($request->all());
    }

    /**
     * @param Model $object
     */
    protected static function removeObject(Model $object)
    {
        //TODO СДЕЛАТЬ Удаленение ЗАПИСИ
    }

}
