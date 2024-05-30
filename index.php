
<link rel="stylesheet" href="/tailwind-net.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
 <script src="https://cdn.tailwindcss.com"></script>
<style>
.o-main,header,footer,form{
    display:none !important
}
    .tw-flex h2{
        display: none;

    }
    .tw-flex p{
        display: none;

    }
    .tw-flex .tw-pt-6{
        display: none;

    }
    figure + div {
  display: none !important;
}
.tw-hidden {
  display: none !important;
}
.tw-col-span-12.md\:tw-col-span-10 {
  width: 100% !important;
  grid-column: span 12;
}
main > div > div:nth-child(2) {
    display: none !important;
}
.tw-mt-28{
    margin-top:0px !important
}
.mybuton{
    display: block;
    width: 100%;
    padding:5px;
    background-color:black;
    color:white;
    text-align:center
}
.wallahtest{
    color:red;
}
</style>
<script>



</script>
<?php
$nam=urlencode($_GET['name']);
$key=urlencode($_GET['key']);
$Colors=urlencode($_GET['Colors']);
$FilterByTags=urlencode($_GET['FilterByTags']);
$slogan=urlencode($_GET['slogan']);
$LogoStyle=$_GET['LogoStyle'];
$html=file_get_contents("https://www.brandcrowd.com/maker/logos/page1?Text=$nam&TextChanged=&IsFromRootPage=true&SearchText=$key&KeywordChanged=true&LogoStyle=$LogoStyle&FontStyles=&Colors=$Colors&FilterByTags=$FilterByTags&slogan=$slogan");
//echo $html;
// Load the HTML into DOMDocument
$doc = new DOMDocument();
libxml_use_internal_errors(true); // To handle any HTML5 parsing errors
$doc->loadHTML($html);
libxml_clear_errors();

// Remove divs immediately following figure tags
$figures = $doc->getElementsByTagName('figure');
foreach ($figures as $figure) {
    $nextSibling = $figure->nextSibling;
    while ($nextSibling && $nextSibling->nodeType == XML_TEXT_NODE) {
        $nextSibling = $nextSibling->nextSibling;
    }
    if ($nextSibling && $nextSibling->nodeName === 'div') {
        $nextSibling->parentNode->removeChild($nextSibling);
    }
}

// Add a script element to the head of the document
$head = $doc->getElementsByTagName('head')->item(0);
if ($head) {
    $script = $doc->createElement('script', '
        document.addEventListener("DOMContentLoaded", function() {
            const pictures = document.querySelectorAll("figure");
            pictures.forEach(picture => {
            
             const imgElement = picture.querySelector("img");
  const imgSrc = imgElement.getAttribute("src");
        console.log(imgSrc); // Do whatever you want with the src value
        
                const button = document.createElement("button");
                button.innerText = "Download Logo";
                
                button.onclick = function() {
                 //   alert("Logo finalized!");
            //imgSrc.click();
            window.location.href = imgSrc;
                };
                button.classList.add("mybuton"); 
                
                picture.appendChild(button);
            });
        });


    ');
    $script->setAttribute('type', 'text/javascript');
    $head->appendChild($script);
    
}

// Save the modified HTML
$modifiedHtml = $doc->saveHTML();




echo $modifiedHtml;
?>
<script>

jQuery(document).ready(function(){
   // jQuery(".tw-flex h2").remove();
     jQuery(".tw-flex h2").parent().remove();
        jQuery(".tw-flex p").remove();
            jQuery("ol").remove();
        jQuery(".tw-flex .tw-pt-6").remove();
 //       jQuery(".tw-col-span-12 .tw-flex").remove();
 var t=jQuery("figure img").attr("src");
jQuery("figure a").attr("href","#");
jQuery("title").text("AI Logo Maker By Haris Khan");
    
jQuery("body .tw-container").prepend(`<h3 class="text-2xl text-center pb-2">Create Your Own Logo By Just One Click</h3>


<form style="display:block !important" method="get" >
    <div class="grid gap-2 p-3 bg-white  lg:grid-cols-7 md:grid-cols-2 sm:grid-cols-2 rounded">
        <div>
        
            <input type="text" value="<?php echo $_GET['name']; ?>" id="companyname" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Name/ Company Name/ Brand Name" name="name" required />
        </div>
        <div>
        
            <input type="text" id="key" value="<?php echo $_GET['key']; ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Keyword/Your Business Nature" name="key" required />
        </div>
        <div>

            <input type="text" id="slogan" name="slogan" value="<?php echo $_GET['slogan']; ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Your Logo Slogan" required />
        </div>  
        <div>
            <select id="FilterByTags" name="FilterByTags" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
   
   <option value="Tag wordmark|corporate|emblem|mascot|abstract|vintage|classic" selected>All Tags</option>
    <option value="Tag wordmark">Tag Wordmark</option>
    <option value="corporate">Corporate</option>
    <option value="emblem">Emblem</option>
    <option value="mascot">Mascot</option>
    <option value="abstract">Abstract</option>
    <option value="vintage">Vintage</option>
    <option value="classic">Classic</option>
    
    
  </select>
             </div>
              <div>
            <select id="LogoStyle" name="LogoStyle" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
   
   <option value="0" selected>All Type</option>
    <option value="1">Type 1</option>
    <option value="2">Type 2</option>
    <option value="3">Type 3</option>
 
    
    
  </select>
             </div>
        <div>
          
            <input type="text" id="Colors" value="<?php echo $_GET['Colors']; ?>" name="Colors" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Brand Colors" />
        </div>
     <div>
     <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Create My Logo</button>
     </div>
    </div>
    
</form>

`);

});

</script>
