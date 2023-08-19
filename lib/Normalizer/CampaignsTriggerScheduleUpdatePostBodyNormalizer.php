<?php

declare(strict_types=1);

/*
 * This file has been auto generated by Jane,
 *
 * Do no edit it directly.
 */

namespace Braze\Normalizer;

use Braze\Runtime\Normalizer\CheckArray;
use Braze\Runtime\Normalizer\ValidatorTrait;
use Jane\Component\JsonSchemaRuntime\Reference;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class CampaignsTriggerScheduleUpdatePostBodyNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;

    public function supportsDenormalization($data, $type, $format = null, array $context = []): bool
    {
        return $type === 'Braze\\Model\\CampaignsTriggerScheduleUpdatePostBody';
    }

    public function supportsNormalization($data, $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === 'Braze\\Model\\CampaignsTriggerScheduleUpdatePostBody';
    }

    /**
     * @return mixed
     */
    public function denormalize($data, $class, $format = null, array $context = [])
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Braze\Model\CampaignsTriggerScheduleUpdatePostBody();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('campaign_id', $data)) {
            $object->setCampaignId($data['campaign_id']);
            unset($data['campaign_id']);
        }
        if (\array_key_exists('schedule_id', $data)) {
            $object->setScheduleId($data['schedule_id']);
            unset($data['schedule_id']);
        }
        if (\array_key_exists('schedule', $data)) {
            $object->setSchedule($this->denormalizer->denormalize($data['schedule'], 'Braze\\Model\\CampaignsTriggerScheduleUpdatePostBodySchedule', 'json', $context));
            unset($data['schedule']);
        }
        foreach ($data as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $object[$key] = $value;
            }
        }

        return $object;
    }

    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = [])
    {
        $data = [];
        if ($object->isInitialized('campaignId') && null !== $object->getCampaignId()) {
            $data['campaign_id'] = $object->getCampaignId();
        }
        if ($object->isInitialized('scheduleId') && null !== $object->getScheduleId()) {
            $data['schedule_id'] = $object->getScheduleId();
        }
        if ($object->isInitialized('schedule') && null !== $object->getSchedule()) {
            $data['schedule'] = $this->normalizer->normalize($object->getSchedule(), 'json', $context);
        }
        foreach ($object as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $data[$key] = $value;
            }
        }

        return $data;
    }

    public function getSupportedTypes(string $format = null): array
    {
        return ['Braze\\Model\\CampaignsTriggerScheduleUpdatePostBody' => false];
    }
}
