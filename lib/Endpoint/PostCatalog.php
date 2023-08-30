<?php

declare(strict_types=1);

/*
 * This file has been auto generated by Jane,
 *
 * Do no edit it directly.
 */

namespace Braze\Endpoint;

class PostCatalog extends \Braze\Runtime\Client\BaseEndpoint implements \Braze\Runtime\Client\Endpoint
{
    use \Braze\Runtime\Client\EndpointTrait;

    /**
     * > Use this endpoint to create a catalog.
     *
     * To use this endpoint, you’ll need to generate an API key with the `catalogs.create` permission.
     *
     * ## Rate limit
     *
     * This endpoint has a shared rate limit of 5 requests per minute between all synchronous catalog endpoints, as documented in [API rate limits](https://www.braze.com/docs/api/api_limits/).
     *
     * ## Request parameters
     *
     * | Parameter | Required | Data Type | Description |
     * | --- | --- | --- | --- |
     * | `catalogs` | Required | Array | An array that contains catalog objects. Only one catalog object is allowed for this request. |
     *
     * ### Catalog object parameters
     *
     * | Parameter | Required | Data Type | Description |
     * | --- | --- | --- | --- |
     * | `name` | Required | String | The name of the catalog that you want to create. |
     * | `description` | Required | String | The description of the catalog that you want to create. |
     * | `fields` | Required | Array | An array of objects where the object contains keys `name` and `type`. |
     *
     * ## Example request
     *
     * ```
     * curl --location --request POST 'https://rest.iad-03.braze.com/catalogs' \
     * --header 'Content-Type: application/json' \
     * --header 'Authorization: Bearer YOUR-REST-API-KEY' \
     * --data-raw '{
     * "catalogs": [
     * {
     * "name": "restaurants",
     * "description": "My Restaurants",
     * "fields": [
     * {
     * "name": "id",
     * "type": "string"
     * },
     * {
     * "name": "Name",
     * "type": "string"
     * },
     * {
     * "name": "City",
     * "type": "string"
     * },
     * {
     * "name": "Cuisine",
     * "type": "string"
     * },
     * {
     * "name": "Rating",
     * "type": "number"
     * },
     * {
     * "name": "Loyalty_Program",
     * "type": "boolean"
     * },
     * {
     * "name": "Created_At",
     * "type": "time"
     * }
     * ]
     * }
     * ]
     * }'
     *
     * ```
     *
     * ## Response
     *
     * There are two status code responses for this endpoint: `201` and `400`.
     *
     * ### Example success response
     *
     * The status code `201` could return the following response body.
     *
     * ``` json
     * {
     * "catalogs": [
     * {
     * "description": "My Restaurants",
     * "fields": [
     * {
     * "name": "id",
     * "type": "string"
     * },
     * {
     * "name": "Name",
     * "type": "string"
     * },
     * {
     * "name": "City",
     * "type": "string"
     * },
     * {
     * "name": "Cuisine",
     * "type": "string"
     * },
     * {
     * "name": "Rating",
     * "type": "number"
     * },
     * {
     * "name": "Loyalty_Program",
     * "type": "boolean"
     * },
     * {
     * "name": "Created_At",
     * "type": "time"
     * }
     * ],
     * "name": "restaurants",
     * "num_items": 0,
     * "updated_at": "2022-11-02T20:04:06.879+00:00"
     * }
     * ],
     * "message": "success"
     * }
     *
     * ```
     *
     * ### Example error response
     *
     * The status code `400` could return the following response body. Refer to [Troubleshooting](#troubleshooting) for more information about errors you may encounter.
     *
     * ``` json
     * {
     * "errors": [
     * {
     * "id": "catalog-name-already-exists",
     * "message": "A catalog with that name already exists",
     * "parameters": [
     * "name"
     * ],
     * "parameter_values": [
     * "restaurants"
     * ]
     * }
     * ],
     * "message": "Invalid Request"
     * }
     *
     * ```
     *
     * ## Troubleshooting
     *
     * The following table lists possible returned errors and their associated troubleshooting steps.
     *
     * | Error | Troubleshooting |
     * | --- | --- |
     * | `catalog-array-invalid` | `catalogs` must be an array of objects. |
     * | `catalog-name-already-exists` | Catalog with that name already exists. |
     * | `catalog-name-too-large` | Character limit for a catalog name is 250. |
     * | `description-too-long` | Character limit for description is 250. |
     * | `field-names-not-unique` | The same field name is referenced twice. |
     * | `field-names-too-large` | Character limit for a field name is 250. |
     * | `id-not-first-column` | The `id` must be the first field in the array. Check that the type is a string. |
     * | `invalid_catalog_name` | Catalog name can only include letters, numbers, hyphens, and underscores. |
     * | `invalid-field-names` | Fields can only include letters, numbers, hyphens, and underscores. |
     * | `invalid-field-types` | Make sure the field types are valid. |
     * | `invalid-fields` | `fields` is not formatted correctly. |
     * | `reached-company-catalogs-limit` | Maximum number of catalogs reached. Contact your Braze account manager for more information. |
     * | `too-many-catalog-atoms` | You can only create one catalog per request. |
     * | `too-many-fields` | Number of fields limit is 30. |
     *
     * @param array $headerParameters {
     *
     * @var string $Content-Type
     * @var string $Authorization
     *             }
     */
    public function __construct(\Braze\Model\CatalogsPostBody $requestBody = null, array $headerParameters = [])
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
        return '/catalogs';
    }

    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \Braze\Model\CatalogsPostBody) {
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
     * @throws \Braze\Exception\PostCatalogBadRequestException
     * @throws \Braze\Exception\PostCatalogUnauthorizedException
     * @throws \Braze\Exception\PostCatalogForbiddenException
     * @throws \Braze\Exception\PostCatalogNotFoundException
     * @throws \Braze\Exception\PostCatalogTooManyRequestsException
     * @throws \Braze\Exception\PostCatalogInternalServerErrorException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return json_decode($body);
        }
        if (is_null($contentType) === false && (400 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Braze\Exception\PostCatalogBadRequestException($serializer->deserialize($body, 'Braze\\Model\\Error', 'json'), $response);
        }
        if (is_null($contentType) === false && (401 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Braze\Exception\PostCatalogUnauthorizedException($serializer->deserialize($body, 'Braze\\Model\\Error', 'json'), $response);
        }
        if (is_null($contentType) === false && (403 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Braze\Exception\PostCatalogForbiddenException($serializer->deserialize($body, 'Braze\\Model\\Error', 'json'), $response);
        }
        if (is_null($contentType) === false && (404 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Braze\Exception\PostCatalogNotFoundException($serializer->deserialize($body, 'Braze\\Model\\Error', 'json'), $response);
        }
        if (is_null($contentType) === false && (429 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Braze\Exception\PostCatalogTooManyRequestsException($serializer->deserialize($body, 'Braze\\Model\\Error', 'json'), $response);
        }
        if (is_null($contentType) === false && (500 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Braze\Exception\PostCatalogInternalServerErrorException($serializer->deserialize($body, 'Braze\\Model\\Error', 'json'), $response);
        }
    }

    public function getAuthenticationScopes(): array
    {
        return ['BearerAuth'];
    }
}
