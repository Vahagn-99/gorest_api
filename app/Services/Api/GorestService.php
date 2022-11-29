<?php

namespace App\Services\Api;

use Exception;
use Illuminate\Support\Collection;

/**
 *
 */
class GorestService
{
    /**
     * @param GorestClient $gorest
     */
    public function __construct(private readonly GorestClient $gorest)
    {
    }

    /**
     * @return Collection
     * @throws Exception
     */
    public function getAll(): Collection
    {
        return $this->gorest->get('posts')->collect();
    }

    /**
     * @param string|int $id
     * @return Collection
     * @throws Exception
     */
    public function getComments(string|int $id): Collection
    {
        return $this->gorest->get("posts/$id/comments")->collect();
    }

    /**
     * @param string|int $id
     * @return int
     * @throws Exception
     */
    public function delete(string|int $id): int
    {
        return $this->gorest->delete("posts/$id")->status();
    }
}
