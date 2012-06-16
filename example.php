<?php
header('Content-type: text/plain');

// Include class file
require('SongLinks.php');

// Initialize class
$links = new SongLinks();

// Find the URLs for 'Dynamite' from Taio Cruz
$song = 'Dynamite';
$artist = 'Taio Cruz';

echo "Song links for $song from $artist \n\n";
echo "iTunes: " . $links->getItunesLink($song, $artist) . "\n";
echo "Spotify (via open.spotify.com): " . $links->getSpotifyLink($song, $artist) . "\n";
echo "Spotify (direct via spotify protocol): " . $links->getSpotifyDirectLink($song, $artist) . "\n";
echo "Last.fm (requires API key): " . $links->getLastfmLink($song, $artist, '81cf702bd940f3c7ba44b8d351e61b5e') . "\n"; // http://www.last.fm/api
echo "Amazon (search results link): " . $links->getAmazonSearchLink($song, $artist) . "\n";
echo "Youtube (search results link): " . $links->getYoutubeSearchLink($song, $artist) . "\n";
echo "Mp3skull (free mp3 downloading - non-official): " . $links->getMp3skullLink($song, $artist) . "\n";
echo "Dilandau (free mp3 downloading - non-official): " . $links->getDilandauLink($song, $artist) . "\n";

?>