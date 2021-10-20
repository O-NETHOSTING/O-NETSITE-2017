
<html>
<head>
  <meta charset="UTF-8">
  <script src="https://kryogenix.org/code/browser/sorttable/sorttable.js"></script>
</head>

<body>

  <div id="container">
  
    <h1>O-NET WOW ADDONS </h1>
    
    <table class="sortable">
      <thead>
        <tr>
          <th>Filename</th>
          <th>Type</th>
          <th>Download<small>Speed</small></th>
          <th>Upload Date</th>
        </tr>
      </thead>
      <tbody>
      <?php
        // Opens directory
        $myDirectory=opendir("./help/wow-addons_xD/");
        
        // Gets each entry
        while($entryName=readdir($myDirectory)) {
          $dirArray[]=$entryName;
        }
        
        // Finds extensions of files
        function findexts($filename)
         {
           $filename = strtolower($filename) ;
           $exts = explode("[/\\.]", $filename) ;
           $n = count($exts)-1;
           $exts = $exts[$n];
	   $exts = substr($exts, -3, 3);	 //added in				 
	    return $exts;
         }
		
		

        
        // Closes directory
        closedir($myDirectory);
        
        // Counts elements in array
        $indexCount=count($dirArray);
        
        // Sorts files
        sort($dirArray);
        
        // Loops through the array of files
        for($index=0; $index < $indexCount; $index++) {
        
          // Allows ./?hidden to show hidden files
          if($_SERVER['QUERY_STRING']=="hidden")
          {$hide="";
          $ahref="./";
          $atext="Hide";}
          else
          {$hide=".";
          $ahref="./?hidden";
          $atext="Show";}
          if(substr("$dirArray[$index]", 0, 1) != $hide) {
          
          // Gets File Names
          $name=$dirArray[$index];
          $namehref=$dirArray[$index];
          
          // Gets Extensions 
          $extn=findexts($dirArray[$index]); 
          
          // Gets file size 
          $size=number_format(filesize($dirArray[$index]));
		  print(round(filesize($dirArray[$index]) / 1024, 2));
          
          // Gets Date Modified Data
          $modtime=date("M j Y g:i A", filemtime($dirArray[$index]));
          $timekey=date("YmdHis", filemtime($dirArray[$index]));
          
          // Prettifies File Types, add more to suit your needs.
          switch ($extn){
            case "png": $extn="PNG Image"; break;
            case "jpg": $extn="JPEG Image"; break;
            case "svg": $extn="SVG Image"; break;
            case "gif": $extn="GIF Image"; break;
            case "ico": $extn="Windows Icon"; break;
            
            case "txt": $extn="Text File"; break;
            case "log": $extn="Log File"; break;
            case "htm": $extn="HTML File"; break;
            case "php": $extn="PHP Script"; break;
            case "js": $extn="Javascript"; break;
            case "css": $extn="Stylesheet"; break;
            case "pdf": $extn="PDF Document"; break;
            
            case "zip": $extn="ZIP Archive"; break;
            case "bak": $extn="Backup File"; break;
            
            default: $extn=strtoupper($extn)." File"; break;
          }
          
          // Separates directories
          if(is_dir($dirArray[$index])) {
            $extn="&lt;Directory&gt;"; 
            $size="&lt;Directory&gt;"; 
            $class="dir";
          } else {
            $class="file";
          }
          
          // Cleans up . and .. directories 
          if($name=="."){$name=". (Current Directory)"; $extn="&lt;System Dir&gt;";}
          if($name==".."){$name=".. (Parent Directory)"; $extn="&lt;System Dir&gt;";}
          
          // Print 'em
          print("
          <tr class='$class'>
            <td><a href='./help/wow-addons_xD/$namehref'>$name</a></td>
            <td><a href='./help/wow-addons_xD/$namehref'>$extn</a></td>
            <td><a href='./help/wow-addons_xD/$namehref'>HIGH</a></td>
            <td sorttable_customkey='$timekey'><a href='./help/wow-addons_xD/$namehref'>23.10.2017 12:53</a></td>
          </tr>");
          }
        }
      ?>
      </tbody>
    </table>
  
    
    
  </div>
  <style>
  * {
	padding:0;
	margin:0;
}



h1 {
	text-align: center;
	padding: 20px 0 12px 0;
	margin: 0;
}
h2 {
	font-size: 16px;
	text-align: center;
	padding: 0 0 12px 0; 
}

#container {
	box-shadow: 0 5px 10px -5px rgba(0,0,0,0.5);
	position: relative;
	background: white; 
}

table {
	background-color: #F3F3F3;
	border-collapse: collapse;
	width: 100%;
	margin: 15px 0;
}

th {
	background-color: #FE4902;
	color: #FFF;
	cursor: pointer;
	padding: 5px 10px;
}

th small {
	font-size: 9px; 
}

td, th {
	text-align: left;
}

a {
	text-decoration: none;
}

td a {
	color: #663300;
	display: block;
	padding: 5px 10px;
}
th a {
	padding-left: 0
}

td:first-of-type a {
	background: url(./.images/file.png) no-repeat 10px 50%;
	padding-left: 35px;
}
th:first-of-type {
	padding-left: 35px;
}

td:not(:first-of-type) a {
	background-image: none !important;
} 

tr:nth-of-type(odd) {
	background-color: #E6E6E6;
}

tr:hover td {
	background-color:#CACACA;
}

tr:hover td a {
	color: #000;
}





/* icons for file types (icons by famfamfam) */

/* images */
table tr td:first-of-type a[href$=".jpg"], 
table tr td:first-of-type a[href$=".png"], 
table tr td:first-of-type a[href$=".gif"], 
table tr td:first-of-type a[href$=".svg"], 
table tr td:first-of-type a[href$=".jpeg"]
{background-image: url(./.images/image.png);}

/* zips */
table tr td:first-of-type a[href$=".zip"] 
{background-image: url(./.images/zip.png);}

/* css */
table tr td:first-of-type a[href$=".css"] 
{background-image: url(./.images/css.png);}

/* docs */
table tr td:first-of-type a[href$=".doc"],
table tr td:first-of-type a[href$=".docx"],
table tr td:first-of-type a[href$=".ppt"],
table tr td:first-of-type a[href$=".pptx"],
table tr td:first-of-type a[href$=".pps"],
table tr td:first-of-type a[href$=".ppsx"],
table tr td:first-of-type a[href$=".xls"],
table tr td:first-of-type a[href$=".xlsx"]
{background-image: url(./.images/office.png)}

/* videos */
table tr td:first-of-type a[href$=".avi"], 
table tr td:first-of-type a[href$=".wmv"], 
table tr td:first-of-type a[href$=".mp4"], 
table tr td:first-of-type a[href$=".mov"], 
table tr td:first-of-type a[href$=".m4a"]
{background-image: url(./.images/video.png);}

/* audio */
table tr td:first-of-type a[href$=".mp3"], 
table tr td:first-of-type a[href$=".ogg"], 
table tr td:first-of-type a[href$=".aac"], 
table tr td:first-of-type a[href$=".wma"] 
{background-image: url(./.images/audio.png);}

/* web pages */
table tr td:first-of-type a[href$=".html"],
table tr td:first-of-type a[href$=".htm"],
table tr td:first-of-type a[href$=".xml"]
{background-image: url(./.images/xml.png);}

table tr td:first-of-type a[href$=".php"] 
{background-image: url(./.images/php.png);}

table tr td:first-of-type a[href$=".js"] 
{background-image: url(./.images/script.png);}

/* directories */
table tr.dir td:first-of-type a
{background-image: url(./.images/folder.png);}
  </style>
</body>

</html>