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
//     	return  <<<EOT
// <script>
// $(document).ready(function(){
// $("$selector").on("click",function(){
//     var fbpopup = window.open("https://www.facebook.com/sharer/sharer.php?u=$url", "pop", "width=600, height=400, scrollbars=no");
//     return false;
// });
// })
// </script>
// EOT;

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


    public function twitter($selector,$urlselector)
    {
      
    }
}
