<?php
/*
just for fun
*/
require_once('./line_class.php');
require_once('./unirest-php-master/src/Unirest.php');
$channelAccessToken = 'KP1fl8XRU+ravx9LgVaOyHif/Rsh6HZ2n2HiWDbUby7miod1aRm+KG/4C9K3Qu6iYaYIIxoKUdJ+ZoLdmXS09B9DXW8MASGCG2OPh3puWO2/UB5vn1riE4eGL5mfJ+T2Vqy0M9f3TfQKMbkiZNjuwgdB04t89/1O/w1cDnyilFU='; //sesuaikan
$channelSecret = 'd2f8f58b43d9bc76b8566de44753e3ba';//sesuaikan
$client = new LINEBotTiny($channelAccessToken, $channelSecret);
$userId 	= $client->parseEvents()[0]['source']['userId'];
$groupId 	= $client->parseEvents()[0]['source']['groupId'];
$replyToken = $client->parseEvents()[0]['replyToken'];
$timestamp	= $client->parseEvents()[0]['timestamp'];
$type 		= $client->parseEvents()[0]['type'];
$message 	= $client->parseEvents()[0]['message'];
$messageid 	= $client->parseEvents()[0]['message']['id'];
$profil = $client->profil($userId);
$pesan_datang = explode(" ", $message['text']);
$pesan_simi = explode("Sally ", $message['text']);
$siminya = $pesan_simi[1];
$msg_type = $message['type'];
$command = $pesan_datang[0];
$options = $pesan_datang[1];
if (count($pesan_datang) > 2) {
    for ($i = 2; $i < count($pesan_datang); $i++) {
        $options .= '+';
        $options .= $pesan_datang[$i];
    }
}
#-------------------------[Function]-------------------------#
function simi($keyword) {
    $uri = "https://simiko.herokuapp.com/index.php?text=" . $keyword;
    $response = Unirest\Request::get("$uri");
    $json = json_decode($response->raw_body, true);
    $result = $json["answer"];
    return $result;
}
function say($keyword) { 
    $uri = "https://script.google.com/macros/exec?service=AKfycbw7gKzP-WYV2F5mc9RaR7yE3Ve1yN91Tjs91hp_jHSE02dSv9w&nama=" . $keyword . "&tanggal=10-05-2003"; 
 
    $response = Unirest\Request::get("$uri"); 
 
    $json = json_decode($response->raw_body, true); 
 $result .= $json['data']['nama']; 
    return $result; 
}
function instapoto($keyword) {
    $uri = "https://ari-api.herokuapp.com/instagram?username=" . $keyword;
    $response = Unirest\Request::get("$uri");
    $json = json_decode($response->raw_body, true);
    $result = $json['result']['profile_pic_url'];
    return $result;
}
function insta($keyword) {
    $uri = "https://ari-api.herokuapp.com/instagram?username=" . $keyword;
    $response = Unirest\Request::get("$uri");
    $json = json_decode($response->raw_body, true);
    $result = "「PROFILE INSTAGRAM」\n\n";
    $result .= "DisplayName: ";
    $result .= $json['result']['full_name'];
    $result .= "\nUserName: ";
    $result .= $json['result']['username'];
    $result .= "\nPrivate: ";
    $result .= $json['result']['is_private'];
    $result .= "\nFollower: ";
    $result .= $json['result']['byline'];
    $result .= "\n\n https://www.instagram.com/" . $keyword;
    return $result;
}

function youtubelist($keyword) {
    $uri = "https://ari-api.herokuapp.com/youtube/search?q=" . $keyword;
    $response = Unirest\Request::get("$uri");
    $json = json_decode($response->raw_body, true);
    $parsed = "YOUTUBE LIST\n\n";
    $parsed .= "ID: ";
    $parsed .= $json['result'][0]['id'];
    $parsed .= "\nTITLE\n";
    $parsed .= $json['result'][0]['title'];
    $parsed .= "\nURL\n";
    $parsed .= $json['result'][0]['link'];
    $parsed .= "\n\nID: ";
    $parsed .= $json['result'][1]['id'];
    $parsed .= "\nTITLE\n";
    $parsed .= $json['result'][1]['title'];
    $parsed .= "\nURL\n";
    $parsed .= $json['result'][1]['link'];
    $parsed .= "\n\nID: ";
    $parsed .= $json['result'][2]['id'];
    $parsed .= "\nTITLE\n";
    $parsed .= $json['result'][2]['title'];
    $parsed .= "\nURL\n";
    $parsed .= $json['result'][2]['link'];
    $parsed .= "\n\nID: ";
    $parsed .= $json['result'][3]['id'];
    $parsed .= "\nTITLE\n";
    $parsed .= $json['result'][3]['title'];
    $parsed .= "\nURL\n";
    $parsed .= $json['result'][3]['link'];
    $parsed .= "\n\nID: ";
    $parsed .= $json['result'][4]['id'];
    $parsed .= "\nTITLE\n";
    $parsed .= $json['result'][4]['title'];
    $parsed .= "\nURL\n";
    $parsed .= $json['result'][4]['link'];
    return $parsed;
}

