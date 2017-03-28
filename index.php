<!DOCTYPE html>
<html>
<head>
    <title>LIFX Remote Control</title>
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="index.css">
    <link href="https://fonts.googleapis.com/css?family=Rubik:900" rel="stylesheet">
    <script type="text/javascript" src="colorpicker.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>

<div class = "head_bar">
    <h2 id = "head_bar_title">LIFX</h2>
</div>

<div class = "lights">
    <h2 class = "section_header">Your Lights</h2>
        
     <ul id="skills_list">
         <li class="skills_item on"><div class="c100 p7 blue">
             <span>Light 1</span>
             <div class="slice">
                 <div class="bar"></div>
                 <div class="fill"></div>
             </div>
         </div></li>
         
         <li class="skills_item on"><div class="c100 p88 red" >
             <span>Light 2</span>
             <div class="slice">
                 <div class="bar"></div>
                 <div class="fill"></div>
             </div>
         </div></li>
         
         <li class="skills_item on"><div class="c100 p83 orange" >
             <span class="skills_item">Light 3</span>
             <div class="slice">
                 <div class="bar"></div>
                 <div class="fill"></div>
             </div>
         </div></li>
         <li class="skills_item"><div class="c100 p75 green" >
             <span>Light 4</span>
             <div class="slice">
                 <div class="bar"></div>
                 <div class="fill"></div>
             </div>
         </div></li>
         
         <li class="skills_item"><div class="c100 p100 blue">
             <span>Light 5</span>
             <div class="slice">
                 <div class="bar"></div>
                 <div class="fill"></div>
             </div>
         </div></li>
        </ul>
     
         <hr class = "section_seperator">
</div>

<!--                              -->

<div class = "controls">
    <h2 class = "section_header">Controls</h2>
    <!-- Lights to modify-->
    <div class = "active_lights_selection">
        <select id = "lights_selection_list" name="lights" multiple>
            <option value="light_1">Light 1</option>
            <option value="light_2">Light 2</option>
            <option value="light_3">Light 3</option>
            <option value="light_4">Light 4</option>
            <option value="light_5">Light 5</option>
        </select>
    </div>
    <!--end lights to modify-->
    
    <!--Color Picker -->
  <div class = "color_picker">
        <div id="picker"></div>
                <div id="slide"></div>
                <script type="text/javascript">
                  ColorPicker(
                    document.getElementById('slide'),
                    document.getElementById('picker'),
                    function(hex, hsv, rgb) {
                      document.getElementById("color_preview").style.backgroundColor = hex;
                      document.color_preview.style.backgroundColor = hex;
                    });
                </script>
        <div id = "color_preview"></div>
        </div>
    <!--end color picker-->
       
    <!--brightness selection -->
    <div class = "brightness_selection">
         <h3 id = "brightness_selection_header">Brightness</h3>
        <input type="range" id = "range" class="brightness_range" value="90">
        
    </div>
    <!-- end brightness selection-->
    
    
    <div class = "update_light_settings">
        <button type = "button" onclick = "myFunction2()" name = "button" class = "update_button_brightness update_button">Update Lights</button>
        <button type = "button" onclick = "myFunction()" name = "button" class = "update_button_random update_button">Random</button>
        <h4 id = "random_settings_rgb">RGB: (0,0,0)</h4>
        <h4 id = "random_settings_brightness">Brightness 0%</h4>
    </div>
    
    
    <hr class = "section_seperator">
</div>

<!--                              -->
<div class = "Account">
    <h2 class = "section_header">Account</h2>
    <form id = "api_form" name="myform" action="" method="GET">
        <p style = "display: inline;">Please enter your API key in the box below</p>
        <input id = "api_text_box" type = "text" name="apiField" value = "">
        <input id = "api_submit_button"  class = "update_button" type = "button" name = "submitButton" value = "Submit" onClick="apiKey(this.form)">
    </FORM>

</div>




</body>
</html>

<script>
    function apiKey (form) {
    var key = form.inputbox.value;
    alert ("You typed: " + key);
}
</script>

<!--light update-->
<script type="text/javascript">
    
    $(document).ready(function(){
        $("button").click(function(){
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: 'lightUpdate.php',
                data: {"param1: "color=673AB7" param2:".8""},
                success: function() {
                    alert("Lights Updated");
                    /*$("p").text(data);*/
                    /*document.getElementsByClassName('.c100').style.fontSize='40px';*/

                }
            });
   });
});
</script>

<script>
function myFunction() {
    document.getElementById("random_settings_rgb").innerHTML = "(" + Math.random()* 255 + ", " + Math.random()* 255 + ", " + Math.random()* 255 + ")";
    document.getElementById("random_settings_brightness").innerHTML = "Brightness: " + Math.random() * 100 + "%"
}
function myFunction2(){
    
    var x = document.getElementById("range").value;
    document.getElementById("random_settings_rgb").innerHTML = "(" + Math.random()* 255 + ", " + Math.random()* 255 + ", " + Math.random()* 255 + ")";
    document.getElementById("random_settings_brightness").innerHTML = "Brightness: " + x + "%"
}
</script>


