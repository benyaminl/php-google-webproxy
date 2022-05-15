<?php

use Proxy\Event\ProxyEvent;
use Proxy\Plugin\AbstractPlugin;

class GooglePlugin extends AbstractPlugin
{
    protected $url_pattern = "google.com";

    public function onBeforeRequest(ProxyEvent $event)
    {
        // fired right before a request is being sent to a proxy
        $response = $event['response'];
        $url = $event['request']->getUrl();
        if (preg_match("/(url)/i", $url)) {
          $temp = explode("&", $url);
          $location = "";
          foreach ($temp as $t) {
              if (strpos($t, "url=") !== false) {
                $location = $t;
              }
          }
          $location = str_replace("url=","", $location);
          $location = preg_replace('/https%3A%2F/', 'https%3A%2F%2F', $location);
          $location = urldecode($location);
          
          $response->headers->set("location", $location);
          return;
        }

        $event['request']->headers->set('User-Agent', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 5.1; Trident/4.0; .NET CLR 1.1.4322; .NET CLR 2.0.50727; .NET CLR 3.0.4506.2152; .NET CLR 3.5.30729)');
    }

    public function onHeadersReceived(ProxyEvent $event)
    {
        // fired right after response headers have been fully received - last chance to modify before sending it back to the user
        // Change each form to DDG form 

        
    }

    public function onCurlWrite(ProxyEvent $event)
    {
        // fired as the data is being written piece by piece
    }

    public function onCompleted(ProxyEvent $event)
    {
        // Change each form to DDG form 
        $response = $event['response'];
        $output = $response->getContent();
        // replace broken URL
        // $output = preg_replace('/https%3A%2F%2Fwww.google.com%2Furl%3Fq%3Dhttps%3A%2F/', 'https%3A%2F%2F', $output);
        $output = preg_replace('/url%3Fq%3Dhttps%3A%2F/', 'url%3Fq%3Dhttps%3A%2F%2F', $output);
        // $output = preg_replace('/href=".{0,}%26sa%3DU.{0,}">/', '">', $output);
        // $output = preg_replace("/url%3Dhttps%3A%2F/", "url%3Dhttps%3A%2F%2F", $output);
        $response->setContent($output);// fired after the full response=headers+body has been read - will only be called on "non-streaming" responses
    }
}
