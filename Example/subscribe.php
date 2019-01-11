<?php

require("phpMQTT.php");
require("config.php");
$mqtt = new bluerhinos\phpMQTT($host, $port, "ClientID".rand());
$topicName = 'mqttdemo/chat';

if(!$mqtt->connect(true,NULL,$username,$password)){
  exit(1);
}

//currently subscribed topics
$topics[$topicName] = array("qos"=>0, "function"=>"procmsg");
$mqtt->subscribe($topics,0);

while($mqtt->proc()){
}

$mqtt->close();
function procmsg($topic,$msg){
	echo "Msg Received: $topic ==> $msg\n";
}
