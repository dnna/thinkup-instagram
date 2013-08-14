<?php

class InstagramGraphAPIAccessor {
    /**
     * Make a Graph API request.
     * @param str $path
     * @param str $access_token
     * @param str $fields Comma-delimited list of fields to return from FB API
     * @return array Decoded JSON response
     */
    public static function apiRequest($type, $id, $access_token, $params = array()) {
        $instagram = new Instagram\Instagram($access_token);
        if($type == 'user') {
            return $instagram->getUser($id);
        } else if($type == 'friends') {
            $user = $instagram->getUser($id);
            return $user->getFollowers();
        } else if($type == 'media') {
            $user = $instagram->getUser($id);
            $media = $user->getMedia($params);
            return $media;
        }
        $media = $instagram->getMedia( $media_id );
        $tag = $instagram->getTag( 'mariokart' );
        $location = $instagram->getLocation( 3001881 );
        $current_user = $instagram->getCurrentUser();
    }
    /**
     * Make a Graph API request with the absolute URL. This URL needs to include the https://graph.instagram.com/ at
     * the start and the access token at the end as well as everything in between. It is literally the raw URL that
     * needs to be passed in.
     *
     * @param str $path
     * @param book $decode_json Defaults to true, if true returns decoded JSON
     * @return array Decoded JSON response
     */
    public static function rawApiRequest($path, $decode_json=true) {
        if ($decode_json) {
            $result = Utils::getURLContents($path);
            return json_decode($result);
        } else {
            return Utils::getURLContents($path);
        }
    }
}
