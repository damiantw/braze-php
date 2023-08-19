<?php

declare(strict_types=1);

/*
 * This file has been auto generated by Jane,
 *
 * Do no edit it directly.
 */

namespace Braze\Model;

class SendsIdCreatePostBody extends \ArrayObject
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
     * @var string
     */
    protected $campaignId;
    /**
     * @var string
     */
    protected $sendId;

    public function getCampaignId(): string
    {
        return $this->campaignId;
    }

    public function setCampaignId(string $campaignId): self
    {
        $this->initialized['campaignId'] = true;
        $this->campaignId = $campaignId;

        return $this;
    }

    public function getSendId(): string
    {
        return $this->sendId;
    }

    public function setSendId(string $sendId): self
    {
        $this->initialized['sendId'] = true;
        $this->sendId = $sendId;

        return $this;
    }
}
