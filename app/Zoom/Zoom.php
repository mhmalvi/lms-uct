<?php

namespace App\Zoom;

use App\Http\Requests\LiveClassRequest;
use App\Http\Requests\LiveClassUpdateRequest;
use GuzzleHttp\Client;
use Illuminate\Support\Str;

class Zoom implements ZoomInterface
{
    use ZoomTrait;

    /**
     * get details of a meeting
     */
    public function get($id)
    {
        $client = new Client(['base_uri' => $this->base_url]);

        $response = $client->request('GET', '/v2/meetings/' . $id, [
            'headers' => [
                'Authorization' => "Bearer " . $this->getAccessToken(),
            ],
        ]);

        return json_decode($response->getBody());
    }

    /**
     * Get the list of created meeting
     *
     */
    public function meetings($per_page = 30, $page_number = '')
    {
        $client = new Client(['base_uri' => $this->base_url]);

        $response = $client->request('GET', '/v2/users/me/meetings', [
            "headers" => [
                "Authorization" => "Bearer " . $this->getAccessToken()
            ],
            "query" => [
                "page_size" => $per_page,
                "page_number" => $page_number,
            ]
        ]);

        return json_decode($response->getBody());
    }


    /**
     * Get the meetings by our appication users
     *
     * @param object $meetings
     */
    public function meetingsListByHost(object $meetings)
    {
        $meetings->map(function ($data) {
            foreach ($this->meetings()->meetings as $item) {
                if ($item->id == $data->meeting_id) {
                    array_push($this->meetingListByHost, [
                        'meeting_id' => $data->meeting_id,
                        'topic' => $item->topic,
                        'password' => $data->password,
                        'start_url' => $data->start_url,
                        'join_url' => $item->join_url,
                        'date' => $data->getUserDate(),
                        'time' => $data->getUserTime()
                    ]);
                }
            }
        });

        return $this->meetingListByHost;
    }


    /**
     * Get past meeting participants
     *
     * This is a paid feature
     */
    public function getParticipants($meeting_id)
    {
    }


    /**
     * Create a zoom meeting
     *
     */
    public function create(LiveClassRequest $request)
    {
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => $this->base_url,
        ]);

        $response = $client->request('POST', '/v2/users/me/meetings', [
            "headers" => [
                "Authorization" => "Bearer " . $this->getAccessToken()
            ],
            'json' => [
                "topic" => $request->topic,
                "type" => 2,
                "start_time" => $this->getZoomDateTimeFormat($request->start_time_timestamp),
                "duration" => $request->duration, // 30 mins
                "password" => $request->password,
            ],
        ]);

        return json_decode($response->getBody());
    }


    /**
     * Update an existing zoom meeting
     *
     */
    public function update($meeting_id, LiveClassUpdateRequest $request)
    {
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => $this->base_url,
        ]);

        $response = $client->request('PATCH', '/v2/meetings/' . $meeting_id, [
            "headers" => [
                "Authorization" => "Bearer " . $this->getAccessToken()
            ],
            'json' => [
                "topic" => $request->topic,
                "type" => 2,
                "start_time" => $this->getZoomDateTimeFormat($request->start_time_timestamp),
                "duration" => $request->duration, // 45 mins
                "password" => $request->password,
            ],
        ]);

        return $response;
    }


    /**
     * Destroy an existing meeting
     *
     */
    public function destroy($meeting_id)
    {
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => $this->base_url,
        ]);

        $response = $client->request("DELETE", "/v2/meetings/{$meeting_id}", [
            "headers" => [
                "Authorization" => "Bearer " . $this->getAccessToken()
            ]
        ]);
        return $response->getBody();
    }
}
