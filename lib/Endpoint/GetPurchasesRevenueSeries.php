<?php

declare(strict_types=1);

/*
 * This file has been auto generated by Jane,
 *
 * Do no edit it directly.
 */

namespace Braze\Endpoint;

class GetPurchasesRevenueSeries extends \Braze\Runtime\Client\BaseEndpoint implements \Braze\Runtime\Client\Endpoint
{
    use \Braze\Runtime\Client\EndpointTrait;

    /**
     * > Use this endpoint to return the total money spent in your app over a time range.
     *
     * To use this endpoint, you’ll need to generate an API key with the `purchases.revenue_series` permission.
     *
     * ## Rate limit
     *
     * For customers who onboarded with Braze on or after September 16, 2021, we apply a shared rate limit of 1,000 requests per hour to this endpoint. This rate limit is shared with the `/events/list` endpoint, as documented in [API rate limits](https://www.braze.com/docs/api/api_limits/).
     *
     * ## Example request
     *
     * ```
     * curl --location --request GET 'https://rest.iad-01.braze.com/purchases/revenue_series?length=100' \
     * --header 'Authorization: Bearer YOUR-REST-API-KEY'
     *
     * ```
     *
     * ## Response
     *
     * ``` json
     * Content-Type: application/json
     * Authorization: Bearer YOUR-REST-API-KEY
     * {
     * "message": (required, string) the status of the export, returns 'success' when completed without errors,
     * "data" : [
     * {
     * "time" : (string) the date as ISO 8601 date,
     * "revenue" : (int) amount of revenue for the time period
     * },
     * ...
     * ]
     * }
     *
     * ```
     *
     * > **Tip:** For help with CSV and API exports, visit [Export troubleshooting](https://www.braze.com/docs/user_guide/data_and_analytics/export_braze_data/export_troubleshooting/).
     *
     * @param array $queryParameters {
     *
     * @var string $ending_at (Optional) Datetime (ISO 8601 string)
     *             Date on which the data series should end. Defaults to time of the request.
     * @var int    $length (Required) Integer
     *             Maximum number of days before ending_at to include in the returned series. Must be between 1 and 100 (inclusive).
     * @var int    $unit (Optional) String
     *             Unit of time between data points. Can be `day` or `hour`, defaults to `day`.
     * @var string $app_id (Optional) String
     *             App API identifier retrieved from the Settings > Setup and Testing > API Keys to limit analytics to a specific app
     * @var string $product (Optional) String
     *             Name of product to filter response by. If excluded, results for all apps will be returned.
     *             }
     *
     * @param array $headerParameters {
     *
     * @var string $Authorization
     *             }
     */
    public function __construct(array $queryParameters = [], array $headerParameters = [])
    {
        $this->queryParameters = $queryParameters;
        $this->headerParameters = $headerParameters;
    }

    public function getMethod(): string
    {
        return 'GET';
    }

    public function getUri(): string
    {
        return '/purchases/revenue_series';
    }

    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        return [[], null];
    }

    public function getExtraHeaders(): array
    {
        return ['Accept' => ['application/json']];
    }

    protected function getQueryOptionsResolver(): \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getQueryOptionsResolver();
        $optionsResolver->setDefined(['ending_at', 'length', 'unit', 'app_id', 'product']);
        $optionsResolver->setRequired([]);
        $optionsResolver->setDefaults([]);
        $optionsResolver->addAllowedTypes('ending_at', ['string']);
        $optionsResolver->addAllowedTypes('length', ['int']);
        $optionsResolver->addAllowedTypes('unit', ['int']);
        $optionsResolver->addAllowedTypes('app_id', ['string']);
        $optionsResolver->addAllowedTypes('product', ['string']);

        return $optionsResolver;
    }

    protected function getHeadersOptionsResolver(): \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getHeadersOptionsResolver();
        $optionsResolver->setDefined(['Authorization']);
        $optionsResolver->setRequired([]);
        $optionsResolver->setDefaults([]);
        $optionsResolver->addAllowedTypes('Authorization', ['string']);

        return $optionsResolver;
    }

    /**
     * @throws \Braze\Exception\GetPurchasesRevenueSeriesBadRequestException
     * @throws \Braze\Exception\GetPurchasesRevenueSeriesUnauthorizedException
     * @throws \Braze\Exception\GetPurchasesRevenueSeriesForbiddenException
     * @throws \Braze\Exception\GetPurchasesRevenueSeriesNotFoundException
     * @throws \Braze\Exception\GetPurchasesRevenueSeriesTooManyRequestsException
     * @throws \Braze\Exception\GetPurchasesRevenueSeriesInternalServerErrorException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return json_decode($body);
        }
        if (is_null($contentType) === false && (400 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Braze\Exception\GetPurchasesRevenueSeriesBadRequestException($serializer->deserialize($body, 'Braze\\Model\\Error', 'json'), $response);
        }
        if (is_null($contentType) === false && (401 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Braze\Exception\GetPurchasesRevenueSeriesUnauthorizedException($serializer->deserialize($body, 'Braze\\Model\\Error', 'json'), $response);
        }
        if (is_null($contentType) === false && (403 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Braze\Exception\GetPurchasesRevenueSeriesForbiddenException($serializer->deserialize($body, 'Braze\\Model\\Error', 'json'), $response);
        }
        if (is_null($contentType) === false && (404 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Braze\Exception\GetPurchasesRevenueSeriesNotFoundException($serializer->deserialize($body, 'Braze\\Model\\Error', 'json'), $response);
        }
        if (is_null($contentType) === false && (429 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Braze\Exception\GetPurchasesRevenueSeriesTooManyRequestsException($serializer->deserialize($body, 'Braze\\Model\\Error', 'json'), $response);
        }
        if (is_null($contentType) === false && (500 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Braze\Exception\GetPurchasesRevenueSeriesInternalServerErrorException($serializer->deserialize($body, 'Braze\\Model\\Error', 'json'), $response);
        }
    }

    public function getAuthenticationScopes(): array
    {
        return ['BearerAuth'];
    }
}