function google_image($keyword) {
    $uri = "https://ari-api.herokuapp.com/images?q=" . $keyword;
    $response = Unirest\Request::get("$uri");
    $json = json_decode($response->raw_body, true);
    $result = $json['result'][0];	
    return $result;
}
function image_neon($keyword) {
    $uri = "https://ari-api.herokuapp.com/neon?text=" . $keyword;	
    return $uri;
}

function stickerlist($keyword) {
    $listnya = array(
	    "1",
	    "2",
	    "3",
	    "4",
	    "00000",
	    "13",
	    "10",
	    "402",
	    "401",
	    "17",
	    "16",
	    "00000",
	    "405",
	    "5",
	    "404",
	    "406",
	    "21",
	    "9",
	    "103",
	    "102",
	    "00000",
	    "8",
	    "101",
	    "00000",
	    "6",
	    "104",
	    "00000",
	    "108",
	    "109",
	    "00000",
	    "110",
	    "00000",
	    "111",
	    "112",
	    "113",
	    "00000",
	    "114",
	    "115",
	    "116",
	    "117",
	    "0000000",
	    "118",
	    "0000000",
	    "407",
	    "0000000",
	    "408",
	    "409",
	    "000000",
	    "410",
	    "411",
	    "412",
	    "00000",
	    "413",
	    "414",
	    "00000",
	    "415",
	    "416",
	    "00000",
	    "417",
	    "418",
	    "419",
	    "00000",
	    "420",
	    "421",
	    "422",
	    "00000",
	    "423",
	    "424",
	    "00000",
	    "425",
	    "426",
	    "427",
	    "00000",
	    "428",
	    "429",
	    "430",
	    "00000",
	    "119",
	    "120",
	    "121",
	    "122",
	    "00000",
	    "123",
	    "124",
	    "00000",
	    "125",
	    "126",
	    "127",
	    "128",
	    "00000",
	    "129",
	    "00000",
	    "130",
	    "131",
	    "00000",
	    "132",
	    "133",
	    "00000",
	    "134",
	    "135",
	    "00000",
	    "136",
	    "137",
	    "138",
	    "00000",
	    "139",
	    );
            $jaws = array_rand($listnya);
            $result = $listnya[$jaws];
    return $result;
}

