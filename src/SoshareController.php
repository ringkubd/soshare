<?php

namespace Anwar\Soshare;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SoshareController extends Controller
{

public function fblinkshare($selector)
    {
      $abc = config('soshare.facebook.url');
      return <<<EOT
   <script>

   $(document).ready(function(){
    $(document).on('click',"$selector",function(){
    
      var prothomongsho = "$abc"
      var ditioongsho   = $(this).attr('href')
      var shareurl = prothomongsho + ditioongsho
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
