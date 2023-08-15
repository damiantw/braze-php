<?php

declare(strict_types=1);

/*
 * This file has been auto generated by Jane,
 *
 * Do no edit it directly.
 */

namespace Braze\Endpoint;

class GetCanvasDataSeries extends \Braze\Runtime\Client\BaseEndpoint implements \Braze\Runtime\Client\Endpoint
{
    use \Braze\Runtime\Client\EndpointTrait;

    /**
     * > Use this endpoint to export time series data for a Canvas.
     *
     * To use this endpoint, you’ll need to generate an API key with the `canvas.data_series` permission.
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
     * "data": {
     * "name": (string) Canvas name,
     * "stats": [
     * {
     * "time": (string) date as ISO 8601 date,
     * "total_stats": {
     * "revenue": (float),
     * "conversions": (int),
     * "conversions_by_entry_time": (int),
     * "entries": (int)
     * },
     * "variant_stats": (optional) {
     * "00000000-0000-0000-0000-0000000000000": (API identifier for variant) {
     * "name": (string) name of variant,
     * "revenue": (int),
     * "conversions": (int),
     * "conversions_by_entry_time": (int),
     * "entries": (int)
     * },
     * ... (more variants)
     * },
     * "step_stats": (optional) {
     * "00000000-0000-0000-0000-0000000000000": (API identifier for step) {
     * "name": (string) name of step,
     * "revenue": (float),
     * "conversions": (int),
     * "conversions_by_entry_time": (int),
     * "messages": {
     * "email": [
     * {
     * "sent": (int),
     * "opens": (int),
     * "unique_opens": (int),
     * "clicks": (int),
     * ... (more stats)
     * }
     * ],
     * ... (more channels)
     * }
     * },
     * ... (more steps)
     * }
     * },
     * ... (more stats by time)
     * ]
     * },
     * "message": (required, string) the status of the export, returns 'success' when completed without errors
     * }
     *
     * ```
     *
     * > **Tip:** For help with CSV and API exports, visit [Export troubleshooting](https://www.braze.com/docs/user_guide/data_and_analytics/export_braze_data/export_troubleshooting/).
     *
     * @param array $queryParameters {
     *
     * @var string $canvas_id (Required) String
     *
     * See [Canvas API Identifier](https://www.braze.com/docs/api/identifier_types/).
     * @var string $ending_at (Required) Datetime ([ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) string)
     *
     * Date on which the data export should end. Defaults to time of the request.
     * @var string $starting_at (Optional*) Datetime ([ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) string)
     *
     * Date on which the data export should begin.
     *
     *Either `length` or `starting_at` is required.
     * @var int $length (Optional*) String
     *
     * Maximum number of days before `ending_at` to include in the returned series. Must be between 1 and 14 (inclusive).
     *
     *Either `length` or `starting_at` is required.
     * @var bool $include_variant_breakdown (Optional) Boolean
     *
     * Whether or not to include variant stats (defaults to false)
     * @var bool $include_step_breakdown (Optional) Boolean
     *
     * Whether or not to include step stats (defaults to false)
     * @var bool $include_deleted_step_data (Optional) Boolean
     *
     * Whether or not to include step stats for deleted steps (defaults to false).
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
        return '/canvas/data_series';
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
        $optionsResolver->setDefined(['canvas_id', 'ending_at', 'starting_at', 'length', 'include_variant_breakdown', 'include_step_breakdown', 'include_deleted_step_data']);
        $optionsResolver->setRequired([]);
        $optionsResolver->setDefaults([]);
        $optionsResolver->addAllowedTypes('canvas_id', ['string']);
        $optionsResolver->addAllowedTypes('ending_at', ['string']);
        $optionsResolver->addAllowedTypes('starting_at', ['string']);
        $optionsResolver->addAllowedTypes('length', ['int']);
        $optionsResolver->addAllowedTypes('include_variant_breakdown', ['bool']);
        $optionsResolver->addAllowedTypes('include_step_breakdown', ['bool']);
        $optionsResolver->addAllowedTypes('include_deleted_step_data', ['bool']);

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
     * @throws \Braze\Exception\GetCanvasDataSeriesBadRequestException
     * @throws \Braze\Exception\GetCanvasDataSeriesUnauthorizedException
     * @throws \Braze\Exception\GetCanvasDataSeriesForbiddenException
     * @throws \Braze\Exception\GetCanvasDataSeriesNotFoundException
     * @throws \Braze\Exception\GetCanvasDataSeriesTooManyRequestsException
     * @throws \Braze\Exception\GetCanvasDataSeriesInternalServerErrorException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return json_decode($body);
        }
        if (is_null($contentType) === false && (400 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Braze\Exception\GetCanvasDataSeriesBadRequestException($serializer->deserialize($body, 'Braze\\Model\\Error', 'json'), $response);
        }
        if (is_null($contentType) === false && (401 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Braze\Exception\GetCanvasDataSeriesUnauthorizedException($serializer->deserialize($body, 'Braze\\Model\\Error', 'json'), $response);
        }
        if (is_null($contentType) === false && (403 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Braze\Exception\GetCanvasDataSeriesForbiddenException($serializer->deserialize($body, 'Braze\\Model\\Error', 'json'), $response);
        }
        if (is_null($contentType) === false && (404 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Braze\Exception\GetCanvasDataSeriesNotFoundException($serializer->deserialize($body, 'Braze\\Model\\Error', 'json'), $response);
        }
        if (is_null($contentType) === false && (429 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Braze\Exception\GetCanvasDataSeriesTooManyRequestsException($serializer->deserialize($body, 'Braze\\Model\\Error', 'json'), $response);
        }
        if (is_null($contentType) === false && (500 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Braze\Exception\GetCanvasDataSeriesInternalServerErrorException($serializer->deserialize($body, 'Braze\\Model\\Error', 'json'), $response);
        }
    }

    public function getAuthenticationScopes(): array
    {
        return ['BearerAuth'];
    }
}