function jadwaltv() {
    $uri = "https://ari-api.herokuapp.com/jadwaltv";
    $response = Unirest\Request::get("$uri");
    $json = json_decode($response->raw_body, true);
    $result = "「TV Schedule」\n\n";
    $result .= "Time:";
    $result .= $json['result'][0]["jam"];
    $result .= "\n[TITLE]\n";
    $result .= $json['result'][0]["acara"];
    $result .= "\n[CHANNEL]\n";
    $result .= $json['result'][0]["channelName"];
    $result .= "\n\nTime:";
    $result .= $json['result'][1]["jam"];
    $result .= "\n[TITLE]\n";
    $result .= $json['result'][1]["acara"];
    $result .= "\n[CHANNEL]\n";
    $result .= $json['result'][1]["channelName"];
    $result .= "\n\nTime:";
    $result .= $json['result'][2]["jam"];
    $result .= "\n[TITLE]\n";
    $result .= $json['result'][2]["acara"];
    $result .= "\n[CHANNEL]\n";
    $result .= $json['result'][2]["channelName"];
    $result .= "\n\nTime:";
    $result .= $json['result'][3]["jam"];
    $result .= "\n[TITLE]\n";
    $result .= $json['result'][3]["acara"];
    $result .= "\n[CHANNEL]\n";
    $result .= $json['result'][3]["channelName"];
    $result .= "\n\nTime:";
    $result .= $json['result'][4]["jam"];
    $result .= "\n[TITLE]\n";
    $result .= $json['result'][4]["acara"];
    $result .= "\n[CHANNEL]\n";
    $result .= $json['result'][4]["channelName"];
    $result .= "\n\nTime:";
    $result .= $json['result'][5]["jam"];
    $result .= "\n[TITLE]\n";
    $result .= $json['result'][5]["acara"];
    $result .= "\n[CHANNEL]\n";
    $result .= $json['result'][5]["channelName"];
    $result .= "\n\nTime:";
    $result .= $json['result'][6]["jam"];
    $result .= "\n[TITLE]\n";
    $result .= $json['result'][6]["acara"];
    $result .= "\n[CHANNEL]\n";
    $result .= $json['result'][6]["channelName"];
    $result .= "\n\nTime:";
    $result .= $json['result'][7]["jam"];
    $result .= "\n[TITLE]\n";
    $result .= $json['result'][7]["acara"];
    $result .= "\n[CHANNEL]\n";
    $result .= $json['result'][7]["channelName"];
    $result .= "\n\nTime:";
    $result .= $json['result'][8]["jam"];
    $result .= "\n[TITLE]\n";
    $result .= $json['result'][8]["acara"];
    $result .= "\n[CHANNEL]\n";
    $result .= $json['result'][8]["channelName"];
    $result .= "\n\nTime:";
    $result .= $json['result'][9]["jam"];
    $result .= "\n[TITLE]\n";
    $result .= $json['result'][9]["acara"];
    $result .= "\n[CHANNEL]\n";
    $result .= $json['result'][9]["channelName"];
    $result .= "\n\nTime:";
    $result .= $json['result'][10]["jam"];
    $result .= "\n[TITLE]\n";
    $result .= $json['result'][10]["acara"];
    $result .= "\n[CHANNEL]\n";
    $result .= $json['result'][10]["channelName"];
    $result .= "\n\nTime:";
    $result .= $json['result'][11]["jam"];
    $result .= "\n[TITLE]\n";
    $result .= $json['result'][11]["acara"];
    $result .= "\n[CHANNEL]\n";
    $result .= $json['result'][11]["channelName"];
    $result .= "\n\nTime:";
    $result .= $json['result'][12]["jam"];
    $result .= "\n[TITLE]\n";
    $result .= $json['result'][12]["acara"];
    $result .= "\n[CHANNEL]\n";
    $result .= $json['result'][12]["channelName"];
    return $result;
}
function shalat($keyword) {
    $uri = "https://time.siswadi.com/pray/" . $keyword;
    $response = Unirest\Request::get("$uri");
    $json = json_decode($response->raw_body, true);
    $result = "「Praytime Schedule」\n\n";
	  $result .= $json['location']['address'];
	  $result .= "\nTanggal : ";
	  $result .= $json['time']['date'];
	  $result .= "\n\nShubuh : ";
	  $result .= $json['data']['Fajr'];
	  $result .= "\nDzuhur : ";
	  $result .= $json['data']['Dhuhr'];
	  $result .= "\nAshar : ";
	  $result .= $json['data']['Asr'];
	  $result .= "\nMaghrib : ";
	  $result .= $json['data']['Maghrib'];
	  $result .= "\nIsya : ";
	  $result .= $json['data']['Isha'];
    return $result;
}
function cuaca($keyword) {
    $uri = "http://api.openweathermap.org/data/2.5/weather?q=" . $keyword . ",ID&units=metric&appid=e172c2f3a3c620591582ab5242e0e6c4";
    $response = Unirest\Request::get("$uri");
    $json = json_decode($response->raw_body, true);
    $result = "「Weather Result」";
    $result .= "\n\nNama kota:";
	  $result .= $json['name'];
	  $result .= "\n\nCuaca : ";
	  $result .= $json['weather']['0']['main'];
	  $result .= "\nDeskripsi : ";
	  $result .= $json['weather']['0']['description'];
    return $result;
}
function waktu($keyword) {
    $uri = "https://time.siswadi.com/pray/" . $keyword;
    $response = Unirest\Request::get("$uri");
    $json = json_decode($response->raw_body, true);
    $result = "====[Time]====";
    $result .= "\nLokasi : ";
	$result .= $json['location']['address'];
	$result .= "\nJam : ";
	$result .= $json['time']['time'];
	$result .= "\nSunrise : ";
	$result .= $json['debug']['sunrise'];
	$result .= "\nSunset : ";
	$result .= $json['debug']['sunset'];
	$result .= "\n====[Time]====";
    return $result;
}
function qibla($keyword) { 
    $uri = "https://time.siswadi.com/qibla/" . $keyword; 
 
    $response = Unirest\Request::get("$uri"); 
 
    $json = json_decode($response->raw_body, true); 
 $result .= $json['data']['image'];
    return $result; 
}
function lokasi($keyword) { 
    $uri = "https://time.siswadi.com/pray/" . $keyword; 
 
    $response = Unirest\Request::get("$uri"); 
 
    $json = json_decode($response->raw_body, true); 
 $result['address'] .= $json['location']['address'];
 $result['latitude'] .= $json['location']['latitude'];
 $result['longitude'] .= $json['location']['longitude'];
    return $result; 
}
function send($input, $rt){
    $send = array(
        'replyToken' => $rt,
        'messages' => array(
            array(
                'type' => 'text',					
                'text' => $input
            )
        )
    );
    return($send);
}
function jawabs(){
    $list_jwb = array(
		'Ya',
	        'Bisa jadi',
	        'Mungkin',
	        'Gak tau',
	        'Woya donk',
	        'Jawab gk yah!',
		'Tidak',
		'Coba ajukan pertanyaan lain',	    
		);
    $jaws = array_rand($list_jwb);
    $jawab = $list_jwb[$jaws];
    return($jawab);
}
#-------------------------[Function]-------------------------#
# require_once('./src/function/search-1.php');
# require_once('./src/function/download.php');
# require_once('./src/function/random.php');
# require_once('./src/function/search-2.php');
# require_once('./src/function/hard.php');
if ($type == 'join') {
    $text = "%menu\n%say <query>\n%apakah <query>";
    $balas = array(
        'replyToken' => $replyToken,
        'messages' => array(
            array(
                'type' => 'text',
                'text' => $text
            )
        )
    );
}
//show menu, saat join dan command /menu
if ($command == '%menu') {
    $balas = array(
        'replyToken' => $replyToken,
        'messages' => array(
          array (
  'type' => 'template',
  'altText' => 'Anda di sebut',
  'template' =>
  array (
    'type' => 'carousel',
    'columns' =>
    array (
        0 =>
      array (
        'thumbnailImageUrl' => 'https://4.bp.blogspot.com/-L3sjf-JDwVQ/WUEKWMUiDqI/AAAAAAAAoYs/OzuQmmiSm-gdHZrpntvtM31asc3UAVp6wCLcBGAs/s1600/instagram-icon.jpg',
        'imageBackgroundColor' => '#00FFFF',
        'title' => 'INSTAGRAM',
        'text' => 'looking for instagram account information based on keywords',
        'defaultAction' =>
        array (
          'type' => 'uri',
          'label' => 'View detail',
          'uri' => 'http://example.com/page/123',
        ),
        'actions' =>
        array (
          0 =>
          array (
            'type' => 'message',
            'label' => 'EXAMPLE',
            'text' => 'type %instagram <query>',
          ),
        ),
      ),
       1 =>
      array (
        'thumbnailImageUrl' => 'https://s2.bukalapak.com/img/2245927012/w-1000/Arah_Kiblat.jpg',
        'imageBackgroundColor' => '#00FFFF',
        'title' => 'QIBLAT',
        'text' => 'find the location of Qibla direction',
        'defaultAction' =>
        array (
          'type' => 'uri',
          'label' => 'View detail',
          'uri' => 'http://example.com/page/123',
        ),
        'actions' =>
        array (
          0 =>
          array (
            'type' => 'message',
            'label' => 'EXAMPLE',
            'text' => 'Ketik %qiblat <query>',
          ),
        ),
      ),
      2 =>
      array (
        'thumbnailImageUrl' => 'https://s3.amazonaws.com/urgeio-versus/photo-editor-by-aviary/front/front-1391686692704.variety.jpg',
        'imageBackgroundColor' => '#00FFFF',
        'title' => 'IMAGE NEON',
        'text' => 'image editor',
        'defaultAction' =>
        array (
          'type' => 'uri',
          'label' => 'View detail',
          'uri' => 'http://example.com/page/123',
        ),
        'actions' =>
        array (
          0 =>
          array (
            'type' => 'message',
            'label' => 'EXAMPLE',
            'text' => 'type %imageneon <query>',
          ),
        ),
      ),
      3 =>
      array (
        'thumbnailImageUrl' => 'https://d500.epimg.net/cincodias/imagenes/2015/05/25/lifestyle/1432541958_414675_1432542807_noticia_normal.jpg',
        'imageBackgroundColor' => '#00FFFF',
        'title' => 'GOOGLE IMAGE',
        'text' => 'search for all images in google based on keywords',
        'defaultAction' =>
        array (
          'type' => 'uri',
          'label' => 'View detail',
          'uri' => 'http://example.com/page/123',
        ),
        'actions' =>
        array (
          0 =>
          array (
            'type' => 'message',
            'label' => 'EXAMPLE',
            'text' => 'type %image <query>',
          ),
        ),
      ),
      4 =>
      array (
        'thumbnailImageUrl' => 'https://cdn.icon-icons.com/icons2/1238/PNG/512/smallwallclock_83790.png',
        'imageBackgroundColor' => '#00FFFF',
        'title' => 'TIME',
        'text' => 'Finding Anime Information Based on keywords',
        'defaultAction' =>
        array (
          'type' => 'uri',
          'label' => 'View detail',
          'uri' => 'http://example.com/page/123',
        ),
        'actions' =>
        array (
          0 =>
          array (
            'type' => 'message',
            'label' => 'EXAMPLE',
            'text' => 'type %time <query>',
          ),
        ),
      ),
      5 =>
      array (
        'thumbnailImageUrl' => 'https://is3-ssl.mzstatic.com/image/thumb/Purple62/v4/cc/68/6c/cc686c29-ffd2-5115-2b97-c4821b548fe3/AppIcon-1x_U007emarketing-85-220-6.png/246x0w.jpg',
        'imageBackgroundColor' => '#00FFFF',
        'title' => 'PRAYTIME',
        'text' => 'Know the Schedule of Prayer around the world',
        'defaultAction' =>
        array (
          'type' => 'uri',
          'label' => 'View detail',
          'uri' => 'http://example.com/page/123',
        ),
        'actions' =>
        array (
          0 =>
          array (
            'type' => 'message',
            'label' => 'EXAMPLE',
            'text' => 'type %shalat <query>',
          ),
        ),
      ),
      6 =>
      array (
        'thumbnailImageUrl' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/72/YouTube_social_white_square_%282017%29.svg/2000px-YouTube_social_white_square_%282017%29.svg.png',
        'imageBackgroundColor' => '#00FFFF',
        'title' => 'YOUTUBE',
        'text' => 'search for videos on youtube based on keywords',
        'defaultAction' =>
        array (
          'type' => 'uri',
          'label' => 'View detail',
          'uri' => 'http://example.com/page/123',
        ),
        'actions' =>
        array (
          0 =>
          array (
            'type' => 'message',
            'label' => 'EXAMPLE',
            'text' => 'type %youtube <query>',
          ),
        ),
      ),
      7 =>
      array (
        'thumbnailImageUrl' => 'https://taisy0.com/wp-content/uploads/2015/07/Google-Maps.png',
        'imageBackgroundColor' => '#00FFFF',
        'title' => 'GOOGLEMAP',
        'text' => 'Knowing Location And Coordinate Place Name',
        'defaultAction' =>
        array (
          'type' => 'uri',
          'label' => 'View detail',
          'uri' => 'http://example.com/page/123',
        ),
        'actions' =>
        array (
          0 =>
          array (
            'type' => 'message',
            'label' => 'EXAMPLE',
            'text' => 'type %location <query>',
          ),
        ),
      ),
      8 =>
      array (
        'thumbnailImageUrl' => 'https://st3.depositphotos.com/3921439/12696/v/950/depositphotos_126961774-stock-illustration-the-tv-icon-television-and.jpg',
        'imageBackgroundColor' => '#00FFFF',
        'title' => 'TELEVISION',
        'text' => 'Mencari Jadwal Acara Televisi Indonesia & Jakarta',
        'defaultAction' =>
        array (
          'type' => 'uri',
          'label' => 'View detail',
          'uri' => 'http://example.com/page/123',
        ),
        'actions' =>
        array (
          0 =>
          array (
            'type' => 'message',
            'label' => 'EXAMPLE',
            'text' => 'type %jadwaltv',
          ),
        ),
      ),
      9 =>
      array (
        'thumbnailImageUrl' => 'https://4vector.com/i/free-vector-cartoon-weather-icon-05-vector_018885_cartoon_weather_icon_05_vector.jpg',
        'imageBackgroundColor' => '#00FFFF',
        'title' => 'WEATHER STATUS',
        'text' => 'Know the World Weather Forecast',
        'defaultAction' =>
        array (
          'type' => 'uri',
          'label' => 'View detail',
          'uri' => 'http://example.com/page/222',
        ),
        'actions' =>
        array (
          0 =>
          array (
            'type' => 'message',
            'label' => 'EXAMPLE',
            'text' => 'type %cuaca <query>',
          ),
        ),
      ),
    ),
    'imageAspectRatio' => 'rectangle',
    'imageSize' => 'cover',
  ),
)
)
);
}
//fitur googlemap
if($message['type']=='text') {
	    if ($command == '%location') {
        $result = lokasi($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'location',
                    'title' => 'Lokasi',
                    'address' => $result['address'],
                    'latitude' => $result['latitude'],
                    'longitude' => $result['longitude']
                ),
            )
        );
    }
}
//fitur sound cloud
//if($message['type']=='text') {
	//    if ($command == '/soundcloud' || $command == '/Soundcloud') {
      //  $result = cloud($options);
    //    $balas = array(
  //          'replyToken' => $replyToken,
