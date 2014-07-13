<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>OnePager - One Page Responsive Portfolio Template</title>

<meta name="viewport" content="width=device-width,initial-scale=1">

<link rel="stylesheet" href="styles/style.css" media="screen" />
<link rel="stylesheet" href="styles/media-queries.css" />
<link rel="stylesheet" href="flex-slider/flexslider.css" type="text/css" media="screen" />
<link href="styles/prettyPhoto.css" rel="stylesheet" type="text/css" media="screen" />
<link href="styles/tipsy.css" rel="stylesheet" type="text/css" media="screen" />

<script type="text/javascript" src="scripts/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="flex-slider/jquery.flexslider-min.js"></script>
<script src="scripts/jquery.prettyPhoto.js" type="text/javascript"></script>
<script src="scripts/jquery.tipsy.js" type="text/javascript"></script>
<script src="scripts/jquery.knob.js" type="text/javascript"></script>
<script type="text/javascript" src="scripts/jquery.isotope.min.js"></script>
<script type="text/javascript" src="scripts/jquery.smooth-scroll.min.js"></script>
<script type="text/javascript" src="scripts/waypoints.min.js"></script>
<script type="text/javascript" src="scripts/setup.js"></script>

<style>
  .mytable{
    width: 100%;
  }
  .mytable tr{
    text-align: center;
    padding: 1px;
  }
</style>
</head>
<body>
<div id="wrap"> 
  <!-- wrapper -->
  <div id="sidebar"> 
    <!-- the  sidebar --> 
    <!-- logo --> 
    <a href="#" id="logo"> <img src="images/logo.png" alt="" /></a> 
    <!-- navigation menu -->
    <ul id="navigation">
      <li><a href="#home" class="active">спадания количества фоловеров</a></li>
      <li><a href="#about">Решение</a></li>
      <li><a href="#portfolio">по количеству фоловеров</a></li>
      <li><a href="#skills">Решение</a></li>
      <li><a href="#contact">Contact</a></li>
    </ul>
  </div>
  <div id="container">  
    <!-- page container -->
    <h1>Выполнить   с  использованием  CodeIgniter или Yii или clear PHP</h1>
    <div class="page" id="home"> 
      <!-- page home -->
    		<h3 class="page_title">Выбрать стартапы в порядке спадания количества фоловеров  </h3>
    
            <div class="page_content">
	        <p> Выбрать стартапы <span style="color:#A296BB">в промежутке дат startup.first_incubated_date</span> и вывести их в порядке спадания количества фоловеров компаний
которые "инкубировали" эти стартапы в форме (ссылка - url,дата инкубации - first_incubated_date,имя инкубатора - name, количество фоловеров инкубатора).
Данные о том кто кого инкубировал хранятся в таблице activity.
id_author - if(type_author==Startup) id компании которая инкубировала (поле id с таблицы стартап) elseif (type_author==User) id юзера с таблицы Person.id_user
id_startup - id стартапа которого инкубировали (также поле id с таблицы стартап)
follower_count - количество фоловеров
* в таблице активити хранятся все записи об активности, 1 стартап может быть инкубирован несколько раз, нужно достать информацию только о 1-м инкубировании</p>
          </div>
    </div>
    <div class="page result_one" id="about"> 
      <!-- page about -->
      <h3 class="page_title"> Решение</h3>
      <div class="page_content">
        <?php
        // $this->table->set_heading('Ссылка','| Дата инкубации',' | Имя инкубатора ', '| Количество фоловеров');
        // foreach ($result_one as $key => $value) {
        //   $this->table->add_row($value->url, $value->first_incubated_date, $value->name);
        //   # code...
        // }

        // echo $this->table->generate();

        echo $this->Startup->get_table_formated_first_result();

        ?>

        <div class="clear"> </div>
      </div>
    </div>
    <div class="page" id="portfolio"> 
      <!-- page portfolio -->
      <h3 class="page_title"> Выбрать стартапы по количеству фоловеров</h3>
      <div class="page_content">
        <p>Выбрать стартапы <span style="color:#A296BB">в промежутке дат startup.created_at_api</span> и вывести их в спадающем списке по сумарному количеству фоловеров
у всех пользователей которые были в активности у этого стартапа в форме (ссылка, дата создания, сумарное количество фоловеров)</p>
      </div>
    </div>
    <div class="page result_two" id="skills"> 
      <!-- page skills -->
      <h3 class="page_title"> Решение</h3>
      <div class="page_content"> 
   
    <?php        
    // url  follower_count 
        /*$this->table->set_heading('Ссылка','| Дата инкубации',' | Имя инкубатора ', '| сумарное Количество фоловеров');
        foreach ($result_two as $key => $value) {
          $this->table->add_row($value->url, $value->created, $value->name,$value->follower_count);
          # code...
        }

        echo $this->table->generate();
*/
        echo $this->Startup->get_table_formated_second_result();

        // var_dump($result_two);
    ?>
<div class="clear"> </div>
      </div>
    </div>
    
    <div class="page" id="contact"> 
      <!-- page contact -->
      <h3 class="page_title"> Let's Get in Touch</h3>
      <div class="page_content">
        <fieldset id="contact_form">
          <div id="msgs"> </div>
          <form id="cform" name="cform" method="post" action="">
            <input type="text" id="name" name="name" value="Full Name*" onfocus="if(this.value == 'Full Name*') this.value = ''"
                            onblur="if(this.value == '') this.value = 'Full Name*'" />
            <input type="text" id="email" name="email" value="Email Address*" onfocus="if(this.value == 'Email Address*') this.value = ''"
                            onblur="if(this.value == '') this.value = 'Email Address*'" />
            <input type="text" id="subject" name="subject" value="Subject*" onfocus="if(this.value == 'Subject*') this.value = ''"
                            onblur="if(this.value == '') this.value = 'Subject*'" />
            <textarea id="msg" name="message" onfocus="if(this.value == 'Your Message*') this.value = ''"
                            onblur="if(this.value == '') this.value = 'Your Message*'">Your Message*</textarea>
            <button id="submit" class="button"> Send Message</button>
          </form>
        </fieldset>
        <div class="clear"> </div>
        <ul class="social_icons">
          <li><a href="#" id="fb" original-title="Join My Fan Club"> <img src="images/facebook.png" alt="Facebook" /></a></li>
          <li><a href="#" id="tw" original-title="Follow Me on Twitter"> <img src="images/twitter.png" alt="Twitter" /></a></li>
          <li><a href="#" id="ld" original-title="Find me on LinkedIn"> <img src="images/linkedin.png" alt="LinkedIn" /></a></li>
        </ul>
      </div>
    </div>
    <div class="footer">
      <p> &copy; 2012 <a href="http://eGrappler.com">eGrappler.com</a>. Some Rights Reserved.</p>
      <p> Designed With Love by <a href="http://esarfraz.com">Sarfraz Shoukat</a></p>
    </div>
  </div>
</div>
<a class="gotop" href="#top">Top</a>
</body>

<script>
//make all urls at tables in to link
  $.each( $('table tr td:first-child'), function( key, value ) {
    $(this).html('<a target="_blank" href='+$(value).text()+'>'+$(value).text()+'</a>');
  });

</script>

</html>
