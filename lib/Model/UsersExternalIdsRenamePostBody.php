<?php

declare(strict_types=1);

/*
 * This file has been auto generated by Jane,
 *
 * Do no edit it directly.
 */

namespace Braze\Model;

class UsersExternalIdsRenamePostBody extends \ArrayObject
{
    /**
     * @var array
     */
    protected $initialized = [];

    public function isInitialized($property): bool
    {
        return array_key_exists($property, $this->initialized);
    }
    /**
     * @var UsersExternalIdsRenamePostBodyExternalIdRenamesItem[]
     */
    protected $externalIdRenames;

    /**
     * @return UsersExternalIdsRenamePostBodyExternalIdRenamesItem[]
     */
    public function getExternalIdRenames(): array
    {
        return $this->externalIdRenames;
    }

    /**
     * @param UsersExternalIdsRenamePostBodyExternalIdRenamesItem[] $externalIdRenames
     */
    public function setExternalIdRenames(array $externalIdRenames): self
    {
        $this->initialized['externalIdRenames'] = true;
        $this->externalIdRenames = $externalIdRenames;

        return $this;
    }
}
