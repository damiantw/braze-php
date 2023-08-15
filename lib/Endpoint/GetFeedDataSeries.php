<?php

declare(strict_types=1);

/*
 * This file has been auto generated by Jane,
 *
 * Do no edit it directly.
 */

namespace Braze\Endpoint;

class GetFeedDataSeries extends \Braze\Runtime\Client\BaseEndpoint implements \Braze\Runtime\Client\Endpoint
{
    use \Braze\Runtime\Client\EndpointTrait;

    /**
     * > Use this endpoint to retrieve a daily series of engagement stats for a card over time.
     *
     * Note: If you are using our [older navigation](https://www.braze.com/docs/navigation), \`card_id\` can be found at **Developer Console > API Settings**.
     *
     * To use this endpoint, you’ll need to generate an API key with the `feed.data_series` permission.
     *
     * ## Rate limit
     *
     * We apply the default Braze rate limit of 250,000 requests per hour to this endpoint, as documented in [API rate limits](https://www.braze.com/docs/api/api_limits/).
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
     * "time" : (string) the point in time - as ISO 8601 extended when unit is "hour" and as ISO 8601 date when unit is "day",
     * "clicks" : (int) the number of clicks,
     * "impressions" : (int) the number of impressions,
     * "unique_clicks" : (int) the number of unique clicks,
     * "unique_impressions" : (int) the number of unique impressions
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
     * @var string $card_id (Required) String
     *
     * See [Card API identifier](https://www.braze.com/docs/api/identifier_types/).
     *
     * The `card_id` for a given card can be found in the **Settings > Setup and Testing > API Keys** page and on the card details page within your dashboard, or you can use the [News Feed List Endpoint](https://www.braze.com/docs/api/endpoints/export/news_feed/get_news_feed_cards/).
     * @var int $length (Required) Integer
     *
     * Max number of units (days or hours) before `ending_at` to include in the returned series. Must be between 1 and 100 (inclusive).
     * @var string $unit (Optional) String
     *
     * Unit of time between data points. Can be `day` or `hour`, defaults to `day`.
     * @var string $ending_at (Optional) Datetime ([ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) string)
     *
     * Date on which the data series should end. Defaults to time of the request.
     *
     * }
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
        return '/feed/data_series';
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
        $optionsResolver->setDefined(['card_id', 'length', 'unit', 'ending_at']);
        $optionsResolver->setRequired([]);
        $optionsResolver->setDefaults([]);
        $optionsResolver->addAllowedTypes('card_id', ['string']);
        $optionsResolver->addAllowedTypes('length', ['int']);
        $optionsResolver->addAllowedTypes('unit', ['string']);
        $optionsResolver->addAllowedTypes('ending_at', ['string']);

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
     * @throws \Braze\Exception\GetFeedDataSeriesBadRequestException
     * @throws \Braze\Exception\GetFeedDataSeriesUnauthorizedException
     * @throws \Braze\Exception\GetFeedDataSeriesForbiddenException
     * @throws \Braze\Exception\GetFeedDataSeriesNotFoundException
     * @throws \Braze\Exception\GetFeedDataSeriesTooManyRequestsException
     * @throws \Braze\Exception\GetFeedDataSeriesInternalServerErrorException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return json_decode($body);
        }
        if (is_null($contentType) === false && (400 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Braze\Exception\GetFeedDataSeriesBadRequestException($serializer->deserialize($body, 'Braze\\Model\\Error', 'json'), $response);
        }
        if (is_null($contentType) === false && (401 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Braze\Exception\GetFeedDataSeriesUnauthorizedException($serializer->deserialize($body, 'Braze\\Model\\Error', 'json'), $response);
        }
        if (is_null($contentType) === false && (403 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Braze\Exception\GetFeedDataSeriesForbiddenException($serializer->deserialize($body, 'Braze\\Model\\Error', 'json'), $response);
        }
        if (is_null($contentType) === false && (404 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Braze\Exception\GetFeedDataSeriesNotFoundException($serializer->deserialize($body, 'Braze\\Model\\Error', 'json'), $response);
        }
        if (is_null($contentType) === false && (429 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Braze\Exception\GetFeedDataSeriesTooManyRequestsException($serializer->deserialize($body, 'Braze\\Model\\Error', 'json'), $response);
        }
        if (is_null($contentType) === false && (500 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Braze\Exception\GetFeedDataSeriesInternalServerErrorException($serializer->deserialize($body, 'Braze\\Model\\Error', 'json'), $response);
        }
    }

    public function getAuthenticationScopes(): array
    {
        return ['BearerAuth'];
    }
}
