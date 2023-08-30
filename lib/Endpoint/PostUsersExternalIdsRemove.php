<?php

declare(strict_types=1);

/*
 * This file has been auto generated by Jane,
 *
 * Do no edit it directly.
 */

namespace Braze\Endpoint;

class PostUsersExternalIdsRemove extends \Braze\Runtime\Client\BaseEndpoint implements \Braze\Runtime\Client\Endpoint
{
    use \Braze\Runtime\Client\EndpointTrait;

    /**
     * > Use this endpoint to remove your users' old deprecated external IDs.
     *
     * To use this endpoint, you’ll need to generate an API key with the `users.external_ids.remove` permission.
     *
     * You can send up to 50 external IDs per request. You will need to create a new [API key](https://www.braze.com/docs/api/api_key/) with permissions for this endpoint.
     *
     * > **Warning:** This endpoint completely removes the deprecated ID and cannot be undone. Using this endpoint to remove deprecated \`external_ids\` that are still associated with users in your system can permanently prevent you from finding those users' data.
     *
     *
     * ## Rate limit
     *
     * We apply a rate limit of 1,000 requests per minute to this endpoint, as documented in [API rate limits](http://braze.com/docs/api/api_limits/).
     *
     * ### Request parameters
     *
     * | Parameter | Required | Data Type | Description |
     * | --- | --- | --- | --- |
     * | `external_ids` | Required | Array of strings | External identifiers for the users to remove |
     *
     * > Important: Only deprecated IDs can be removed; attempting to remove a primary external ID will result in an error.
     *
     *
     * ## Response
     *
     * The response will confirm all successful removals, as well as unsuccessful removals with the associated errors. Error messages in the `removal_errors` field will reference the index in the array of the original request.
     *
     * ``` json
     * {
     * "message" : (string) status message,
     * "removed_ids" : (array of successful Remove Operations),
     * "removal_errors": (array of any )
     * }
     *
     * ```
     *
     * The `message` field will return `success` for any valid request. More specific errors are captured in the `removal_errors` array. The `message` field returns an error in the case of:
     *
     * - Invalid API key
     * - Empty `external_ids` array
     * - `external_ids` array with more than 50 items
     * - Rate limit hit (>1,000 requests/minute)
     *
     * @param array $headerParameters {
     *
     * @var string $Content-Type
     * @var string $Authorization
     *             }
     */
    public function __construct(\Braze\Model\UsersExternalIdsRemovePostBody $requestBody = null, array $headerParameters = [])
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
        return '/users/external_ids/remove';
    }

    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \Braze\Model\UsersExternalIdsRemovePostBody) {
            return [['Content-Type' => ['application/json']], $serializer->serialize($this->body, 'json')];
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
     * @return null
     *
     * @throws \Braze\Exception\PostUsersExternalIdsRemoveBadRequestException
     * @throws \Braze\Exception\PostUsersExternalIdsRemoveUnauthorizedException
     * @throws \Braze\Exception\PostUsersExternalIdsRemoveForbiddenException
     * @throws \Braze\Exception\PostUsersExternalIdsRemoveNotFoundException
     * @throws \Braze\Exception\PostUsersExternalIdsRemoveTooManyRequestsException
     * @throws \Braze\Exception\PostUsersExternalIdsRemoveInternalServerErrorException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return json_decode($body);
        }
        if (is_null($contentType) === false && (400 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Braze\Exception\PostUsersExternalIdsRemoveBadRequestException($serializer->deserialize($body, 'Braze\\Model\\Error', 'json'), $response);
        }
        if (is_null($contentType) === false && (401 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Braze\Exception\PostUsersExternalIdsRemoveUnauthorizedException($serializer->deserialize($body, 'Braze\\Model\\Error', 'json'), $response);
        }
        if (is_null($contentType) === false && (403 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Braze\Exception\PostUsersExternalIdsRemoveForbiddenException($serializer->deserialize($body, 'Braze\\Model\\Error', 'json'), $response);
        }
        if (is_null($contentType) === false && (404 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Braze\Exception\PostUsersExternalIdsRemoveNotFoundException($serializer->deserialize($body, 'Braze\\Model\\Error', 'json'), $response);
        }
        if (is_null($contentType) === false && (429 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Braze\Exception\PostUsersExternalIdsRemoveTooManyRequestsException($serializer->deserialize($body, 'Braze\\Model\\Error', 'json'), $response);
        }
        if (is_null($contentType) === false && (500 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Braze\Exception\PostUsersExternalIdsRemoveInternalServerErrorException($serializer->deserialize($body, 'Braze\\Model\\Error', 'json'), $response);
        }
    }

    public function getAuthenticationScopes(): array
    {
        return ['BearerAuth'];
    }
}
