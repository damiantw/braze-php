<?php

declare(strict_types=1);

/*
 * This file has been auto generated by Jane,
 *
 * Do no edit it directly.
 */

namespace Braze\Endpoint;

class PostTransactionalV1CampaignsByCampaignIdSend extends \Braze\Runtime\Client\BaseEndpoint implements \Braze\Runtime\Client\Endpoint
{
    use \Braze\Runtime\Client\EndpointTrait;
    protected $campaign_id;

    /**
     * > Use this endpoint to send immediate, ad-hoc transactional messages to a designated user.
     *
     * To use this endpoint, you’ll need to generate an API key with the `transactional.send` permission.
     *
     * This endpoint is used alongside the creation of a [Transactional Email campaign](https://www.braze.com/docs/api/api_campaigns/transactional_campaigns) and corresponding campaign ID.
     *
     * > **Important:** Transactional Email is currently available as part of select Braze packages. Reach out to your Braze customer success manager for more details.
     *
     *
     * Similar to the [Send triggered campaign endpoint](https://www.braze.com/docs/api/endpoints/messaging/send_messages/post_send_triggered_campaigns/), this campaign type allows you to house message content inside of the Braze dashboard while dictating when and to whom a message is sent via your API. Unlike the Send triggered campaign endpoint, which accepts an audience or segment to send messages to, a request to this endpoint must specify a single user either by `external_user_id` or `user_alias`, as this campaign type is purpose-built for 1:1 messaging of alerts like order confirmations or password resets.
     *
     * ## Rate limit
     *
     * Transactional Emails are not subject to a rate limit. Depending on your chosen package, a set number of Transactional Emails is covered per hour by SLA. Requests that exceed that rate will still send, but are not covered by SLA. 99.9% of emails will send in less than one minute.
     *
     * ## Path parameters
     *
     * | Parameter | Required | Data Type | Description |
     * | --- | --- | --- | --- |
     * | `campaign_id` | Required | String | ID of the campaign |
     *
     * ## Request Parameters
     *
     * | Parameter | Required | Data Type | Description |
     * | --- | --- | --- | --- |
     * | `external_send_id` | Optional | String | A Base64 compatible string. Validated against the following regex `/^[a-zA-Z0-9-_+\/=]+$/`. This optional field allows you to pass an internal identifier for this particular send which will be included in events sent from the Transactional HTTP event postback. When passed, this identifier will also be used as a deduplication key, which Braze will store for 24 hours. Passing the same identifier in another request will not result in a new instance of a send by Braze for 24 hours. |
     * | `trigger_properties` | Optional | Object | See [trigger properties](https://www.braze.com/docs/api/objects_filters/trigger_properties_object/). Personalization key-value pairs that will apply to the user in this request. |
     * | `recipients` | Required | Object | The user you are targeting this message to. Can contain `attributes` and a single `external_user_id` or `user_alias`.  <br>  <br>Note that if you provide an external user ID that doesn’t already exist in Braze, passing any fields to the `attributes` object will create this user profile in Braze and send this message to the newly created user.  <br>  <br>If you send multiple requests to the same user with different data in the `attributes` object, Braze will ensure that `first_name`, `last_name`, and `email` attributes will be updated synchronously and templated into your message. Custom attributes don’t have this same protection, so proceed with caution when updating a user through this API and passing different custom attribute values in quick succession. |
     *
     * ## Response
     *
     * The send transactional email endpoint will respond with the message’s `dispatch_id` which represents the instance of this message send. This identifier can be used along with events from the Transactional HTTP event postback to trace the status of an individual email sent to a single user.
     *
     * ### Example response
     *
     * ``` json
     * {
     * "dispatch_id": Out-of-the-box generated Unique ID of the instance of this send
     * "status": Current status of the message
     * "metadata": Object containing additional information about the send instance
     * }
     *
     * ```
     *
     * ## Troubleshooting
     *
     * The endpoint may also return an error code and a human-readable message in some cases, most of which are validation errors. Here are some common errors you may get when making invalid requests.
     *
     * | Error | Troubleshooting |
     * | --- | --- |
     * | `The campaign is not a transactional campaign. Only transactional campaigns may use this endpoint` | The campaign ID provided is not for a transactional campaign. |
     * | `The external reference has been queued. Please retry to obtain send_id.` | The external_send_id has been created recently, try a new external_send_id if you are intending to send a new message. |
     * | `Campaign does not exist` | The campaign ID provided does not correspond to an existing campaign. |
     * | `The campaign is archived. Unarchive the campaign to ensure trigger requests will take effect.` | The campaign ID provided corresponds to an archived campaign. |
     * | `The campaign is paused. Resume the campaign to ensure trigger requests will take effect.` | The campaign ID provided corresponds to a paused campaign. |
     * | `campaign_id must be a string of the campaign api identifier` | The campaign ID provided is not a valid format. |
     * | `Error authenticating credentials` | The API key provided is invalid |
     * | `Invalid whitelisted IPs` | The IP address sending the request is not on the IP whitelist (if it is being utilized) |
     * | `You do not have permission to access this resource` | The API key used does not have permission to take this action |
     *
     * Most endpoints at Braze have a rate limit implementation that will return a 429 response code if you have made too many requests. The transactional sending endpoint works differently -- if you exceed your allotted rate limit, our system will continue to ingest the API calls, return success codes, and send the messages, however those messages may not be subject to the contractual SLA for the feature. Please reach out if you need more information about this functionality.
     *
     * ## Transactional HTTP Event Postback
     *
     * All transactional emails are complemented with event status postbacks sent as an HTTP request back to your specified URL. This will allow you to evaluate the message status in real-time and take action to reach the user on another channel if the message goes undelivered, or fallback to an internal system if Braze is experiencing latency.
     *
     * In order to associate the incoming events to a particular instance of send, you can choose to either capture and store the Braze `dispatch_id` returned in the [API response](https://www.braze.com/docs/api/endpoints/messaging/send_messages/post_send_transactional_message/#example-response), or pass your own identifier to the `external_send_id` field. An example of a value you may choose to pass to that field may be an order ID, where after completing order 1234, an order confirmation message is triggered to the user through Braze, and `external_send_id : 1234` is included in the request. All following event postbacks such as `Sent` and `Delivered` will include `external_send_id : 1234` in the payload allowing you to confirm that user successfully received their order confirmation email.
     *
     * To get started using the Transactional HTTP Event Postback, navigate to **Settings** > **Workspace Settings** > **Email Preferences**. in your Braze dashboard and input your desired URL to receive postbacks.
     *
     * Note: If you are using our [older navigation](https://www.braze.com/docs/navigation), **Email Preferences** can be found at ****Manage Settings** > **Email Settings****.
     *
     * ### Postback body
     *
     * ``` json
     * // Sent Event
     * {
     * "dispatch_id": "acf471119f7449d579e8089032003ded",
     * "status": "sent",
     * "metadata": {
     * "received_at": "2020-08-31T18:58:41.000+00:00",
     * "enqueued_at": "2020-08-31T18:58:41.000+00:00",
     * "executed_at": "2020-08-31T18:58:41.000+00:00",
     * "sent_at": "2020-08-31T18:58:42.000+00:00",
     * "campaign_api_id": "417220e4-5a2a-b634-7f7d-9ec891532368",
     * "external_send_id" : "34a2ceb3cf6184132f3d816e9984269a"
     * }
     * }
     * // Processed Event
     * {
     * "dispatch_id": "acf471119f7449d579e8089032003ded",
     * "status": "processed",
     * "metadata": {
     * "processed_at": "2020-08-31T18:58:42.000+00:00",
     * "campaign_api_id": "417220e4-5a2a-b634-7f7d-9ec891532368",
     * "external_send_id" : "34a2ceb3cf6184132f3d816e9984269a"
     * }
     * }
     * // Aborted
     * {
     * "dispatch_id": "acf471119f7449d579e8089032003ded",
     * "status": "aborted",
     * "metadata": {
     * "reason": "User not emailable",
     * "aborted_at": "2020-08-31T19:04:51.000+00:00",
     * "campaign_api_id": "417220e4-5a2a-b634-7f7d-9ec891532368",
     * "external_send_id" : "34a2ceb3cf6184132f3d816e9984269a"
     * }
     * }
     * // Delivered Event
     * {
     * "dispatch_id": "acf471119f7449d579e8089032003ded",
     * "status": "delivered",
     * "metadata": {
     * "delivered_at": "2020-08-31T18:27:32.000+00:00",
     * "campaign_api_id": "417220e4-5a2a-b634-7f7d-9ec891532368",
     * "external_send_id" : "34a2ceb3cf6184132f3d816e9984269a"
     * }
     * }
     * // Bounced Event
     * {
     * "dispatch_id": "acf471119f7449d579e8089032003ded",
     * "status": "bounced",
     * "metadata": {
     * "bounced_at": "2020-08-31T18:58:43.000+00:00",
     * "reason": "550 5.1.1 The email account that you tried to reach does not exist",
     * "campaign_api_id": "417220e4-5a2a-b634-7f7d-9ec891532368",
     * "external_send_id" : "34a2ceb3cf6184132f3d816e9984269a"
     * }
     * }
     *
     * ```
     *
     * #### Message status
     *
     * | **Status** | **Description** |
     * | --- | --- |
     * | `sent` | Message successfully dispatched to Braze’s email sending partner |
     * | `processed` | Email sending partner has successfully received and prepared the message for sending to the user’s inbox provider |
     * | `aborted` | Braze was unable to successfully dispatch the message due to the user not having an emailable address, or Liquid abort logic was called in the message body. All aborted events include a reason field within the metadata object indicating why the message was aborted |
     * | `delivered` | Message was accepted by the user’s email inbox provider |
     * | `bounced` | Message was rejected by the user’s email inbox provider. All bounced events include a reason field within the metadata object reflecting the bounce error code provided by the inbox provider |
     *
     * ### Example postback
     *
     * ``` json
     * // Sent Event
     * {
     * "dispatch_id": "acf471119f7449d579e8089032003ded",
     * "status": "sent",
     * "metadata": {
     * "received_at": "2020-08-31T18:58:41.000+00:00",
     * "enqueued_at": "2020-08-31T18:58:41.000+00:00",
     * "executed_at": "2020-08-31T18:58:41.000+00:00",
     * "sent_at": "2020-08-31T18:58:42.000+00:00",
     * "campaign_api_id": "417220e4-5a2a-b634-7f7d-9ec891532368",
     * "external_send_id" : "34a2ceb3cf6184132f3d816e9984269a"
     * }
     * }
     * // Processed Event
     * {
     * "dispatch_id": "acf471119f7449d579e8089032003ded",
     * "status": "processed",
     * "metadata": {
     * "processed_at": "2020-08-31T18:58:42.000+00:00",
     * "campaign_api_id": "417220e4-5a2a-b634-7f7d-9ec891532368",
     * "external_send_id" : "34a2ceb3cf6184132f3d816e9984269a"
     * }
     * }
     * // Aborted
     * {
     * "dispatch_id": "acf471119f7449d579e8089032003ded",
     * "status": "aborted",
     * "metadata": {
     * "reason": "User not emailable",
     * "aborted_at": "2020-08-31T19:04:51.000+00:00",
     * "campaign_api_id": "417220e4-5a2a-b634-7f7d-9ec891532368",
     * "external_send_id" : "34a2ceb3cf6184132f3d816e9984269a"
     * }
     * }
     * // Delivered Event
     * {
     * "dispatch_id": "acf471119f7449d579e8089032003ded",
     * "status": "delivered",
     * "metadata": {
     * "delivered_at": "2020-08-31T18:27:32.000+00:00",
     * "campaign_api_id": "417220e4-5a2a-b634-7f7d-9ec891532368",
     * "external_send_id" : "34a2ceb3cf6184132f3d816e9984269a"
     * }
     * }
     * // Bounced Event
     * {
     * "dispatch_id": "acf471119f7449d579e8089032003ded",
     * "status": "bounced",
     * "metadata": {
     * "bounced_at": "2020-08-31T18:58:43.000+00:00",
     * "reason": "550 5.1.1 The email account that you tried to reach does not exist",
     * "campaign_api_id": "417220e4-5a2a-b634-7f7d-9ec891532368",
     * "external_send_id" : "34a2ceb3cf6184132f3d816e9984269a"
     * }
     * }
     *
     * ```
     *
     * @param array $headerParameters {
     *
     * @var string $Content-Type
     * @var string $Authorization
     *             }
     */
    public function __construct(string $campaignId, ?\Braze\Model\TransactionalV1CampaignsCampaignIdSendPostBody $requestBody = null, array $headerParameters = [])
    {
        $this->campaign_id = $campaignId;
        $this->body = $requestBody;
        $this->headerParameters = $headerParameters;
    }

