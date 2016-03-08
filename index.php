<?php
if(isset($deleteImg)){
if(!empty($deleteImg)){
   header("Location: delete-img.php");
   exit();
}
elseif(empty($deleteImg)){
   $errorMsg = "画像が選択されていません。";

}
}
?> 
<!doctype html>
<html>
<head>
  <meta charset='utf-8' />
  <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
  <link href='https://fonts.googleapis.com/css?family=Nunito' rel='stylesheet' type='text/css'>
  <style>
  
    body{
      position: relative;
      font-family: 'Nunito', sans-serif;
      font-size:15px;

    }
    #wrapper{
      width: 660px;
      margin:0 auto;
    }
    h1{
      font-size:20px;
    }
    .clearfix:before,
    .clearfix:after {
      content: " ";
      display: table;
    }

    .clearfix:after {
      clear: both;
    }

    .clearfix {
      *zoom: 1;
    }
    input{
      border:none;
      font-family: 'Nunito', sans-serif;
      font-size:15px;
      margin:0;
      padding:0;
    }
    #imgHolder {
    width: 660px;
    height: auto;
    background-color: #eee;
}
    #imgHolder p.eachImage{
      display:block;
      float: left;
      width:90px;
      height:90px;
      margin:10px;
      line-height: 90px;
      position: relative;
          border: 1px dotted #ccc;
          padding: 10px;
          background-color:white 
    }
    #imgHolder p.eachImage img{
      width:90px;
      cursor:pointer;
    }
     #imgHolder p.eachImage img:hover{
    opacity: 0.8;
    }
    input.checkImg
    {
      height:20px;
      border:none !important;
      display:block;
      position: absolute;
      top:5px;

    }
    #confirm
    {
      display:none;
      opacity: 0;
      top:0;
      left:0;
      position: fixed;

      background-color:rgba(0,0,0,0.5);
    }
    #confirmbtn
    {
      background-color:#fff;
      width:40%;
      min-height:20%;
      padding:5%;
      position: absolute;
    }
    .normalBtn
    {
      width: 100px;
      height: 30px;
      text-align: center;
      border-radius: 3px;
      line-height: 30px;
      color: #fff;
      cursor: pointer;

      box-shadow: 0px 3px 0px #ccc;
    }

    .normalBtn:hover
    {
      box-shadow: 0px 2px 0px #ccc;
      position:relative;
      top:1px;
    }
    .normalBtn:active
    {
      box-shadow: 0px 0px 0px #ccc;
      position:relative;

      top:3px;
    }
    .green{
      background-color: #3A9F30;
    }
    .red{
      background-color: red;
    }
    #confirmbtn p.yesNo{
      float: left;
      margin-right:10px;
    }
    p.warning
    {
      color:red ;
      font-size:80%;
    }
    p.selectAll,p.deselectAll
    {
      float: left;
      margin-right:10px;
    }
    #header
    {
      width: 80%;
      padding:1% 10%;
      background-color: #eee;

    }
  </style>
  <script>
   $(document).ready(function(){

          $('.selectAll').on('click',selectAll);
          $('.deselectAll').on('click',deselectAll);
              
          $("#imgHolder p.eachImage img").on('click',function(){
              
              if(this.count == undefined || this.count == 0) {
               $(this).siblings('input').prop('checked',true);
               this.count = 1;
             }
             else{
              $(this).siblings('input').prop('checked',false);
              this.count = 0;
            }
              console.log(this.count);
          });

          function selectAll(){
            
             $('input').each(function(){
               $(this).prop({'checked':true});


             });  
           }

           function deselectAll(){
            
             $('input').each(function(){
               $(this).prop({'checked':false});


             });  

          }
          //check img width and height 
          $("#imgHolder p.eachImage img").each(function(){

            if($(this).height() > $(this).width()){
              $(this).css({
                "height":"90px",
                "width" :"auto"
              });

              var imgWidth = $(this).width();
              var marginLeft= (90-imgWidth) / 2;
              $(this).css({
                "margin-left": marginLeft+"px"

              　　　  });
            }
            else{
              var imgHeight = $(this).height();
              var marginTop= (90-imgHeight) / 2;
              $(this).css({
                "margin-top": marginTop+"px"

              });
            }

          });

          //add event to the submit BTN
          $('.submit').on('click',function(){
             //Get the windowHeight
               var surfaceHeight = $(window).height();  
              //Get the windowHeight
              var surfaceWidth = $(window).width(); 
            $('#confirm').css({
              "display":"block",
              "height":surfaceHeight+"px",
              "width":surfaceWidth+"px",
              "z-index":100
            }).animate({
              "opacity":1.0
            });
            $('#confirmbtn').css({
              "top" : (surfaceHeight / 2 - surfaceHeight * 0.3) + "px",
              "left" : (surfaceWidth / 2 - surfaceWidth * 0.5 * 0.5) + "px"
            });

          });

          //add backBtn Event
          $('.backBtn').on('click',function(){
            $confirm = $('#confirm');

            $confirm.animate({
              "opacity":0
            });

            var changeCssBack = setTimeout(function(){
              $confirm.css({
                "display":"none",
                "width":"0px",
                "height":"0px",
                "z-index":0
              });
            },500);
          });

          $(window).resize(function() {
         //Get the windowHeight
         var surfaceHeight = $(window).height();  
              //Get the windowHeight
              var surfaceWidth = $(window).width(); 

              $('#confirm').css({

                "height":surfaceHeight+"px",
                "width":surfaceWidth+"px",

              });
              $('#confirmbtn').css({
                "top" : (surfaceHeight / 2 - surfaceHeight * 0.3) + "px",
                "left" : (surfaceWidth / 2 - surfaceWidth * 0.5 * 0.5) + "px"
              });

            });
      
        });   


      </script>
    </head>

<header>
    <div id="header">
      <h1>画像一覧</h1>
      <p>Check images you want to delete and click the DELETE Button</p>
      <p>削除したい画像を選び、DELETEボタンを押してください</p>
      </div>
      </header>
        <div id="wrapper">
      <div class="clearfix">
      <P class="selectAll normalBtn green">Select All</P>
       <P class="deselectAll normalBtn green">Deselect All</P>
       </div>
      <form action="delete-img.php" method="post">
       <div id="imgHolder" class="clearfix">
        <?php
        //set the directory path
$dir = "./uploadfile/uploads";
//set the file list in the directory 

        //iterate loops for how many items in the list
       if(is_dir($dir) && $handle = opendir($dir)):
         while(($file = readdir($handle)) !== false): 
           $filePath = $dir.$file;
           $fileType = filetype($filePath);
             if($fileType == "file"):
        ?>
               <p class="eachImage">
                 <input type="checkbox" class="checkImg" name="deleteImg[]" value="<?php echo $filePath; ?>">
                 <img src="<?php echo $filePath; ?>" />
               </p>
            <?php endif; ?>
         <?php endwhile; ?>
        <?php endif; ?>

         </div>

        <div id="confirm">
        <div id="confirmbtn">
         <p>Are you sure to delete?</p>
         <p>本当に削除しますか?</p><p class="warning">※削除した後は戻すことはできません。</p>

         <div>
           <p class="yesNo"><input type="submit" value="Yes" class="normalBtn red"></p>
           <p class="yesNo backBtn normalBtn green">back</p>
         </div>
       </div>
</div>
       </form>
        <p class="submit normalBtn green">Delete</p>
        <p><?php echo $errorMsg; ?></p>
    </div>
</body>

</html>
