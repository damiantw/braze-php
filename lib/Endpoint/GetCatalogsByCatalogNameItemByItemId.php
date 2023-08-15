<?php

declare(strict_types=1);

/*
 * This file has been auto generated by Jane,
 *
 * Do no edit it directly.
 */

namespace Braze\Endpoint;

class GetCatalogsByCatalogNameItemByItemId extends \Braze\Runtime\Client\BaseEndpoint implements \Braze\Runtime\Client\Endpoint
{
    use \Braze\Runtime\Client\EndpointTrait;
    protected $catalog_name;
    protected $item_id;

    /**
     * > Use this endpoint to return a catalog item and its content.
     *
     * To use this endpoint, you’ll need to generate an API key with the `catalogs.get_item` permission.
     *
     * ## Rate limit
     *
     * This endpoint has a shared rate limit of 50 requests per minute between all synchronous catalog item endpoints, as documented in [API rate limits](https://www.braze.com/docs/api/api_limits/).
     *
     * ## Path parameters
     *
     * | Parameter | Required | Data Type | Description |
     * | --- | --- | --- | --- |
     * | `catalog_name` | Required | String | Name of the catalog. |
     * | `item_id` | Required | String | The ID of the catalog item. |
     *
     * ## Request parameters
     *
     * There is no request body for this endpoint.
     *
     * ## Example request
     *
     * ```
     * curl --location --request GET 'https://rest.iad-03.braze.com/catalogs/restaurants/items/restaurant1' \
     * --header 'Content-Type: application/json' \
     * --header 'Authorization: Bearer YOUR-REST-API-KEY'
     *
     * ```
     *
     * ## Response
     *
     * There are two status code responses for this endpoint: `200` and `404`.
     *
     * ### Example success response
     *
     * The status code `200` could return the following response body.
     *
     * ``` json
     * {
     * "items": [
     * {
     * "id": "restaurant3",
     * "Name": "Restaurant1",
     * "City": "New York",
     * "Cuisine": "American",
     * "Rating": 5,
     * "Loyalty_Program": true,
     * "Open_Time": "2022-11-01T09:03:19.967Z"
     * }
     * ],
     * "message": "success"
     * }
     *
     * ```
     *
     * ### Example error response
     *
     * The status code `404` could return the following response. Refer to [Troubleshooting](#troubleshooting) for more information about errors you may encounter.
     *
     * ``` json
     * {
     * "errors": [
     * {
     * "id": "item-not-found",
     * "message": "Could not find item",
     * "parameters": [
     * "item_id"
     * ],
     * "parameter_values": [
     * "restaurant34"
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
     * The following table lists possible returned errors and their associated troubleshooting steps, if applicable.
     *
     * | Error | Troubleshooting |
     * | --- | --- |
     * | `catalog-not-found` | Check that the catalog name is valid. |
     * | `item-not-found` | Check that the item is in the catalog. |
     *
     * @param array $headerParameters {
     *
     * @var string $Content-Type
     * @var string $Authorization
     *             }
     */
    public function __construct(string $catalogName, string $itemId, array $headerParameters = [])
    {
        $this->catalog_name = $catalogName;
        $this->item_id = $itemId;
        $this->headerParameters = $headerParameters;
    }

    public function getMethod(): string
    {
        return 'GET';
    }

    public function getUri(): string
    {
        return str_replace(['{catalog_name}', '{item_id}'], [$this->catalog_name, $this->item_id], '/catalogs/{catalog_name}/items/{item_id}');
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
        $optionsResolver->setDefined(['Content-Type', 'Authorization']);
        $optionsResolver->setRequired([]);
        $optionsResolver->setDefaults([]);
        $optionsResolver->addAllowedTypes('Content-Type', ['string']);
        $optionsResolver->addAllowedTypes('Authorization', ['string']);

        return $optionsResolver;
    }

    /**
     * @throws \Braze\Exception\GetCatalogsByCatalogNameItemByItemIdBadRequestException
     * @throws \Braze\Exception\GetCatalogsByCatalogNameItemByItemIdUnauthorizedException
     * @throws \Braze\Exception\GetCatalogsByCatalogNameItemByItemIdForbiddenException
     * @throws \Braze\Exception\GetCatalogsByCatalogNameItemByItemIdNotFoundException
     * @throws \Braze\Exception\GetCatalogsByCatalogNameItemByItemIdTooManyRequestsException
     * @throws \Braze\Exception\GetCatalogsByCatalogNameItemByItemIdInternalServerErrorException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return json_decode($body);
        }
        if (is_null($contentType) === false && (400 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Braze\Exception\GetCatalogsByCatalogNameItemByItemIdBadRequestException($serializer->deserialize($body, 'Braze\\Model\\Error', 'json'), $response);
        }
        if (is_null($contentType) === false && (401 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Braze\Exception\GetCatalogsByCatalogNameItemByItemIdUnauthorizedException($serializer->deserialize($body, 'Braze\\Model\\Error', 'json'), $response);
        }
        if (is_null($contentType) === false && (403 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Braze\Exception\GetCatalogsByCatalogNameItemByItemIdForbiddenException($serializer->deserialize($body, 'Braze\\Model\\Error', 'json'), $response);
        }
        if (is_null($contentType) === false && (404 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Braze\Exception\GetCatalogsByCatalogNameItemByItemIdNotFoundException($serializer->deserialize($body, 'Braze\\Model\\Error', 'json'), $response);
        }
        if (is_null($contentType) === false && (429 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Braze\Exception\GetCatalogsByCatalogNameItemByItemIdTooManyRequestsException($serializer->deserialize($body, 'Braze\\Model\\Error', 'json'), $response);
        }
        if (is_null($contentType) === false && (500 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Braze\Exception\GetCatalogsByCatalogNameItemByItemIdInternalServerErrorException($serializer->deserialize($body, 'Braze\\Model\\Error', 'json'), $response);
        }
    }

    public function getAuthenticationScopes(): array
    {
        return ['BearerAuth'];
    }
}