    public function getMethod(): string
    {
        return 'POST';
    }

    public function getUri(): string
    {
        return str_replace(['{campaign_id}'], [$this->campaign_id], '/transactional/v1/campaigns/{campaign_id}/send');
    }

    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \Braze\Model\TransactionalV1CampaignsCampaignIdSendPostBody) {
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
     * @throws \Braze\Exception\PostTransactionalV1CampaignsByCampaignIdSendBadRequestException
     * @throws \Braze\Exception\PostTransactionalV1CampaignsByCampaignIdSendUnauthorizedException
     * @throws \Braze\Exception\PostTransactionalV1CampaignsByCampaignIdSendForbiddenException
     * @throws \Braze\Exception\PostTransactionalV1CampaignsByCampaignIdSendNotFoundException
     * @throws \Braze\Exception\PostTransactionalV1CampaignsByCampaignIdSendTooManyRequestsException
     * @throws \Braze\Exception\PostTransactionalV1CampaignsByCampaignIdSendInternalServerErrorException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return json_decode($body);
        }
        if (is_null($contentType) === false && (400 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Braze\Exception\PostTransactionalV1CampaignsByCampaignIdSendBadRequestException($serializer->deserialize($body, 'Braze\\Model\\Error', 'json'), $response);
        }
        if (is_null($contentType) === false && (401 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Braze\Exception\PostTransactionalV1CampaignsByCampaignIdSendUnauthorizedException($serializer->deserialize($body, 'Braze\\Model\\Error', 'json'), $response);
        }
        if (is_null($contentType) === false && (403 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Braze\Exception\PostTransactionalV1CampaignsByCampaignIdSendForbiddenException($serializer->deserialize($body, 'Braze\\Model\\Error', 'json'), $response);
        }
        if (is_null($contentType) === false && (404 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Braze\Exception\PostTransactionalV1CampaignsByCampaignIdSendNotFoundException($serializer->deserialize($body, 'Braze\\Model\\Error', 'json'), $response);
        }
        if (is_null($contentType) === false && (429 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Braze\Exception\PostTransactionalV1CampaignsByCampaignIdSendTooManyRequestsException($serializer->deserialize($body, 'Braze\\Model\\Error', 'json'), $response);
        }
        if (is_null($contentType) === false && (500 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Braze\Exception\PostTransactionalV1CampaignsByCampaignIdSendInternalServerErrorException($serializer->deserialize($body, 'Braze\\Model\\Error', 'json'), $response);
        }
    }

    public function getAuthenticationScopes(): array
    {
        return ['BearerAuth'];
    }
}
