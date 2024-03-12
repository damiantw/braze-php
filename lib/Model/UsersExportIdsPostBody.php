<?php

declare(strict_types=1);

/*
 * This file has been auto generated by Jane,
 *
 * Do no edit it directly.
 */

namespace Braze\Model;

class UsersExportIdsPostBody extends \ArrayObject
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
    protected $externalIds;
    /**
     * @var list<UsersExportIdsPostBodyUserAliasesItem>
     */
    protected $userAliases;
    /**
     * @var string
     */
    protected $deviceId;
    /**
     * @var string
     */
    protected $brazeId;
    /**
     * @var string
     */
    protected $emailAddress;
    /**
     * @var string
     */
    protected $phone;
    /**
     * @var list<string>
     */
    protected $fieldsToExport;

    /**
     * @return list<string>
     */
    public function getExternalIds(): array
    {
        return $this->externalIds;
    }

    /**
     * @param list<string> $externalIds
     */
    public function setExternalIds(array $externalIds): self
    {
        $this->initialized['externalIds'] = true;
        $this->externalIds = $externalIds;

        return $this;
    }

    /**
     * @return list<UsersExportIdsPostBodyUserAliasesItem>
     */
    public function getUserAliases(): array
    {
        return $this->userAliases;
    }

    /**
     * @param list<UsersExportIdsPostBodyUserAliasesItem> $userAliases
     */
    public function setUserAliases(array $userAliases): self
    {
        $this->initialized['userAliases'] = true;
        $this->userAliases = $userAliases;

        return $this;
    }

    public function getDeviceId(): string
    {
        return $this->deviceId;
    }

    public function setDeviceId(string $deviceId): self
    {
        $this->initialized['deviceId'] = true;
        $this->deviceId = $deviceId;

        return $this;
    }

    public function getBrazeId(): string
    {
        return $this->brazeId;
    }

    public function setBrazeId(string $brazeId): self
    {
        $this->initialized['brazeId'] = true;
        $this->brazeId = $brazeId;

        return $this;
    }

    public function getEmailAddress(): string
    {
        return $this->emailAddress;
    }

    public function setEmailAddress(string $emailAddress): self
    {
        $this->initialized['emailAddress'] = true;
        $this->emailAddress = $emailAddress;

        return $this;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->initialized['phone'] = true;
        $this->phone = $phone;

        return $this;
    }

    /**
     * @return list<string>
     */
    public function getFieldsToExport(): array
    {
        return $this->fieldsToExport;
    }

    /**
     * @param list<string> $fieldsToExport
     */
    public function setFieldsToExport(array $fieldsToExport): self
    {
        $this->initialized['fieldsToExport'] = true;
        $this->fieldsToExport = $fieldsToExport;

        return $this;
    }
}
