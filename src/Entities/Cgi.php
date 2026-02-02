<?php

namespace Nikitanp\AlfacrmApiPhp\Entities;

class Cgi extends AbstractEntity
{
    protected string $modelName = 'cgi';

    /**
     * @inheritDoc
     */
    public function get(int $page = 0, array $filterData = []): array
    {
        if (!isset($filterData['group_id'])) {
            throw new \ArgumentCountError(
                'group_id is required! $filterData = ' . json_encode($filterData, JSON_THROW_ON_ERROR)
            );
        }

        $getParams = ['group_id' => $filterData['group_id']];

        unset($filterData['group_id']);

        $filterData['page'] = $page;

        return $this->client->sendRequest(
            $this->preparePath(
                "$this->modelName/index",
                $getParams
            ),
            $filterData
        );
    }

    /**
     * @inheritDoc
     */
    public function customer(int $page = 0, array $filterData = []): array
    {
        if (!isset($filterData['customer_id'])) {
            throw new \ArgumentCountError(
                'customer_id is required! $filterData = ' . json_encode($filterData, JSON_THROW_ON_ERROR)
            );
        }

        $getParams = ['customer_id' => $filterData['customer_id']];

        unset($filterData['customer_id']);

        $filterData['page'] = $page;

        return $this->client->sendRequest(
            $this->preparePath(
                "$this->modelName/customer",
                $getParams
            ),
            $filterData
        );
    }

    /**
     * create model item
     * @param array $entityData
     * @return array
     */
    public function create(array $entityData): array
    {
        if (!isset($entityData['group_id'])) {
            throw new \ArgumentCountError(
                'group_id is required! $entityData = ' . json_encode($entityData, JSON_THROW_ON_ERROR)
            );
        }

        $getParams = ['group_id' => $entityData['group_id']];

        unset($entityData['group_id']);

        return $this->client->sendRequest(
            $this->preparePath(
                "$this->modelName/create",
                $getParams
            ),
            $entityData
        );
    }

    /**
     * update model item using id
     * @param int $entityId
     * @param array $updateData
     * @return array
     */
    public function update(int $entityId, array $updateData): array
    {
        if (!isset($updateData['group_id'])) {
            throw new \ArgumentCountError(
                'group_id is required! $updateData = ' . json_encode($updateData, JSON_THROW_ON_ERROR)
            );
        }

        $getParams = ['group_id' => $updateData['group_id']];
        
        $getParams['id'] = $entityId;

        unset($updateData['group_id']);

        return $this->client->sendRequest(
            $this->preparePath(
                "$this->modelName/update",
                $getParams
            ),
            $updateData
        );
    }
}
