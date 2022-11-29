<?php

namespace App\Services\Api;

use Exception;
use GuzzleHttp\Promise\PromiseInterface;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use Psr\Http\Message\UriInterface;


class GorestClient
{
    /**
     * @var string
     */
    private string $baseUri = 'https://gorest.co.in/public/v2';

    /**
     * @param string $method
     * @param $uri
     * @param array $options
     * @return PromiseInterface|Response
     * @throws Exception
     */
    private function request(string $method, $uri, array $options = []): PromiseInterface|Response
    {
        return Http::withToken(config('services.gorest.access_token'))->baseUrl($this->baseUri)->acceptJson()->send(strtoupper($method),
            $uri, $options);
    }

    /**
     * Create and send an HTTP GET request.
     *
     * Use an absolute path to override the base path of the client, or a
     * relative path to append to the base path of the client. The URL can
     * contain the query string as well.
     *
     * @param string|UriInterface $uri URI object or string.
     * @param array $options Request options to apply.
     *
     * @throws Exception
     */
    public function get(UriInterface|string $uri, array $options = []): PromiseInterface|Response
    {
        return $this->request('GET', $uri, $options);
    }

    /**
     * Create and send an HTTP DELETE request.
     *
     * Use an absolute path to override the base path of the client, or a
     * relative path to append to the base path of the client. The URL can
     * contain the query string as well.
     *
     * @param string|UriInterface $uri URI object or string.
     * @param array $options Request options to apply.
     *
     * @throws Exception
     */
    public function delete(UriInterface|string $uri, array $options = []): PromiseInterface|Response
    {
        return $this->request('DELETE', $uri, $options);
    }
}
