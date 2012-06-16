<?php
class SongLinks {
	private $itunesURL = 'http://itunes.apple.com/search?term=%s&entity=song&limit=1';
	private $spotifyURL = 'http://ws.spotify.com/search/1/track.json?q=%s';
	private $lastfmURL = 'http://ws.audioscrobbler.com/2.0/?method=track.search&format=json&track=%s&api_key=%s';

	private function curl($url){
		$ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        if(!$c = curl_exec($ch)){
	        die('Error while getting content from URL "' . $url . '".');
        }
        curl_close($ch);
        return $c;
	}
	
	function getItunesLink($song, $artist=null){
		$query = urlencode(($artist ? $artist . ' ' : '') . $song);
		$url = $this->itunesURL;
		
		if(!$s = json_decode($this->curl(sprintf($url, $query)))){
			die('Error while getting info for this song.');
		}
		if(isset($s->results[0])){
			return $s->results[0]->trackViewUrl;
		}
		
		return false;
	}
	
	function getSpotifyLink($song, $artist=null){
		$query = urlencode(($artist ? $artist . ' ' : '') . $song);
		$url = $this->spotifyURL;
		
		if(!$s = json_decode($this->curl(sprintf($url, $query)))){
			die('Error while getting info for this song.');
		}
		if(isset($s->tracks[0])){
			return str_replace('spotify/', 'http://open.spotify.com/', str_replace(':', '/', $s->tracks[0]->href));
		}
		
		return false;
	}
	
	function getSpotifyDirectLink($song, $artist=null){
		$query = urlencode(($artist ? $artist . ' ' : '') . $song);
		$url = $this->spotifyURL;
		
		if(!$s = json_decode($this->curl(sprintf($url, $query)))){
			die('Error while getting info for this song.');
		}
		if(isset($s->tracks[0])){
			return $s->tracks[0]->href;
		}
		
		return false;
	}
	
	function getLastfmLink($song, $artist=null, $apiKey){
		$query = urlencode($song) . ($artist ? '&artist='.urlencode($artist) : '');
		$url = $this->lastfmURL;
		
		if(!$s = json_decode($this->curl(sprintf($url, $query, $apiKey)))){
			die('Error while getting info for this song.');
		}
		if(isset($s->results->trackmatches->track[0])){
			return $s->results->trackmatches->track[0]->url;
		}
		if(isset($s->results->trackmatches->track)){
			return $s->results->trackmatches->track->url;
		}
		
		return false;
	}
	
	function getMp3skullLink($song, $artist=null){
		return 'http://mp3skull.com/mp3/'.urlencode(strtolower(str_replace(' ','_',($artist ? $artist . ' ' : '') . $song))).'.html';
	}
	
	function getDilandauLink($song, $artist=null){
		return 'http://www.dilandau.eu/download_music/'.urlencode(strtolower(str_replace(' ','-',($artist ? $artist . ' ' : '') . $song))).'-1.html';
	}
	
	function getYoutubeSearchLink($song, $artist=null){
		return 'http://www.youtube.com/results?search_query='.urlencode(($artist ? $artist . ' ' : '') . $song);
	}
	
	function getAmazonSearchLink($song, $artist=null){
		return 'http://www.amazon.com/s/?url=search-alias%3Ddigital-music&field-keywords='.urlencode(($artist ? $artist . ' ' : '') . $song);
	}

}
?>