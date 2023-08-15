<?php

declare(strict_types=1);

/*
 * This file has been auto generated by Jane,
 *
 * Do no edit it directly.
 */

namespace Braze\Endpoint;

class GetScimV2UserById extends \Braze\Runtime\Client\BaseEndpoint implements \Braze\Runtime\Client\Endpoint
{
    use \Braze\Runtime\Client\EndpointTrait;
    protected $id;

    /**
     * > This endpoint allows you to look up an existing dashboard user account by specifying the resource `id` returned by the SCIM [`POST`](https://www.braze.com/docs/scim/post_create_user_account/) method.
     *
     * For information on how to obtain a SCIM token, visit [Automated user provisioning](https://www.braze.com/docs/scim/automated_user_provisioning/).
     *
     * ## Rate limit
     *
     * This endpoint has a rate limit of 5000 requests per day, per company. This rate limit is shared with the `/scim/v2/Users/` PUT, GET, DELETE, and POST endpoints as documented in [API rate limits](https://www.braze.com/docs/api/api_limits/).
     *
     * ## Path parameters
     *
     * | Parameter | Required | Data Type | Description |
     * | --- | --- | --- | --- |
     * | `id` | Required | String | The user's resource ID. This parameter is returned by the `POST` `/scim/v2/Users/` or `GET` `/scim/v2/Users?filter=userName eq "user@test.com"` methods. |
     *
     * ## Request parameters
     *
     * There is no request body for this endpoint.
     *
     * ## Response
     *
     * ``` json
     * {
     * "schemas": ["urn:ietf:params:scim:schemas:core:2.0:User"],
     * "id": "dfa245b7-24195aec-887bb3ad-602b3340",
     * "userName": "user@test.com",
     * "name": {
     * "givenName": "Test",
     * "familyName": "User"
     * },
     * "department": "finance",
     * "lastSignInAt": "Thursday, January 1, 1970 12:00:00 AM",
     * "permissions": {
     * "companyPermissions": ["manage_company_settings"],
     * "appGroup": [
     * {
     * "appGroupId": "241adcd25789fabcded",
     * "appGroupName": "Test App Group",
     * "appGroupPermissions": ["basic_access","send_campaigns_canvases"],
     * "team": [
     * {
     * "teamId": "241adcd25789fabcded",
     * "teamName": "Test Team",
     * "teamPermissions": ["admin"]
     * }
     * ]
     * }
     * ]
     * }
     * }
     *
     * ```
     *
     * @param array $headerParameters {
     *
     * @var string $Content-Type
     * @var string $X-Request-Origin
     * @var string $Authorization
     *             }
     */
    public function __construct(string $id, array $headerParameters = [])
    {
        $this->id = $id;
        $this->headerParameters = $headerParameters;
    }

    public function getMethod(): string
    {
        return 'GET';
    }

    public function getUri(): string
    {
        return str_replace(['{id}'], [$this->id], '/scim/v2/Users/{id}');
    }

    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        return [[], null];
    }

    public function getExtraHeaders(): array
    {
        return ['Accept' => ['application/json']];
    }

    protected function getHeadersOptionsResolver(): \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getHeadersOptionsResolver();
        $optionsResolver->setDefined(['Content-Type', 'X-Request-Origin', 'Authorization']);
        $optionsResolver->setRequired([]);
        $optionsResolver->setDefaults([]);
        $optionsResolver->addAllowedTypes('Content-Type', ['string']);
        $optionsResolver->addAllowedTypes('X-Request-Origin', ['string']);
        $optionsResolver->addAllowedTypes('Authorization', ['string']);

        return $optionsResolver;
    }

    /**
     * @throws \Braze\Exception\GetScimV2UserByIdBadRequestException
     * @throws \Braze\Exception\GetScimV2UserByIdUnauthorizedException
     * @throws \Braze\Exception\GetScimV2UserByIdForbiddenException
     * @throws \Braze\Exception\GetScimV2UserByIdNotFoundException
     * @throws \Braze\Exception\GetScimV2UserByIdTooManyRequestsException
     * @throws \Braze\Exception\GetScimV2UserByIdInternalServerErrorException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return json_decode($body);
        }
        if (is_null($contentType) === false && (400 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Braze\Exception\GetScimV2UserByIdBadRequestException($serializer->deserialize($body, 'Braze\\Model\\Error', 'json'), $response);
        }
        if (is_null($contentType) === false && (401 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Braze\Exception\GetScimV2UserByIdUnauthorizedException($serializer->deserialize($body, 'Braze\\Model\\Error', 'json'), $response);
        }
        if (is_null($contentType) === false && (403 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Braze\Exception\GetScimV2UserByIdForbiddenException($serializer->deserialize($body, 'Braze\\Model\\Error', 'json'), $response);
        }
        if (is_null($contentType) === false && (404 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Braze\Exception\GetScimV2UserByIdNotFoundException($serializer->deserialize($body, 'Braze\\Model\\Error', 'json'), $response);
        }
        if (is_null($contentType) === false && (429 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Braze\Exception\GetScimV2UserByIdTooManyRequestsException($serializer->deserialize($body, 'Braze\\Model\\Error', 'json'), $response);
        }
        if (is_null($contentType) === false && (500 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Braze\Exception\GetScimV2UserByIdInternalServerErrorException($serializer->deserialize($body, 'Braze\\Model\\Error', 'json'), $response);
        }
    }

    public function getAuthenticationScopes(): array
    {
        return ['BearerAuth'];
    }
}
