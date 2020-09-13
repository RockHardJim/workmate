<?php

namespace App\Services\Gravatar;

use Log;
use Carbon\Carbon;

class Gravatar
{
    /**
     * Get user's gravatar
     *
     * @param string $email
     * @param null|int $size
     * @return string
     */
    public static function make(string $email, ?int $size = 50): string
    {
        return config('services.gravatar.url') . md5(strtolower(trim($email))) . ".png&s=" . $size;
    }

    /**
     * Get base64 image
     *
     * @param string $email
     * @param null|int $size
     * @return string
     */
    public static function toBase64(string $email, ?int $size = 50): string
    {
        if (cache("gravatar.{$email}")) {
            return cache("gravatar.{$email}");
        }

        return self::getImage($email, $size);
    }

    /**
     * Get and cache image
     *
     * @param string $email
     * @param null|int $size
     * @return string $image|$url
     */
    private static function getImage(string $email, ?int $size = 50): string
    {
        $url  = self::make($email, $size);
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 10,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if (!$err) {
            $image = 'data:image/png;base64,' . base64_encode($response);

            if (cache("gravatar.{$email}", $image, Carbon::now()->addWeeks(2))) {
                return $image;
            }

            Log::error('Could not cache image');

            return $image;
        }

        return $url;
    }
}
