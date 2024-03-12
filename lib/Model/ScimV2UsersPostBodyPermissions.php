<?php

declare(strict_types=1);

/*
 * This file has been auto generated by Jane,
 *
 * Do no edit it directly.
 */

namespace Braze\Model;

class ScimV2UsersPostBodyPermissions extends \ArrayObject
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
     * @var list<string>
     */
    protected $companyPermissions;
    /**
     * @var list<ScimV2UsersPostBodyPermissionsAppGroupItem>
     */
    protected $appGroup;

    /**
     * @return list<string>
     */
    public function getCompanyPermissions(): array
    {
        return $this->companyPermissions;
    }

    /**
     * @param list<string> $companyPermissions
     */
    public function setCompanyPermissions(array $companyPermissions): self
    {
        $this->initialized['companyPermissions'] = true;
        $this->companyPermissions = $companyPermissions;

        return $this;
    }

    /**
     * @return list<ScimV2UsersPostBodyPermissionsAppGroupItem>
     */
    public function getAppGroup(): array
    {
        return $this->appGroup;
    }

    /**
     * @param list<ScimV2UsersPostBodyPermissionsAppGroupItem> $appGroup
     */
    public function setAppGroup(array $appGroup): self
    {
        $this->initialized['appGroup'] = true;
        $this->appGroup = $appGroup;

        return $this;
    }
}