//            'messages' => array(
		//    array(
              //    'type' => 'audio',
            //      'originalContentUrl' => $result['audio'],
          //        'duration' => 60000
        //        )
      //      )
    //    );
  //  }
//}
if($message['type']== 'text'){
    $pesan_datang = strtolower($message['text']);
    $filter = explode(' ', $pesan_datang);
    if($filter[0] == '%apakah') {
        $balas = send(jawabs(), $replyToken);
    }
}
// fitur instagram
if($message['type']=='text') {
	    if ($command == '%instagram') {
        $resultnya = instapoto($options);
        $result = insta($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
		array(
                  'type' => 'image',
                  'originalContentUrl' => $resultnya,
                  'previewImageUrl' => $resultnya
                ),
                array(
                    'type' => 'text',
                    'text' => $result
                )
            )
        );
    }
}
//fitur youtube
if($message['type']=='text') {
	    if ($command == '%youtube') {
        $result = youtubelist($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'text',
                    'text' => $result
                )
            )
        );
    }
}
//fitur waktu
if($message['type']=='text') {
	    if ($command == '%time') {
        $result = waktu($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'text',
                    'text' => $result
                )
            )
        );
    }
}
//fitur kata 
if($message['type']=='text') {
	    if ($command == '%say') {
        $result = say($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'text',
                    'text' => $result
                )
            )
        );
    }
}
//fitur simi
if($message['type']=='text') {
            if ($command == 'Sally') {
        $result = simi(options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'text',
                    'text' => $result
                )
            )
        );
    }
}
//fitur gambar kiblat
if($message['type']=='text') {
	    if ($command == '%qiblat') {
        $hasil = qibla($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'image',
                    'originalContentUrl' => $hasil,
                    'previewImageUrl' => $hasil
                )
            )
        );
    }
}

