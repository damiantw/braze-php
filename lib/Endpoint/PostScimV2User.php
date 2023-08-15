<?php

declare(strict_types=1);

/*
 * This file has been auto generated by Jane,
 *
 * Do no edit it directly.
 */

namespace Braze\Endpoint;

class PostScimV2User extends \Braze\Runtime\Client\BaseEndpoint implements \Braze\Runtime\Client\Endpoint
{
    use \Braze\Runtime\Client\EndpointTrait;

    /**
     * > This endpoint allows you to create a new dashboard user account by specifying email, given and family names, permissions (for setting permissions at the company, app group, and team level).
     *
     * For information on how to obtain a SCIM token, visit [Automated user provisioning](https://www.braze.com/docs/scim/automated_user_provisioning/).
     *
     * ## Rate limit
     *
     * This endpoint has a rate limit of 5000 requests per day, per company. This rate limit is shared with the `/scim/v2/Users/` PUT, GET, and DELETE endpoints as documented in [API rate limits](https://www.braze.com/docs/api/api_limits/).
     *
     * ## Request parameters
     *
     * | Parameter | Required | Data type | Description |
     * | --- | --- | --- | --- |
     * | `schemas` | Required | Array of strings | Expected SCIM 2.0 schema name for user object. |
     * | `userName` | Required | String | The user’s email address. |
     * | `name` | Required | JSON object | This object contains the user's given name and family name. |
     * | `department` | Required | String | Valid department string from the [department string documentation]({{site.baseurl}}/scim_api_appendix/#department-strings). |
     * | `permissions` | Required | JSON object | Permissions object as described in the [permissions object documentation]({{site.baseurl}}/scim_api_appendix/#permissions-object). |
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
     * "teamId": "2519dafcdba238ae7",
     * "teamName": "Test Team",
     * "teamPermissions": ["basic_access","export_user_data"]
     * }
     * ]
     * }
     * ]
     * }
     * }
     *
     * ```
     *
     * ### Error states
     *
     * If a user with this email address already exists in Braze, the endpoint will respond with:
     *
     * ``` json
     * HTTP/1.1 409 Conflict
     * Date: Tue, 10 Sep 2019 02:22:30 GMT
     * Content-Type: text/json;charset=UTF-8
     * {
     * "schemas": ["urn:ietf:params:scim:api:messages:2.0:Error"],
     * "detail": "User already exists in the database.",
     * "status": 409
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
        return '/scim/v2/Users';
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
        $optionsResolver->setDefined(['Content-Type', 'X-Request-Origin', 'Authorization']);
        $optionsResolver->setRequired([]);
        $optionsResolver->setDefaults([]);
        $optionsResolver->addAllowedTypes('Content-Type', ['string']);
        $optionsResolver->addAllowedTypes('X-Request-Origin', ['string']);
        $optionsResolver->addAllowedTypes('Authorization', ['string']);

        return $optionsResolver;
    }

    /**
     * @throws \Braze\Exception\PostScimV2UserBadRequestException
     * @throws \Braze\Exception\PostScimV2UserUnauthorizedException
     * @throws \Braze\Exception\PostScimV2UserForbiddenException
     * @throws \Braze\Exception\PostScimV2UserNotFoundException
     * @throws \Braze\Exception\PostScimV2UserTooManyRequestsException
     * @throws \Braze\Exception\PostScimV2UserInternalServerErrorException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return json_decode($body);
        }
        if (is_null($contentType) === false && (400 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Braze\Exception\PostScimV2UserBadRequestException($serializer->deserialize($body, 'Braze\\Model\\Error', 'json'), $response);
        }
        if (is_null($contentType) === false && (401 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Braze\Exception\PostScimV2UserUnauthorizedException($serializer->deserialize($body, 'Braze\\Model\\Error', 'json'), $response);
        }
        if (is_null($contentType) === false && (403 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Braze\Exception\PostScimV2UserForbiddenException($serializer->deserialize($body, 'Braze\\Model\\Error', 'json'), $response);
        }
        if (is_null($contentType) === false && (404 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Braze\Exception\PostScimV2UserNotFoundException($serializer->deserialize($body, 'Braze\\Model\\Error', 'json'), $response);
        }
        if (is_null($contentType) === false && (429 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Braze\Exception\PostScimV2UserTooManyRequestsException($serializer->deserialize($body, 'Braze\\Model\\Error', 'json'), $response);
        }
        if (is_null($contentType) === false && (500 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Braze\Exception\PostScimV2UserInternalServerErrorException($serializer->deserialize($body, 'Braze\\Model\\Error', 'json'), $response);
        }
    }

    public function getAuthenticationScopes(): array
    {
        return ['BearerAuth'];
    }
}
