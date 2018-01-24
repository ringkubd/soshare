<?php

namespace Anwar\Soshare;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SoshareController extends Controller
{
    public function soshare_script($selector)
    {
    	//$my_file = 'soshare.js';
		//$handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file);
		$data = $this->jscode($selector,'http://bdaliens.com');
		//fwrite($handle, $data);
		return $data;
    }

    private function jscode($selector,$url,$customclass=null)
    {
    	return <<<EOT

  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>

  <!-- Your share button code -->
  <div class="fb-share-button" 
    data-href="https://bdaliens.com" 
    data-layout="button_count">
  </div>
EOT;
    }



    public function fb_markup($class = null)
    {
    	return <<<EOT
    	<div class="shareBtn btn btn-success clearfix" class="">Share</div>
    	<p class="$class">
  <hr />
</p>
EOT;
    }


    public function fb_script2()
    {
    	return <<<EOT
    	<script>
document.getElementsByClassName('shareBtn').onclick = function() {
  FB.ui({
    method: 'share',
    display: 'popup',
    href: 'https://developers.facebook.com/docs/',
  }, function(response){});
}
</script>
EOT;
    }


    public function fb_script3()
    {
    	return <<<EOT
<script>

  window.fbAsyncInit = function() {
    FB.init({
      appId            : 1652012351544822,
      autoLogAppEvents : true,
      xfbml            : true,
      version          : 'v2.11'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));

    	$('document').ready(function(){
    		$(document).on('click','.shareBtn',function(){
    			FB.ui({
			    method: 'share',
			    display: 'popup',
			    href: 'https://developers.facebook.com/docs/',
			  }, function(response){});
    		})
    	})
</script>
EOT;
    }

public function fblinkshare($selector,$urlselector)
    {
      $abc = config('soshare.facebook.url');
      return <<<EOT
   <script>

   $(document).ready(function(){
    var prothomongsho = "$abc"
    var ditioongsho   = $("$selector").attr('href')
    var shareurl = prothomongsho + ditioongsho

    $(document).on('click',"$selector",function(){
      console.log(shareurl)
      window.open(shareurl,'_blank','toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=300,height=300');return false;
    })
   })

   </script>
EOT;
    }


    public function twitter($selector)
    {
      $uri         = config('soshare.twitter.uri');
      $text        = config('soshare.twitter.text');
      $hashtags    = config('soshare.twitter.hashtags');
      $via         = config('soshare.twitter.via');
      $related     = config('soshare.twitter.related');
      $inreplyto   = config('soshare.twitter.inreplyto');


      return <<<EOT
   <script>

   $(document).ready(function(){
    $(document).on('click',"$selector",function(){

      var uri         = "$uri"
      var url         = 'url='+$(this).attr('href')
      var text        = 'text='+"$text"
      var hashtags    = 'hashtags='+"$hashtags"
      var via         = 'via='+"$via"
      var related     = 'related='+"$related"
      var inreplyto   = 'inreplyto='+"$inreplyto"
      var separator   = "&"
      var shareurl    = uri + separator + text + separator + url + separator + hashtags + separator + via +separator + related + separator + inreplyto

      console.log(shareurl)
      window.open(shareurl,'_blank','toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=300,height=300');return false;
    })
   })

   </script>
EOT;


    }


    public function linkdin($selector)
    {
      $uri         = config('soshare.linkedin.uri');
      $summary     = config('soshare.linkedin.summary');
      $mini        = config('soshare.linkedin.mini');
      $title       = config('soshare.linkedin.title');
      $source      = config('soshare.linkedin.source');



      return <<<EOT
   <script>

   $(document).ready(function(){
    $(document).on('click',"$selector",function(){

      var uri         = "$uri"
      var url         = 'url='+$(this).attr('href')
      var summary     = 'summary='+"$summary"
      var mini        = 'mini='+"$mini"
      var title       = 'title='+"$title"
      var source      = 'source='+"$source"
      var separator   = "&"
      var shareurl    = uri + url + separator + summary + separator + mini +separator + title + separator + source

      console.log(shareurl)
      window.open(shareurl,'_blank','toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=300,height=300');return false;
    })
   })

   </script>
EOT;


    }
}