if($message['type']=='text') {
	    if ($command == '%image') {
        $result = google_image($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                  'type' => 'image',
                  'originalContentUrl' => $result,
                  'previewImageUrl' => $result
                )
            )
        );
    }
}
if($message['type']=='text') {
	    if ($command == '%imageneon') {
        $result = image_neon($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                  'type' => 'image',
                  'originalContentUrl' => $result,
                  'previewImageUrl' => $result
                )
            )
        );
    }
}

if($message['type']=='text') {
	    if ($command == '%jadwaltv') {
        $result = jadwaltv();
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'text',
                    'text' => $result
                )
            )
        );
    }
}
//fitur pray
if($message['type']=='text') {
	    if ($command == '%shalat') {
        $result = shalat($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'text',
                    'text' => $result
                )
            )
        );
    }
}

//fitur cuaca
if($message['type']=='text') {
	    if ($command == '%weather') {
        $result = cuaca($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'text',
                    'text' => $result
                )
            )
        );
    }
}
elseif($message['type']=='sticker'){	
	$result = stickerlist($options);
	$balas = array(
		'replyToken' => $replyToken,														
		'messages' => array(
			array(
		            'type' => 'sticker', // sesuaikan
                            'packageId' => 1, // sesuaikan
                            'stickerId' => $result// sesuaikan										
									
									)
							)
						);
						
}

if (isset($balas)) {
    $result = json_encode($balas);
//$result = ob_get_clean();
    file_put_contents('./balasan.json', $result);
    $client->replyMessage($balas);
}
?>
