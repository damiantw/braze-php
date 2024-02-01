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
    class MessagesSendPostBodyMessagesNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, string $format = null, array $context = []): bool
        {
            return $type === 'Braze\\Model\\MessagesSendPostBodyMessages';
        }

        public function supportsNormalization(mixed $data, string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === 'Braze\\Model\\MessagesSendPostBodyMessages';
        }

        public function denormalize(mixed $data, string $type, string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new \Braze\Model\MessagesSendPostBodyMessages();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('android_push', $data)) {
                $object->setAndroidPush($data['android_push']);
                unset($data['android_push']);
            }
            if (\array_key_exists('apple_push', $data)) {
                $object->setApplePush($data['apple_push']);
                unset($data['apple_push']);
            }
            if (\array_key_exists('content_card', $data)) {
                $object->setContentCard($data['content_card']);
                unset($data['content_card']);
            }
            if (\array_key_exists('email', $data)) {
                $object->setEmail($data['email']);
                unset($data['email']);
            }
            if (\array_key_exists('kindle_push', $data)) {
                $object->setKindlePush($data['kindle_push']);
                unset($data['kindle_push']);
            }
            if (\array_key_exists('web_push', $data)) {
                $object->setWebPush($data['web_push']);
                unset($data['web_push']);
            }
            if (\array_key_exists('windows_phone8_push', $data)) {
                $object->setWindowsPhone8Push($data['windows_phone8_push']);
                unset($data['windows_phone8_push']);
            }
            if (\array_key_exists('windows_universal_push', $data)) {
                $object->setWindowsUniversalPush($data['windows_universal_push']);
                unset($data['windows_universal_push']);
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
            if ($object->isInitialized('androidPush') && null !== $object->getAndroidPush()) {
                $data['android_push'] = $object->getAndroidPush();
            }
            if ($object->isInitialized('applePush') && null !== $object->getApplePush()) {
                $data['apple_push'] = $object->getApplePush();
            }
            if ($object->isInitialized('contentCard') && null !== $object->getContentCard()) {
                $data['content_card'] = $object->getContentCard();
            }
            if ($object->isInitialized('email') && null !== $object->getEmail()) {
                $data['email'] = $object->getEmail();
            }
            if ($object->isInitialized('kindlePush') && null !== $object->getKindlePush()) {
                $data['kindle_push'] = $object->getKindlePush();
            }
            if ($object->isInitialized('webPush') && null !== $object->getWebPush()) {
                $data['web_push'] = $object->getWebPush();
            }
            if ($object->isInitialized('windowsPhone8Push') && null !== $object->getWindowsPhone8Push()) {
                $data['windows_phone8_push'] = $object->getWindowsPhone8Push();
            }
            if ($object->isInitialized('windowsUniversalPush') && null !== $object->getWindowsUniversalPush()) {
                $data['windows_universal_push'] = $object->getWindowsUniversalPush();
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
            return ['Braze\\Model\\MessagesSendPostBodyMessages' => false];
        }
    }
} else {
    class MessagesSendPostBodyMessagesNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, string $format = null, array $context = []): bool
        {
            return $type === 'Braze\\Model\\MessagesSendPostBodyMessages';
        }

        public function supportsNormalization(mixed $data, string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === 'Braze\\Model\\MessagesSendPostBodyMessages';
        }

        public function denormalize($data, $type, $format = null, array $context = [])
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new \Braze\Model\MessagesSendPostBodyMessages();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('android_push', $data)) {
                $object->setAndroidPush($data['android_push']);
                unset($data['android_push']);
            }
            if (\array_key_exists('apple_push', $data)) {
                $object->setApplePush($data['apple_push']);
                unset($data['apple_push']);
            }
            if (\array_key_exists('content_card', $data)) {
                $object->setContentCard($data['content_card']);
                unset($data['content_card']);
            }
            if (\array_key_exists('email', $data)) {
                $object->setEmail($data['email']);
                unset($data['email']);
            }
            if (\array_key_exists('kindle_push', $data)) {
                $object->setKindlePush($data['kindle_push']);
                unset($data['kindle_push']);
            }
            if (\array_key_exists('web_push', $data)) {
                $object->setWebPush($data['web_push']);
                unset($data['web_push']);
            }
            if (\array_key_exists('windows_phone8_push', $data)) {
                $object->setWindowsPhone8Push($data['windows_phone8_push']);
                unset($data['windows_phone8_push']);
            }
            if (\array_key_exists('windows_universal_push', $data)) {
                $object->setWindowsUniversalPush($data['windows_universal_push']);
                unset($data['windows_universal_push']);
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
            if ($object->isInitialized('androidPush') && null !== $object->getAndroidPush()) {
                $data['android_push'] = $object->getAndroidPush();
            }
            if ($object->isInitialized('applePush') && null !== $object->getApplePush()) {
                $data['apple_push'] = $object->getApplePush();
            }
            if ($object->isInitialized('contentCard') && null !== $object->getContentCard()) {
                $data['content_card'] = $object->getContentCard();
            }
            if ($object->isInitialized('email') && null !== $object->getEmail()) {
                $data['email'] = $object->getEmail();
            }
            if ($object->isInitialized('kindlePush') && null !== $object->getKindlePush()) {
                $data['kindle_push'] = $object->getKindlePush();
            }
            if ($object->isInitialized('webPush') && null !== $object->getWebPush()) {
                $data['web_push'] = $object->getWebPush();
            }
            if ($object->isInitialized('windowsPhone8Push') && null !== $object->getWindowsPhone8Push()) {
                $data['windows_phone8_push'] = $object->getWindowsPhone8Push();
            }
            if ($object->isInitialized('windowsUniversalPush') && null !== $object->getWindowsUniversalPush()) {
                $data['windows_universal_push'] = $object->getWindowsUniversalPush();
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
            return ['Braze\\Model\\MessagesSendPostBodyMessages' => false];
        }
    }
}
