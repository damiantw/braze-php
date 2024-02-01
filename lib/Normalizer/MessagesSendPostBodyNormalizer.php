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
use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

if (!class_exists(Kernel::class) or (Kernel::MAJOR_VERSION >= 7 or Kernel::MAJOR_VERSION === 6 and Kernel::MINOR_VERSION === 4)) {
    class MessagesSendPostBodyNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, string $format = null, array $context = []): bool
        {
            return $type === 'Braze\\Model\\MessagesSendPostBody';
        }

        public function supportsNormalization(mixed $data, string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === 'Braze\\Model\\MessagesSendPostBody';
        }

        public function denormalize(mixed $data, string $type, string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new \Braze\Model\MessagesSendPostBody();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('broadcast', $data)) {
                $object->setBroadcast($data['broadcast']);
                unset($data['broadcast']);
            }
            if (\array_key_exists('external_user_ids', $data)) {
                $object->setExternalUserIds($data['external_user_ids']);
                unset($data['external_user_ids']);
            }
            if (\array_key_exists('user_aliases', $data)) {
                $object->setUserAliases($this->denormalizer->denormalize($data['user_aliases'], 'Braze\\Model\\MessagesSendPostBodyUserAliases', 'json', $context));
                unset($data['user_aliases']);
            }
            if (\array_key_exists('segment_id', $data)) {
                $object->setSegmentId($data['segment_id']);
                unset($data['segment_id']);
            }
            if (\array_key_exists('audience', $data)) {
                $object->setAudience($this->denormalizer->denormalize($data['audience'], 'Braze\\Model\\MessagesSendPostBodyAudience', 'json', $context));
                unset($data['audience']);
            }
            if (\array_key_exists('campaign_id', $data)) {
                $object->setCampaignId($data['campaign_id']);
                unset($data['campaign_id']);
            }
            if (\array_key_exists('send_id', $data)) {
                $object->setSendId($data['send_id']);
                unset($data['send_id']);
            }
            if (\array_key_exists('override_frequency_capping', $data)) {
                $object->setOverrideFrequencyCapping($data['override_frequency_capping']);
                unset($data['override_frequency_capping']);
            }
            if (\array_key_exists('recipient_subscription_state', $data)) {
                $object->setRecipientSubscriptionState($data['recipient_subscription_state']);
                unset($data['recipient_subscription_state']);
            }
            if (\array_key_exists('messages', $data)) {
                $object->setMessages($this->denormalizer->denormalize($data['messages'], 'Braze\\Model\\MessagesSendPostBodyMessages', 'json', $context));
                unset($data['messages']);
            }
            foreach ($data as $key => $value) {
                if (preg_match('/.*/', (string) $key)) {
                    $object[$key] = $value;
                }
            }

            return $object;
        }

        public function normalize(mixed $object, string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
        {
            $data = [];
            if ($object->isInitialized('broadcast') && null !== $object->getBroadcast()) {
                $data['broadcast'] = $object->getBroadcast();
            }
            if ($object->isInitialized('externalUserIds') && null !== $object->getExternalUserIds()) {
                $data['external_user_ids'] = $object->getExternalUserIds();
            }
            if ($object->isInitialized('userAliases') && null !== $object->getUserAliases()) {
                $data['user_aliases'] = $this->normalizer->normalize($object->getUserAliases(), 'json', $context);
            }
            if ($object->isInitialized('segmentId') && null !== $object->getSegmentId()) {
                $data['segment_id'] = $object->getSegmentId();
            }
            if ($object->isInitialized('audience') && null !== $object->getAudience()) {
                $data['audience'] = $this->normalizer->normalize($object->getAudience(), 'json', $context);
            }
            if ($object->isInitialized('campaignId') && null !== $object->getCampaignId()) {
                $data['campaign_id'] = $object->getCampaignId();
            }
            if ($object->isInitialized('sendId') && null !== $object->getSendId()) {
                $data['send_id'] = $object->getSendId();
            }
            if ($object->isInitialized('overrideFrequencyCapping') && null !== $object->getOverrideFrequencyCapping()) {
                $data['override_frequency_capping'] = $object->getOverrideFrequencyCapping();
            }
            if ($object->isInitialized('recipientSubscriptionState') && null !== $object->getRecipientSubscriptionState()) {
                $data['recipient_subscription_state'] = $object->getRecipientSubscriptionState();
            }
            if ($object->isInitialized('messages') && null !== $object->getMessages()) {
                $data['messages'] = $this->normalizer->normalize($object->getMessages(), 'json', $context);
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
            return ['Braze\\Model\\MessagesSendPostBody' => false];
        }
    }
} else {
    class MessagesSendPostBodyNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, string $format = null, array $context = []): bool
        {
            return $type === 'Braze\\Model\\MessagesSendPostBody';
        }

        public function supportsNormalization(mixed $data, string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === 'Braze\\Model\\MessagesSendPostBody';
        }

        public function denormalize($data, $type, $format = null, array $context = [])
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new \Braze\Model\MessagesSendPostBody();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('broadcast', $data)) {
                $object->setBroadcast($data['broadcast']);
                unset($data['broadcast']);
            }
            if (\array_key_exists('external_user_ids', $data)) {
                $object->setExternalUserIds($data['external_user_ids']);
                unset($data['external_user_ids']);
            }
            if (\array_key_exists('user_aliases', $data)) {
                $object->setUserAliases($this->denormalizer->denormalize($data['user_aliases'], 'Braze\\Model\\MessagesSendPostBodyUserAliases', 'json', $context));
                unset($data['user_aliases']);
            }
            if (\array_key_exists('segment_id', $data)) {
                $object->setSegmentId($data['segment_id']);
                unset($data['segment_id']);
            }
            if (\array_key_exists('audience', $data)) {
                $object->setAudience($this->denormalizer->denormalize($data['audience'], 'Braze\\Model\\MessagesSendPostBodyAudience', 'json', $context));
                unset($data['audience']);
            }
            if (\array_key_exists('campaign_id', $data)) {
                $object->setCampaignId($data['campaign_id']);
                unset($data['campaign_id']);
            }
            if (\array_key_exists('send_id', $data)) {
                $object->setSendId($data['send_id']);
                unset($data['send_id']);
            }
            if (\array_key_exists('override_frequency_capping', $data)) {
                $object->setOverrideFrequencyCapping($data['override_frequency_capping']);
                unset($data['override_frequency_capping']);
            }
            if (\array_key_exists('recipient_subscription_state', $data)) {
                $object->setRecipientSubscriptionState($data['recipient_subscription_state']);
                unset($data['recipient_subscription_state']);
            }
            if (\array_key_exists('messages', $data)) {
                $object->setMessages($this->denormalizer->denormalize($data['messages'], 'Braze\\Model\\MessagesSendPostBodyMessages', 'json', $context));
                unset($data['messages']);
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
            if ($object->isInitialized('broadcast') && null !== $object->getBroadcast()) {
                $data['broadcast'] = $object->getBroadcast();
            }
            if ($object->isInitialized('externalUserIds') && null !== $object->getExternalUserIds()) {
                $data['external_user_ids'] = $object->getExternalUserIds();
            }
            if ($object->isInitialized('userAliases') && null !== $object->getUserAliases()) {
                $data['user_aliases'] = $this->normalizer->normalize($object->getUserAliases(), 'json', $context);
            }
            if ($object->isInitialized('segmentId') && null !== $object->getSegmentId()) {
                $data['segment_id'] = $object->getSegmentId();
            }
            if ($object->isInitialized('audience') && null !== $object->getAudience()) {
                $data['audience'] = $this->normalizer->normalize($object->getAudience(), 'json', $context);
            }
            if ($object->isInitialized('campaignId') && null !== $object->getCampaignId()) {
                $data['campaign_id'] = $object->getCampaignId();
            }
            if ($object->isInitialized('sendId') && null !== $object->getSendId()) {
                $data['send_id'] = $object->getSendId();
            }
            if ($object->isInitialized('overrideFrequencyCapping') && null !== $object->getOverrideFrequencyCapping()) {
                $data['override_frequency_capping'] = $object->getOverrideFrequencyCapping();
            }
            if ($object->isInitialized('recipientSubscriptionState') && null !== $object->getRecipientSubscriptionState()) {
                $data['recipient_subscription_state'] = $object->getRecipientSubscriptionState();
            }
            if ($object->isInitialized('messages') && null !== $object->getMessages()) {
                $data['messages'] = $this->normalizer->normalize($object->getMessages(), 'json', $context);
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
            return ['Braze\\Model\\MessagesSendPostBody' => false];
        }
    }
}
