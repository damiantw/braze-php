<?php

declare(strict_types=1);

/*
 * This file has been auto generated by Jane,
 *
 * Do no edit it directly.
 */

namespace Braze\Endpoint;

class PostUsersExportSegment extends \Braze\Runtime\Client\BaseEndpoint implements \Braze\Runtime\Client\Endpoint
{
    use \Braze\Runtime\Client\EndpointTrait;

    /**
     * > Use this endpoint to export all the users within a segment.
     *
     * User data is exported as multiple files of user JSON objects separated by new lines (i.e., one JSON object per line).
     *
     * Data is exported to an automatically generated URL, or to an S3 bucket if this integration is already set up.
     *
     * This endpoint is currently not supported by Google Cloud Storage.
     *
     * Note that a company may run at most one export per segment using this endpoint at a given time. Wait for your export to complete before retrying.
     *
     * > Beginning December 2021, the following changed for this API:
     *
     * > 1\. The fields_to_export field in this API request is required. The option to default to all fields has been removed.
     * 2\. The fields for custom_events, purchases, campaigns_received, and canvases_received only contain data from the last 90 days.
     *
     *
     * Note: If you are using our [older navigation](https://www.braze.com/docs/navigation), `segment_id` can be found at **Developer Console > API Settings**.
     *
     * To use this endpoint, you’ll need to generate an API key with the `users.export.segment` permission.
     *
     * ## Rate limit
     *
     * We apply the default Braze rate limit of 250,000 requests per hour to this endpoint, as documented in [API rate limits](https://www.braze.com/docs/api/api_limits/).
     *
     * ## Credential-based response details
     *
     * For information regarding credentials-based response details, visit this [section](https://www.braze.com/docs/api/endpoints/export/user_data/post_users_segment/#credentials-based-response-details) in the Braze API docs.
     *
     * ## Request parameters
     *
     * | Parameter | Required | Data Type | Description |
     * | --- | --- | --- | --- |
     * | `segment_id` | Required | String | Identifier for the segment to be exported. See [segment identifier](https://www.braze.com/docs/api/identifier_types/).  <br>  <br>The segment_id for a given segment can be found in your **Settings > Setup and Testing > API Keys** within your Braze account or you can use the [Segment List Endpoint](https://www.braze.com/docs/api/endpoints/export/segments/get_segment/). |
     * | `callback_endpoint` | Optional | String | Endpoint to post a download URL to when the export is available. |
     * | `fields_to_export` | Required\* | Array of strings | Name of user data fields to export, you may also export custom attributes.  <br>  <br>\*Beginning April 2021, new accounts must specify specific fields to export. |
     * | `output_format` | Optional | String | When using your own S3 bucket, allows you to specify file format as `zip` or `gzip`. Defaults to ZIP file format. |
     *
     * ### Fields to export
     *
     * The following is a list of valid `fields_to_export`. Using `fields_to_export` to minimize the data returned can improve response time of this API endpoint:
     *
     * | Field to export | Data type | Description |
     * | --- | --- | --- |
     * | `apps` | Array | Apps this user has logged sessions for, which includes the fields:  <br>  <br>\- `name`: app name  <br>\- `platform`: app platform, such as iOS, Android, or Web  <br>\- `version`: app version number or name  <br>\- `sessions`: total number of sessions for this app  <br>\- `first_used`: date of first session  <br>\- `last_used`: date of last session  <br>  <br>All fields are strings. |
     * | `attributed_campaign` | String | Data from [attribution integrations](https:/www.braze.com/docs/partners/message_orchestration/attribution), if set up. Identifier for a particular ad campaign. |
     * | `attributed_source` | String | Data from [attribution integrations](https:/www.braze.com/docs/partners/message_orchestration/attribution), if set up. Identifier for the platform the ad was on. |
     * | `attributed_adgroup` | String | Data from [attribution integrations](https:/www.braze.com/docs/partners/message_orchestration/attribution), if set up. Identifier for an optional sub-grouping below campaign. |
     * | `attributed_ad` | String | Data from [attribution integrations](https:/www.braze.com/docs/partners/message_orchestration/attribution), if set up. Identifier for an optional sub-grouping below campaign and adgroup. |
     * | `braze_id` | String | Device-specific unique user identifier set by Braze for this user. |
     * | `country` | String | User's country using [ISO 3166-1 alpha-2](https://en.wikipedia.org/wiki/ISO_3166-1_alpha-2) standard. |
     * | `created_at` | String | Date and time for when the user profile was created, in ISO 8601 format. |
     * | `custom_attributes` | Object | Custom attribute key-value pairs for this user. |
     * | `custom_events` | Array | Custom events attributed to this user in the last 90 days. |
     * | `devices` | Array | Information about the user's device, which could include the following depending on platform:  <br>  <br>\- `model`: Device's model name  <br>\- `os`: Device's operating system  <br>\- `carrier`: Device's service carrier, if available  <br>\- `idfv`: (iOS) Braze's device identifier, the Apple Identifier for Vendor, if exists  <br>\- `idfa`: (iOS) Identifier for Advertising, if exists  <br>\- `device_id`: (Android) Braze's device identifier  <br>\- `google_ad_id`: (Android) Google Play Advertising Identifier, if exists  <br>\- `roku_ad_id`: (Roku) Roku Advertising Identifier  <br>\- `ad_tracking_enabled`: If ad tracking is enabled on the device, can be true or false |
     * | `dob` | String | User's date of birth in the format `YYYY-MM-DD`. |
     * | `email` | String | User's email address. |
     * | `external_id` | String | Unique user identifier for identified users. |
     * | `first_name` | String | User's first name. |
     * | `gender` | String | User's gender. Possible values are:  <br>  <br>\- `M`: male  <br>\- `F`: female  <br>\- `O`: other  <br>\- `N`: not applicable  <br>\- `P`: prefer not to say  <br>\- `nil`: unknown |
     * | `home_city` | String | User's home city. |
     * | `language` | String | User's language in ISO-639-1 standard. |
     * | `last_coordinates` | Array of floats | User's most recent device location, formatted as `[longitude, latitude]`. |
     * | `last_name` | String | User's last name. |
     * | `phone` | String | User's telephone number in E.164 format. |
     * | `purchase`s | Array | Purchases this user has made in the last 90 days. |
     * | `random_bucket` | Integer | User's [random bucket number](https:/www.braze.com/docs/user_guide/data_and_analytics/braze_currents/event_glossary/customer_behavior_events#random-bucket-number-event), used to create uniformly distributed segments of random users. |
     * | `time_zone` | String | User's time zone in the same format as the IANA Time Zone Database. |
     * | `total_revenue` | Float | Total revenue attributed to this user. Total revenue is calculated based on purchases the user made during conversion windows for the campaigns and Canvases they received. |
     * | `uninstalled_at` | Timestamp | Date and time the user uninstalls the app. Omitted if the app has not been uninstalled. |
     * | `user_aliases` | Object | [User aliases object](https:/www.braze.com/docs/api/objects_filters/user_alias_object#user-alias-object-specification) containing the `alias_name` and `alias_label`, if exists. |
     *
     * ### Important reminders
     *
     * - The fields for `custom_events`, `purchases`, `campaigns_received`, and `canvases_received` will contain only contain data from the last 90 days.
     * - Both `custom_events` and `purchases` contain fields for `first` and `count`. Both of these fields will reflect information from all time, and will not be limited to just data from the last 90 days. For example, if a particular user first did the event prior to 90 days ago, this will be accurately reflected in the `first` field, and the `count` field will take into account events that occurred prior to the last 90 days as well.
     * - The number of concurrent segment exports a company can run at the endpoint level is capped at 100. Attempts that surpass this limit will result in an error.
     *
     *
     * ### Response
     *
     * ``` json
     * Content-Type: application/json
     * Authorization: Bearer YOUR-REST-API-KEY
     * {
     * "message": (required, string) the status of the export, returns 'success' when completed without errors,
     * "object_prefix": (required, string) the filename prefix that will be used for the JSON file produced by this export, e.g. 'bb8e2a91-c4aa-478b-b3f2-a4ee91731ad1-1464728599',
     * "url" : (optional, string) the URL where the segment export data can be downloaded if you do not have your own S3 credentials
     * }
     *
     * ```
     *
     * Once made available, the URL will only be valid for a few hours. As such, we highly recommend that you add your own S3 credentials to Braze.
     *
     * ### Sample user export file output
     *
     * User export object (we will include the least data possible - if a field is missing from the object it should be assumed to be null, false, or empty):
     *
     * ``` json
     * {
     * "external_id" : (string),
     * "user_aliases" : [
     * {
     * "alias_name" : (string),
     * "alias_label" : (string)
     * }
     * ],
     * "braze_id": (string),
     * "first_name" : (string),
     * "last_name" : (string),
     * "email" : (string),
     * "dob" : (string) date for the user's date of birth,
     * "home_city" : (string),
     * "country" : (string),
     * "phone" : (string),
     * "language" : (string) ISO-639 two letter code,
     * "time_zone" : (string),
     * "last_coordinates" : (array of float) [lon, lat],
     * "gender" : (string) "M" | "F",
     * "total_revenue" : (float),
     * "attributed_campaign" : (string),
     * "attributed_source" : (string),
     * "attributed_adgroup" : (string),
     * "attributed_ad" : (string),
     * "push_subscribe" : (string) "opted_in" | "subscribed" | "unsubscribed",
     * "email_subscribe" : (string) "opted_in" | "subscribed" | "unsubscribed",
     * "custom_attributes" : (object) custom attribute key value pairs,
     * "custom_events" : [
     * {
     * "name" : (string),
     * "first" : (string) date,
     * "last" : (string) date,
     * "count" : (int)
     * },
     * ...
     * ],
     * "purchases" : [
     * {
     * "name" : (string),
     * "first" : (string) date,
     * "last" : (string) date,
     * "count" : (int)
     * },
     * ...
     * ],
     * "devices" : [
     * {
     * "model" : (string),
     * "os" : (string),
     * "carrier" : (string),
     * "idfv" : (string) only included for iOS devices,
     * "idfa" : (string) only included for iOS devices when IDFA collection is enabled,
     * "google_ad_id" : (string) only included for Android devices when Google Play Advertising Identifier collection is enabled,
     * "roku_ad_id" : (string) only included for Roku devices,
     * "windows_ad_id" : (string) only included for Windows devices,
     * "ad_tracking_enabled" : (bool)
     * },
     * ...
     * ],
     * "push_tokens" : [
     * {
     * "app" : (string) app name,
     * "platform" : (string),
     * "token" : (string)
     * },
     * ...
     * ],
     * "apps" : [
     * {
     * "name" : (string),
     * "platform" : (string),
     * "version" : (string),
     * "sessions" : (string),
     * "first_used" : (string) date,
     * "last_used" : (string) date
     * },
     * ...
     * ],
     * "campaigns_received" : [
     * {
     * "name" : (string),
     * "last_received" : (string) date,
     * "engaged" : {
     * "opened_email" : (bool),
     * "opened_push" : (bool),
     * "clicked_email" : (bool),
     * "clicked_in_app_message" : (bool)
     * },
     * "converted" : (bool),
     * "api_campaign_id" : (string),
     * "variation_name" : (optional, string) exists only if it is a multivariate campaign,
     * "variation_api_id" : (optional, string) exists only if it is a multivariate campaign,
     * "in_control" : (optional, bool) exists only if it is a multivariate campaign
     * },
     * ...
     * ],
     * "canvases_received": [
     * {
     * "name": (string),
     * "api_canvas_id": (string),
     * "last_received_message": (string) date,
     * "last_entered": (string) date,
     * "variation_name": (string),
     * "in_control": (bool),
     * "last_exited": (string) date,
     * "steps_received": [
     * {
     * "name": (string),
     * "api_canvas_step_id": (string),
     * "last_received": (string) date
     * },
     * {
     * "name": (string),
     * "api_canvas_step_id": (string),
     * "last_received": (string) date
     * },
     * {
     * "name": (string),
     * "api_canvas_step_id": (string),
     * "last_received": (string) date
     * }
     * ]
     * },
     * ...
     * ],
     * "cards_clicked" : [
     * {
     * "name" : (string)
     * },
     * ...
     * ]
     * }
     *
     * ```
     *
     * Sample output
     *
     * ``` json
     * {
     * "created_at" : "2020-07-10 15:00:00.000 UTC",
     * "external_id" : "A8i3mkd99",
     * "user_aliases" : [
     * {
     * "alias_name" : "user_123",
     * "alias_label" : "amplitude_id"
     * }
     * ],
     * "braze_id": "5fbd99bac125ca40511f2cb1",
     * "random_bucket" : 2365,
     * "first_name" : "Jane",
     * "last_name" : "Doe",
     * "email" : "example@braze.com",
     * "dob" : "1980-12-21",
     * "home_city" : "Chicago",
     * "country" : "US",
     * "phone" : "+442071838750",
     * "language" : "en",
     * "time_zone" : "Eastern Time (US & Canada)",
     * "last_coordinates" : [41.84157636433568, -87.83520818508256],
     * "gender" : "F",
     * "total_revenue" : 65,
     * "attributed_campaign" : "braze_test_campaign_072219",
     * "attributed_source" : "braze_test_source_072219",
     * "attributed_adgroup" : "braze_test_adgroup_072219",
     * "attributed_ad" : "braze_test_ad_072219",
     * "push_subscribe" : "opted_in",
     * "push_opted_in_at": "2020-01-26T22:45:53.953Z",
     * "email_subscribe" : "subscribed",
     * "custom_attributes":
     * {
     * "loyaltyId": "37c98b9d-9a7f-4b2f-a125-d873c5152856",
     * "loyaltyPoints": "321",
     * "loyaltyPointsNumber": 107
     * },
     * "custom_events": [
     * {
     * "name": "Loyalty Acknowledgement",
     * "first": "2021-06-28T17:02:43.032Z",
     * "last": "2021-06-28T17:02:43.032Z",
     * "count": 1
     * },
     * ...
     * ],
     * "purchases": [
     * {
     * "name": "item_40834",
     * "first": "2021-09-05T03:45:50.540Z",
     * "last": "2022-06-03T17:30:41.201Z",
     * "count": 10
     * },
     * ...
     * ],
     * "devices": [
     * {
     * "model": "Pixel XL",
     * "os": "Android (Q)",
     * "carrier": null,
     * "device_id": "312ef2c1-83db-4789-967-554545a1bf7a",
     * "ad_tracking_enabled": true
     * },
     * ...
     * ],
     * "push_tokens": [
     * {
     * "app": "MovieCanon",
     * "platform": "Android",
     * "token": "12345abcd",
     * "device_id": "312ef2c1-83db-4789-967-554545a1bf7a",
     * "notifications_enabled": true
     * },
     * ...
     * ],
     * "apps": [
     * {
     * "name": "MovieCannon",
     * "platform": "Android",
     * "version": "3.29.0",
     * "sessions": 1129,
     * "first_used": "2020-02-02T19:56:19.142Z",
     * "last_used": "2021-11-11T00:25:19.201Z"
     * },
     * ...
     * ],
     * "campaigns_received": [
     * {
     * "name": "Email Unsubscribe",
     * "api_campaign_id": "d72fdc84-ddda-44f1-a0d5-0e79f47ef942",
     * "last_received": "2022-06-02T03:07:38.105Z",
     * "engaged":
     * {
     * "opened_email": true
     * },
     * "converted": true,
     * "multiple_converted":
     * {
     * "Primary Conversion Event - A": true
     * },
     * "in_control": false,
     * "variation_name": "Variant 1",
     * "variation_api_id": "1bddc73a-a134-4784-9134-5b5574a9e0b8"
     * },
     * ...
     * ],
     * "canvases_received": [
     * {
     * "name": "Non Global  Holdout Group 4/21/21",
     * "api_canvas_id": "46972a9d-dc81-473f-aa03-e3473b4ed781",
     * "last_received_message": "2021-07-07T20:46:24.136Z",
     * "last_entered": "2021-07-07T20:45:24.000+00:00",
     * "variation_name": "Variant 1",
     * "in_control": false,
     * "last_entered_control_at": null,
     * "last_exited": "2021-07-07T20:46:24.136Z",
     * "steps_received": [
     * {
     * "name": "Step",
     * "api_canvas_step_id": "43d1a349-c3c8-4be1-9fbe-ce708e4d1c39",
     * "last_received": "2021-07-07T20:46:24.136Z"
     * },
     * ...
     * ]
     * }
     * ...
     * ],
     * "cards_clicked" : [
     * {
     * "name" : "Loyalty Promo"
     * },
     * ...
     * ]
     * }
     *
     * ```
     *
     * > Tip: For help with CSV and API exports, visit Export troubleshooting.
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
        return '/users/export/segment';
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
     * @throws \Braze\Exception\PostUsersExportSegmentBadRequestException
     * @throws \Braze\Exception\PostUsersExportSegmentUnauthorizedException
     * @throws \Braze\Exception\PostUsersExportSegmentForbiddenException
     * @throws \Braze\Exception\PostUsersExportSegmentNotFoundException
     * @throws \Braze\Exception\PostUsersExportSegmentTooManyRequestsException
     * @throws \Braze\Exception\PostUsersExportSegmentInternalServerErrorException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return json_decode($body);
        }
        if (is_null($contentType) === false && (400 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Braze\Exception\PostUsersExportSegmentBadRequestException($serializer->deserialize($body, 'Braze\\Model\\Error', 'json'), $response);
        }
        if (is_null($contentType) === false && (401 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Braze\Exception\PostUsersExportSegmentUnauthorizedException($serializer->deserialize($body, 'Braze\\Model\\Error', 'json'), $response);
        }
        if (is_null($contentType) === false && (403 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Braze\Exception\PostUsersExportSegmentForbiddenException($serializer->deserialize($body, 'Braze\\Model\\Error', 'json'), $response);
        }
        if (is_null($contentType) === false && (404 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Braze\Exception\PostUsersExportSegmentNotFoundException($serializer->deserialize($body, 'Braze\\Model\\Error', 'json'), $response);
        }
        if (is_null($contentType) === false && (429 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Braze\Exception\PostUsersExportSegmentTooManyRequestsException($serializer->deserialize($body, 'Braze\\Model\\Error', 'json'), $response);
        }
        if (is_null($contentType) === false && (500 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Braze\Exception\PostUsersExportSegmentInternalServerErrorException($serializer->deserialize($body, 'Braze\\Model\\Error', 'json'), $response);
        }
    }

    public function getAuthenticationScopes(): array
    {
        return ['BearerAuth'];
    }
}
