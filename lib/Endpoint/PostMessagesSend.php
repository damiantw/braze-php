<?php

declare(strict_types=1);

/*
 * This file has been auto generated by Jane,
 *
 * Do no edit it directly.
 */

namespace Braze\Endpoint;

class PostMessagesSend extends \Braze\Runtime\Client\BaseEndpoint implements \Braze\Runtime\Client\Endpoint
{
    use \Braze\Runtime\Client\EndpointTrait;

    /**
     * > Use this endpoint to send immediate, ad-hoc messages to designated users via the Braze API.
     *
     * To use this endpoint, you’ll need to generate an API key with the `messages.send` permission.
     *
     * Be sure to include Messaging Objects in your body to complete your requests.
     *
     * If you are targeting a segment, a record of your request will be stored in the [Developer Console](https://dashboard.braze.com/app_settings/developer_console/activitylog/).
     *
     * ## Rate limit
     *
     * When specifying a segment or Connected Audience in your request, we apply a rate limit of 250 requests per minute to this endpoint. Otherwise, if specifying an `external_id`, this endpoint has a default rate limit of 250,000 requests per hour, as documented in [API rate limits](https://www.braze.com/docs/api/api_limits/).
     *
     * Braze endpoints support [batching API requests](https://www.braze.com/docs/api/api_limits/#batching-api-requests). A single request to the messaging endpoints can reach any of the following:
     *
     * - Up to 50 specific `external_ids`, each with individual message parameters
     * - A segment of any size created in the Braze dashboard, specified by its `segment_id`
     * - An ad-hoc audience segment of any size, defined in the request as a [Connected Audience](https://www.braze.com/docs/api/objects_filters/connected_audience/) object
     *
     *
     * ### Request parameters
     *
     * | Parameter | Required | Data Type | Description |
     * | --- | --- | --- | --- |
     * | `broadcast` | Optional | Boolean | See [broadcast](https://www.braze.com/docs/api/parameters/#broadcast). This parameter defaults to false (as of August 31, 2017).  <br>  <br>If `recipients` is omitted, `broadcast` must be set to true. However, use caution when setting `broadcast: true`, as unintentionally setting this flag may cause you to send your messages to a larger than expected audience. |
     * | `external_user_ids` | Optional | Array of strings | See [external user ID](https://www.braze.com/docs/api/parameters/#external-user-id). |
     * | `user_aliases` | Optional | Array of user alias objects | See [user alias object](https://www.braze.com/docs/api/objects_filters/user_alias_object/). |
     * | `segment_id` | Optional | String | See [segment identifier](https://www.braze.com/docs/api/identifier_types/). |
     * | `audience` | Optional | Connected audience object | See [connected audience](https://www.braze.com/docs/api/objects_filters/connected_audience/). |
     * | `campaign_id` | Optional\* | String | See [campaign identifier](https://www.braze.com/docs/api/identifier_types/) for more information.  <br>  <br>\*Required if you wish to track campaign stats (e.g. sends, clicks, bounces, etc) on the Braze dashboard. |
     * | `send_id` | Optional | String | See [send identifier](https://www.braze.com/docs/api/identifier_types/) |
     * | `override_frequency_capping` | Optional | Boolean | Ignore \`frequency_capping\` for campaigns, defaults to false. |
     * | `recipient_subscription_state` | Optional | String | Use this to send messages to only users who have opted in (`opted_in`), only users who have subscribed or are opted in (`subscribed`) or to all users, including unsubscribed users (`all`).  <br>  <br>Using `all` users is useful for transactional email messaging. Defaults to `subscribed`. |
     * | `messages` | Optional | Messaging objects | See available [messaging objects](https://www.braze.com/docs/api/endpoints/messaging/send_messages/post_send_messages/#available-messaging-objects). |
     *
     * ## Response details
     *
     * Message sending endpoint responses will include the message’s `dispatch_id` for reference back to the dispatch of the message. The `dispatch_id` is the id of the message dispatch (unique id for each ‘transmission’ sent from the Braze platform). For more, information refer to [Dispatch ID behavior](https://www.braze.com/docs/help/help_articles/data/dispatch_id/).
     *
     * @param array $headerParameters {
     *
     * @var string $Content-Type
     * @var string $Authorization
     *             }
     */
    public function __construct(\stdClass $requestBody = null, array $headerParameters = [])
    {
        $this->body = $requestBody;
        $this->headerParameters = $headerParameters;
    }

    public function getMethod(): string
    {
        return 'POST';
    }

    public function getUri(): string
    {
        return '/messages/send';
    }

    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \stdClass) {
            return [['Content-Type' => ['application/json']], json_encode($this->body)];
        }

        return [[], null];
    }

    public function getExtraHeaders(): array
    {
        return ['Accept' => ['application/json']];
    }

    protected function getHeadersOptionsResolver(): \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getHeadersOptionsResolver();
        $optionsResolver->setDefined(['Content-Type', 'Authorization']);
        $optionsResolver->setRequired([]);
        $optionsResolver->setDefaults([]);
        $optionsResolver->addAllowedTypes('Content-Type', ['string']);
        $optionsResolver->addAllowedTypes('Authorization', ['string']);

        return $optionsResolver;
    }

    /**
     * @throws \Braze\Exception\PostMessagesSendBadRequestException
     * @throws \Braze\Exception\PostMessagesSendUnauthorizedException
     * @throws \Braze\Exception\PostMessagesSendForbiddenException
     * @throws \Braze\Exception\PostMessagesSendNotFoundException
     * @throws \Braze\Exception\PostMessagesSendTooManyRequestsException
     * @throws \Braze\Exception\PostMessagesSendInternalServerErrorException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return json_decode($body);
        }
        if (is_null($contentType) === false && (400 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Braze\Exception\PostMessagesSendBadRequestException($serializer->deserialize($body, 'Braze\\Model\\Error', 'json'), $response);
        }
        if (is_null($contentType) === false && (401 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Braze\Exception\PostMessagesSendUnauthorizedException($serializer->deserialize($body, 'Braze\\Model\\Error', 'json'), $response);
        }
        if (is_null($contentType) === false && (403 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Braze\Exception\PostMessagesSendForbiddenException($serializer->deserialize($body, 'Braze\\Model\\Error', 'json'), $response);
        }
        if (is_null($contentType) === false && (404 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Braze\Exception\PostMessagesSendNotFoundException($serializer->deserialize($body, 'Braze\\Model\\Error', 'json'), $response);
        }
        if (is_null($contentType) === false && (429 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Braze\Exception\PostMessagesSendTooManyRequestsException($serializer->deserialize($body, 'Braze\\Model\\Error', 'json'), $response);
        }
        if (is_null($contentType) === false && (500 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Braze\Exception\PostMessagesSendInternalServerErrorException($serializer->deserialize($body, 'Braze\\Model\\Error', 'json'), $response);
        }
    }

    public function getAuthenticationScopes(): array
    {
        return ['BearerAuth'];
    }
}
