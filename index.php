<!-- <!DOCTYPE HTML> -->
<html>
<!--[if IE 7 ]>    <html class= "ie7"> <![endif]-->
<!--[if IE 8 ]>    <html class= "ie8"> <![endif]-->
<!--[if IE 9 ]>    <html class= "ie9"> <![endif]-->
<head>
     <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="css/main.css" rel="stylesheet" type="text/css" />
    <link href="css/prettyPhoto.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.quicksand.js"> </script>
    <script type="text/javascript" src="js/custom.js"> </script>
    <script type="text/javascript" src="js/hoverIntent.js"> </script>
    <script type="text/javascript" src="js/jquery.prettyPhoto.js"></script>
    <script type="text/javascript" src="js/jquery.easing.1.3.js"> </script>
    <!-- <script type="text/javascript" src="js/twitter.js"> </script> -->
    <!-- *************************   CONTACT FORM   **************************** -->
    <script type='text/javascript'>
        $(document).ready(function() {
            var active_color = '#929191'; // Colour of user provided text
            var inactive_color = '#929191'; // Colour of default text
            $("input.default-value").css("color", inactive_color);
            var default_values = new Array();
            $("input.default-value").focus(function() {
                if (!default_values[this.id]) {
                    default_values[this.id] = this.value;
                }
                if (this.value == default_values[this.id]) {
                    this.value = '';
                    this.style.color = active_color;
                }
                $(this).blur(function() {
                    if (this.value == '') {
                        this.style.color = inactive_color;
                        this.value = default_values[this.id];
                    }
                });
            });

            $('#contactform').submit(function() {
                formvalues = $("#contactform").serialize();
                $.ajax({
                    type: "POST",
                    url: "mailer.php",
                    data: formvalues,
                    dataType: "json",
                    success: function(data) {
                        if (data.success == 1) {
                            $("#contactwrapper").slideUp(750, function() {
                                $('#contactmessage').html('Thanks! Please check your email to confirm your subscription.');
                            });
                        } else {
                            if (data.invalid_email == 1) {
                                $('#email').addClass("form_error");
                            } else {
                                $('#email').removeClass("form_error");
                            }
                        }
                    }
                });
                return false;
            });
        });
    </script>
    <?
        if (isset($_GET['language']) )
        {
            $lang = $_GET['language'];

            if ( $lang == 'es' )
            {
                $lang='es';
            }
            else
            {
                $lang='en';
            }
        }
        else
        {
            switch (substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2))
            {
                case "es":
                    $lang='es';
                break;
                default:
                    $lang='en';
                break;
            }
        }
    ?>
    <title>Carlos Mestre - <? echo ($lang == 'es' ? 'Castellano' : 'English') ;?></title>
</head>

<body>
<?



    $lang_en = array(
        'download'              => 'Download PDF',
        'about_header'          => 'Developer / DevOps',
        'about_1'               => 'Hi! I am Carlos, a passionate about technology.',
        'about_2'               => 'Last years I focused on develop applications focused to Business and Industrial environment.',
        'about_3'               => '',
        'about_4'               => 'In constant search of new knowledge, I like to design and build almost anything.',
        'contact_phone'         => '(+49) 152 57086784',
        'contact_web'           => 'www.masterfactories.com',
        'contact_geogr'         => 'Munich, Germany',
        'contact_email'         => 'carmesce@gmail.com',
        'about_footer'          => 'Carlos Mestre',
        'skills_header'         => 'Competences',
        'skills_01'             => 'Systems and Networks',
        'skills_02'             => 'PHP',
        'skills_03'             => 'C++',
        'skills_04'             => 'Xcode (iOs)',
        'skills_05'             => 'Bash / Batch / Shell script',
        'skills_06'             => 'Javascript',
        'skills_07'             => 'MySQL',
        'skills_08'             => 'HTML',
        'skills_09'             => 'CSS',
        'skills_10'             => 'GIT',
        'skills_11'             => 'Appcelerator Titanium',
        'skills_12'             => 'Java',
        'skills_13'             => 'Windows / Mac / Linux ',
        'skills_14'             => 'Microcontrollers and PCB design',
        'education_header'      => 'Studies',
        'education_1_header'    => 'UPV - Polytechnic University of Valencia',
        'education_1_date'      => 'OCT 2002 - JAN 2011',
        'education_1_subject'   => 'TELECOMMUNICATION ENGINEER',
        'education_1_body_1'    => 'Telecommunications Engineering, specialized in Networks',
        'education_1_body_2'    => 'I will highlight three things I learned at the University: It\'s easy for me to take any concept no matter how difficult or complicated as it may seem; I am able to develop any project that I could design and to implement perseverance, dedication and effort in every task, and not only in the ones that I find interesting.',
        'education_2_header'    => 'AIT - Athlone Institute of Technology',
        'education_2_date'      => 'OCT 2007 - SEP 2009',
        'education_2_subject'   => 'BACHELOR OF ENGINEERING',
        'education_2_body_1'    => 'Bachelor of Engineering in Electronics and Wireless Communications',
        'education_2_body_2'    => 'In Ireland I learned that there is not only one way to teach. Taht it is better to divide the ideas in easy and small concepts, even with risk of sounding simple. And that different languages ​​make you think differently. I learned more mathematics and programming in less time and with less effort in English than in Spanish',
        'languages_header'      => 'Languages',
        'languages_1'           => 'Native Spanish',
        'languages_2'           => 'Native Catalonian',
        'languages_3'           => 'English C1',
        'languages_4'           => 'German A2',
        'languages_5'           => 'French A1',
        'languages_6'           => 'Japanese (written) A1',
        'experience_header'     => 'Work experience',
        'experience_1_company'  => '<u>Confidential</u>',
        'experience_1_date'     => 'SEP 2013 - PRESENT',
        'experience_1_position' => 'SENIOR DEVELOPER',
        'experience_1_body_1'   => 'Currently I am working at <u>Confidencial</u>',
        'experience_1_body_2'   => '<u>Confidential</u> is a startup with an agile team, focusing on short cycles, agile and fast development. I have learned a lot devoting my full time to the different projects integrated in the same CRM.',
        'experience_1_body_3'   => 'Living in Germany and Hungary allowed me to learn languages ​​and know different ways of solving situations, and live away from my family and friends has taught me to face many problems. Overall it has been an experience that cast me to evolve. If you are wondering why you are this CV even though my experience had been positive: Living for long time in countries wich languaje I don\'t master makes me feel isolated, and I reached a point where my pay is not consistent with my duties so I\'m to contemplating alternatives.',
        'experience_1_key_1'    => 'Programming in PHP, jQuery, MySQL ...',
        'experience_1_key_2'    => 'CRM development for corporate clients',
        'experience_1_key_3'    => 'Responsible for planning and mobile application development',
        'experience_1_key_4'    => 'Complete solution including IT and support',
        'experience_1_key_5'    => 'Frequent trips to clients factories',
        'experience_2_company'  => 'Freelance',
        'experience_2_date'     => 'JUN 2011 - SEP 2013',
        'experience_2_position' => 'JUNIOR WEB DEVELOPER',
        'experience_2_body_1'   => 'My experience as freelance was pretty enriching',
        'experience_2_body_2'   => 'Freelancing allowed me to do what I like best: design, and actually make those designs real while learning new technologies.',
        'experience_2_body_3'   => 'I made several automation projects, web pages, blogs, profiles and online presence, consulting ... ',
        'experience_2_body_4'   => 'In addition, also was part of several startups, even did not become viable, that let me sharpen my teamwork skills and made me learn in areas I will not choose myself. Finally, an honest assessment of my business skills, and lack of a partner who would find adequate customers instigated me to seek work as an employee.',
        'experience_2_key_1'    => 'despachosValencia.com',
        'experience_2_key_2'    => 'VSarobe.com',
        'experience_2_key_3'    => 'streamingDJs.com',
        'experience_2_key_4'    => 'Conecta un sueño (Link a Dream)',
        'experience_2_key_5'    => 'VideonWall',
        'experience_2_key_6'    => 'Automation projects for individuals, including home automation',
        'experience_3_company'  => 'Games Valley',
        'experience_3_date'     => 'SEP 2001 - OCT 2002',
        'experience_3_position' => 'OWNER AND MANAGER',
        'experience_3_body_1'   => 'Most likely the best time of my life',
        'experience_3_body_2'   => 'About to turn 18, I asked for a loan and got the transfer of a Video Games rental store. I changed the main business of sale/rental to a pay per hour schema on gaming machines. I Dealed with the public, had responsibilities, had money and played video games a lot. I do not know what else to ask for a job.',
        'experience_3_key_1'    => 'Evaluation of costs and benefits',
        'experience_3_key_2'    => 'Dealing with distributors: hardware, office material and games',
        'experience_3_key_3'    => 'Systems integrator',
        'experience_3_key_4'    => 'Business management: paperwork, banks, social security, contracts ...',
        'experience_3_key_5'    => 'Self employed',
        'experience_3_key_6'    => 'I had an employee for a period of 5 months',
        'experience_4_company'  => 'Others',
        'experience_4_date'     => '2010 ~ 2011',
        'experience_4_position' => 'TEACHER, IT...',
        'experience_4_body_1'   => 'I do not like being bored',
        'experience_4_body_2'   => 'Over the years I have had several irrelevant or short-term jobs. Although usually, performing technical functions not always had been the case. Relly liked to work as teacher: Not only do I enjoy teaching but my students have praised me on more than one occasion.',
        'experience_4_key_1'    => 'Private Teacher',
        'experience_4_key_2'    => 'Teacher at Sciences Information Center (Centro Ciencias Información S.L.)',
        'experience_4_key_3'    => 'IT technician Computer Support Valdelasfuentes (Soporte Informático Valdelasfuentes S.L.)',
        'experience_4_key_4'    => 'Waiter in train station Cafe',
        'experience_4_key_5'    => 'Dependent at freesh vegetables section, Carrefour',
        'experience_4_key_6'    => 'Kitchen helper',
        'description_header'    => 'About me',
        'description_body_1'    => 'I have skills that make me good with computers and/or programming.',
        'description_body_2'    => '',
        'description_body_3'    => 'I am intelligent, tolerant, curious, persevering and perfectionist.',
        'description_body_4'    => 'I have attention to detail and aversion to failure.',
        'description_body_5'    => 'I enjoy when I face new challenges.',
        'description_body_6'    => 'I do not like to ask or need other people, but I love to get help when they realize that I need it.',
        'description_body_7'    => 'I try to treat everyone as he/she treat other people.',
        'interest_header'       => 'Interests',
        'interest_01'           => 'Building Games',
        'interest_02'           => 'Video Games',
        'interest_03'           => 'Space Exploration',
        'interest_04'           => 'Science fiction',
        'interest_05'           => 'Table games',
        'interest_06'           => 'Cooking',
        'interest_07'           => '15 years of martial arts',
        'interest_08'           => 'Skiing, diving',
        'portfolio_header'      => 'Portfolio',
        'footer_legal'          => 'The information in this document may only be used for purposes of candidacy.',
    );

    $lang_es = array(
        'download'              => 'Descarga en PDF',
        'about_header'          => 'Desarrollador / DevOps',
        'about_1'               => '¡Hola! Soy Carlos, apasionado por la tecnología.',
        'about_2'               => 'Estos últimos años me he dedicado al desarrollo de Aplicaciones a medida para entorno Empresarial e Industrial.',
        'about_3'               => '',
        'about_4'               => 'En constante busca de nuevos conocimientos, me gusta diseñar y construir prácticamente cualquier cosa.',
        'contact_phone'         => '(+49) 152 57086784',
        'contact_web'           => 'www.masterfactories.com',
        'contact_geogr'         => 'Munich, Alemania',
        'contact_email'         => 'carmesce@gmail.com',
        'about_footer'          => 'Carlos Mestre',
        'skills_header'         => 'Competencias',
        'skills_01'             => 'Sistemas y Redes',
        'skills_02'             => 'PHP',
        'skills_03'             => 'C++',
        'skills_04'             => 'Xcode (iOs)',
        'skills_05'             => 'Bash / Batch / Shell script',
        'skills_06'             => 'Javascript',
        'skills_07'             => 'MySQL',
        'skills_08'             => 'HTML',
        'skills_09'             => 'CSS',
        'skills_10'             => 'GIT',
        'skills_11'             => 'Appcelerator Titanium',
        'skills_12'             => 'Java',
        'skills_13'             => 'Windows / Mac / Linux ',
        'skills_14'             => 'Microcontroladores y diseño de PCB',
        'education_header'      => 'Estudios',
        'education_1_header'    => 'UPV - Universidad Politécnica de Valencia',
        'education_1_date'      => 'OCT 2002 - ENE 2011',
        'education_1_subject'   => 'INGENIERO DE TELECOMUNICACIONES',
        'education_1_body_1'    => 'Ingeniero Técnico de Telecomunicaciones, especialidad en Telemática',
        'education_1_body_2'    => 'He de destacar tres cosas que aprendí en la Universidad: Tengo facilidad para asumir cualquier concepto sin importar lo difícil o complicado que parezca; soy capaz de desarrollar cualquier proyecto que idee y aplicar constancia, dedicación y esfuerzo a todas las tareas, y no sólo a las que me resulten interesantes.',
        'education_2_header'    => 'AIT - Athlone Institute of Technology',
        'education_2_date'      => 'OCT 2007 - SEP 2009',
        'education_2_subject'   => 'BACHELOR OF ENGINEERING',
        'education_2_body_1'    => 'Bachelor of Engineering in Electronics and Wireless Communications',
        'education_2_body_2'    => 'En Irlanda aprendí que no solo hay una forma de enseñar. Que es mejor dividir las ideas en conceptos sencillos y escuetos, a riesgo de parecer simple. Y que distintos idiomas te hacen pensar de distinta forma. Aprendí más matemáticas y programación en menos tiempo y con menos esfuerzo en inglés que en castellano',
        'languages_header'      => 'Idiomas',
        'languages_1'           => 'Castellano Nativo',
        'languages_2'           => 'Catalán Nativo',
        'languages_3'           => 'Inglés C1',
        'languages_4'           => 'Alemán A2',
        'languages_5'           => 'Francés A1',
        'languages_6'           => 'Japonés (escrito) A1',
        'experience_header'     => 'Experiencia laboral',
        'experience_1_company'  => '<u>Confidencial</u>',
        'experience_1_date'     => 'SEP 2013 - PRESENTE',
        'experience_1_position' => 'SENIOR DEVELOPER',
        'experience_1_body_1'   => 'Actualmente trabajo en <u>Confidencial</u>',
        'experience_1_body_2'   => '<u>Confidencial</u> es una startup con un equipo ágil, centrado en ciclos de desarrollo cortos, ágiles y rápidos. He aprendido a mucho al dedicar mi tiempo completo al los diferentes proyectos integrados en el mismo CRM.',
        'experience_1_body_3'   => 'Vivir en Alemania y Hungría me ha permitido aprender idiomas y conocer formas distintas de resolver situaciones, y vivir lejos de mi familia y amigos me ha enseñado a afrontar muchos problemas. En general ha sido una experiencia que me ha echo evolucionar. Si se preguntan por qué leen este CV a pesar de que mi experiencia sea muy positiva: Estar lejos de la familia y seres queridos, y llevar tiempo planteando que mi remuneración no es acorde a mis funciones me han echo tener que contemplar alternativas.',
        'experience_1_key_1'    => 'Programación en PHP, Jquery, MySQL...',
        'experience_1_key_2'    => 'Desarrollo de CRM para clientes corporativos',
        'experience_1_key_3'    => 'Responsable de planificación y desarrollo de aplicaciones móviles',
        'experience_1_key_4'    => 'Solución completa incluyendo IT y soporte',
        'experience_1_key_5'    => 'Frecuentes viajes a fábricas del cliente',
        'experience_2_company'  => 'Freelance',
        'experience_2_date'     => 'JUN 2011 - SEP 2013',
        'experience_2_position' => 'JUNIOR WEB DEVELOPER',
        'experience_2_body_1'   => 'Mi experiencia como freelance fué muy enriquecedora',
        'experience_2_body_2'   => 'Trabajar como freelance me permitió hacer lo que más me gusta: Diseñar, y plasmar en la realidad esos diseños y seguir aprendiendo tecnologías.',
        'experience_2_body_3'   => 'Realicé varios proyectos de domótica, páginas web, blogs, perfiles y presencia online, consultorías...</p><p> Además, también formé parte de varias startups que, aunque no llegaron a ser viables, me permitieron afilar mis habilidades para el trabajo en equipo y vivir experiencias enriquecedoras. Finalmente, una evaluación sincera de mis habilidades comerciales, y la falta de un socio que supliera mis carencias me instigaron a buscar trabajo como empleado.',
        'experience_2_key_1'    => 'despachosValencia.com',
        'experience_2_key_2'    => 'VSarobe.com',
        'experience_2_key_3'    => 'streamingDJs.com',
        'experience_2_key_4'    => 'Conecta un sueño',
        'experience_2_key_5'    => 'VideonWall',
        'experience_2_key_6'    => 'Proyectos de domótica y automatismos para particulares',
        'experience_3_company'  => 'Games Valley',
        'experience_3_date'     => 'SEP 2001 - OCT 2002',
        'experience_3_position' => 'PROPIETARIO Y GERENTE',
        'experience_3_body_1'   => 'Probablemente la mejor época de mi vida',
        'experience_3_body_2'   => 'A punto de cumplir 18 años, pedí un préstamo y adquirí el traspaso de una tienda de alquiler de Videojuegos. Cambié el negocio principal de venta/alquiler de juegos y consolas, al uso por horas de ordenadores y maquinas de juegos. Trataba con el público, tenia responsabilidades, dinero y videojuegos. No sé que más pedirle a un trabajo. ',
        'experience_3_key_1'    => 'Evaluación de costes y beneficios',
        'experience_3_key_2'    => 'Trato con distribuidores de hardware, material de oficina y videojuegos',
        'experience_3_key_3'    => 'Venta de Sistemas al por menor',
        'experience_3_key_4'    => 'Gestión del negocio: gestoras, bancos, seguridad social, contratos...',
        'experience_3_key_5'    => 'Autónomo',
        'experience_3_key_6'    => 'Tuve un empleado por periodo de 5 meses',
        'experience_4_company'  => 'Otros',
        'experience_4_date'     => '2010 ~ 2011',
        'experience_4_position' => 'PROFESOR, TÉCNICO DE SISTEMAS...',
        'experience_4_body_1'   => 'No me gusta aburrirme',
        'experience_4_body_2'   => 'A lo largo de los años he tenido varios trabajos poco relevantes o de corta duración. Aunque ha sido lo habitual, no siempre he desempeñando funciones técnicas. Entre lo que he echo de lo que más me ha gustado ha sido ser profesor: No solo disfruto enseñando sino que mis alumnos me han alabado en más de una ocasión. ',
        'experience_4_key_1'    => 'Profesor Privado',
        'experience_4_key_2'    => 'Profesor en Centro Ciencias Información S.L.',
        'experience_4_key_3'    => 'Técnico de IT en Soporte Informático Valdelasfuentes S.L.',
        'experience_4_key_4'    => 'Camarero en cafeteria de estación',
        'experience_4_key_5'    => 'Dependiente en sección de frescos en Carrefour',
        'experience_4_key_6'    => 'Ayudante de cocina',
        'description_header'    => 'Sobre mi',
        'description_body_1'    => 'Tengo aptitudes que me hacen buen informático y/o programador.',
        'description_body_2'    => '',
        'description_body_3'    => 'Soy inteligente, paciente, curioso, perseverante y perfeccionista.',
        'description_body_4'    => 'Tengo atención por el detalle y aversión al fracaso.',
        'description_body_5'    => 'Disfruto cuando me enfrento a nuevos retos.',
        'description_body_6'    => 'No me gusta pedir o necesitar a otras personas, aunque me encanta que me ayuden si dan cuenta de que me hace falta.',
        'description_body_7'    => 'Intento tratar a cada uno tal y como el trata a los demás',
        'interest_header'       => 'Intereses',
        'interest_01'           => 'Juegos de construcción',
        'interest_02'           => 'Videojuegos',
        'interest_03'           => 'Exploración Espacial',
        'interest_04'           => 'Ciencia ficción',
        'interest_05'           => 'Juegos Mesa',
        'interest_06'           => 'Cocina',
        'interest_07'           => '15 años de artes marciales',
        'interest_08'           => 'Esquí, submarinismo',
        'portfolio_header'      => 'Portfolio',
        'footer_legal'          => 'La información en este documento solo podrá ser utilizada con fines de candidatura.',
    );

    function l ($lookup)
    {
        global $lang;
        global $lang_es;
        global $lang_en;
        echo ($lang == 'es' ? $lang_es[$lookup] : $lang_en[$lookup]) ;
    }

    function country_code()
    {
        global $lang;
        echo ($lang == 'es' ? 'en' : 'es');
    }

    function country_flag()
    {
        global $lang;
        echo ($lang == 'es' ? 'uk' : 'spain');
    }
?>
<div class="color_wrapper"></div>
<!-- Start of header wrapper -->
<div id="header_wrapper">
    <!-- Start of header -->
        <!-- Language override -->
    <div id="flag">
    <a href="../cv/index.php?language=<? country_code() ?>">
        <img src="img/flag_<? country_flag() ?>_small.png" class="country" height="20" alt="country" />
    </a>
    </div>

    <div class="header">
        <div id="top_logo">
            <h1>Carlos Mestre</h1>
        </div>

        <!-- Start of top download -->
        <div id="top_download">
            <a class="pdfdownload" href="http://masterfactories.com/cv/data/cmestre_cv_<? echo ($lang == 'es' ? 'es' : 'en'); ?>.pdf" target="_blank">
                <? l('download'); ?>
            </a>
        </div>
        <div id="qr_code">
            <a href="http://masterfactories.com">http://masterfactories.com/cv</a>
        </div>

        <!-- Description -->
        <div class="about_one_half_first">
            <a href="img/photo.png"><img src="img/photo_s.png" class="about_me_img" height="192" alt="me" /></a>
            <h4><? l('about_header') ?></h4>
            <p><? l('about_1') ?></p>
            <p><? l('about_2') ?></p>
            <p><? l('about_3') ?></p>
            <p><? l('about_4') ?></p>
            <p><span class="signature"><? l('about_footer') ?></span></p>
        </div>
        <!-- Contact data -->
        <div class="about_one_half">
            <div class="one_half_first">
                <div class="contact_me_phone">
                    <a href="tel:004915257086784">
                        <? l('contact_phone') ?>
                    </a>
                </div>
            </div>
            <div class="one_half">
                <div class="contact_me_site">
                    <a href="http://www.masterfactories.com/cv/">
                    <? l('contact_web') ?>
                </a>
                </div>
            </div>
            <div class="one_half_first">
                <div class="contact_me_location">
                    <a href="https://goo.gl/maps/BjecV" target="_blank">
                    <? l('contact_geogr') ?>
                </a>
                </div>
            </div>
            <div class="one_half">
                <div class="contact_me_email">
                    <a href="mailto:carmesce@gmail.com">
                    <? l('contact_email') ?>
                </a>
                </div>
            </div>

        </div>
    </div><!-- Eof header -->
    <div class="clear"></div>
</div><!-- Eof header wrapper -->

<!-- Start of wrapper -->
<div class="wrapper">
    <div class="full_width">
        <div class="one_half_first">
            <h6><span class="styled_heading"><? l('skills_header') ?></span></h6>
            <div class="content">
                <div class="col">
                    <ul id="skill">
                        <li><span class="expand systems"></span><em><? l('skills_01') ?></em></li>
                        <li><span class="expand php"></span><em><? l('skills_02') ?></em></li>
                        <li><span class="expand cpp"></span><em><? l('skills_03') ?></em></li>
                        <li><span class="expand xcode"></span><em><? l('skills_04') ?></em></li>
                        <li><span class="expand bash"></span><em><? l('skills_05') ?></em></li>
                        <li><span class="expand javascript"></span><em><? l('skills_06') ?></em></li>
                        <li><span class="expand mysql"></span><em><? l('skills_06') ?></em></li>
                        <li><span class="expand html"></span><em><? l('skills_08') ?></em></li>
                        <li><span class="expand css"></span><em><? l('skills_09') ?></em></li>
                        <li><span class="expand git"></span><em><? l('skills_10') ?></em></li>
                        <li><span class="expand appt"></span><em><? l('skills_11') ?></em></li>
                        <li><span class="expand java"></span><em><? l('skills_12') ?></em></li>
                        <li><span class="expand os"></span><em><? l('skills_13') ?></em></li>
                        <li><span class="expand elec"></span><em><? l('skills_14') ?></em></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="one_half">
            <h6><span class="styled_heading"><? l('education_header') ?></span></h6>
            <ul class="education">
                <li class="upv">
                    <span class="small_heading">
                        <a href="http://www.upv.es/" target="_blank">
                            <? l('education_1_header') ?>
                        </a>
                    </span>
                    <div class="lgt_block"><? l('education_1_date') ?></div>
                    <div class="drk_block"><? l('education_1_subject') ?></div>
                    <div class="content2">
                        <p><? l('education_1_body_1') ?></p>
                        <p><? l('education_1_body_2') ?></p>
                    </div>
                </li>
                <li class="ait">
                    <span class="small_heading">
                        <a href="http://www.ait.ie/" target="_blank">
                            <? l('education_2_header') ?>
                        </a>
                    </span>
                    <div class="lgt_block"><? l('education_2_date') ?></div>
                    <div class="drk_block"><? l('education_2_subject') ?></div>
                    <div class="content2">
                        <p><? l('education_2_body_1') ?></p>
                        <p><? l('education_2_body_2') ?></p>
                    </div>
                </li>
            </ul>
            <div>
                <h6><span class="styled_heading"><? l('languages_header') ?></span></h6>
                <ul class="square">
                    <li><? l('languages_1') ?></li>
                    <li><? l('languages_2') ?></li>
                    <li><? l('languages_3') ?></li>
                    <li><? l('languages_4') ?></li>
                    <li><? l('languages_5') ?></li>
                    <li><? l('languages_6') ?></li>
                </ul>
            </div>

        </div>
        </div>
        <div class="clear"></div>
        <div class="full_width page_break">
            <h6><span class="styled_heading"><? l('experience_header') ?></span></h6>
            <div class="one_half_first">
                <ul class="none">
                    <li>
                        <span class="small_heading"><? l('experience_1_company') ?></span>
                        <div class="lgt_block"><? l('experience_1_date') ?></div>
                        <div class="drk_block"><? l('experience_1_position') ?></div>
                        <div class="content2">
                            <p><? l('experience_1_body_1') ?></p>
                            <p><? l('experience_1_body_2') ?></p>
                            <p><? l('experience_1_body_3') ?></p>
                            <ul class="square">
                                <li><? l('experience_1_key_1') ?></li>
                                <li><? l('experience_1_key_2') ?></li>
                                <li><? l('experience_1_key_3') ?></li>
                                <li><? l('experience_1_key_4') ?></li>
                                <li><? l('experience_1_key_5') ?></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="one_half">
                <ul class="none">
                    <li>
                        <span class="small_heading"><? l('experience_2_company') ?></span>
                        <div class="lgt_block"><? l('experience_2_date') ?></div>
                        <div class="drk_block"><? l('experience_2_position') ?></div>
                        <div class="content2">
                            <p><? l('experience_2_body_1') ?></p>
                            <p><? l('experience_2_body_2') ?></p>
                            <p><? l('experience_2_body_3') ?></p>
                            <p><? l('experience_2_body_4') ?></p>
                            <ul class="square">
                                <li><a href="http://despachosvalencia.com"><? l('experience_2_key_1') ?></a></li>
                                <li><a href="http://vsarobe.com.com"><? l('experience_2_key_2') ?></a></li>
                                <li><a href="http://streamingdjs.com"><? l('experience_2_key_3') ?></a></li>
                                <li><a href="data/DOCUMENTO%20DE%20PRESENTACI&Oacute;N.pdf"><? l('experience_2_key_4') ?></a></li>
                                <li><? l('experience_2_key_5') ?></li>
                                <li><? l('experience_2_key_6') ?> </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>

            <div class="one_half_first">
                <ul class="none">
                    <li>
                        <span class="small_heading"><? l('experience_3_company') ?></span>
                        <div class="lgt_block"><? l('experience_3_date') ?></div>
                        <div class="drk_block"><? l('experience_3_position') ?></div>
                        <div class="content2">
                            <p><? l('experience_3_body_1') ?></p>
                            <p><? l('experience_3_body_2') ?></p>
                            <ul class="square">
                                <li><? l('experience_3_key_1') ?></li>
                                <li><? l('experience_3_key_2') ?></li>
                                <li><? l('experience_3_key_3') ?></li>
                                <li><? l('experience_3_key_4') ?></li>
                                <li><? l('experience_3_key_5') ?></li>
                                <li><? l('experience_3_key_6') ?></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="one_half">
                <ul class="none">
                    <li>
                        <span class="small_heading"><? l('experience_4_company') ?></span>
                        <div class="lgt_block"><? l('experience_4_date') ?></div>
                        <div class="drk_block"><? l('experience_4_position') ?></div>
                        <div class="content2">
                            <p><? l('experience_4_body_1') ?></p>
                            <p><? l('experience_4_body_2') ?></p>
                            <ul class="square">
                                <li><? l('experience_4_key_1') ?></li>
                                <li><? l('experience_4_key_2') ?></li>
                                <li><? l('experience_4_key_3') ?></li>
                                <li><? l('experience_4_key_4') ?></li>
                                <li><? l('experience_4_key_5') ?></li>
                                <li><? l('experience_4_key_6') ?> </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        <div class="clear"></div>
        <div class="full_width page_break_f">
            <h6 class="hidden"><span class="styled_heading">Employment Timeline</span></h6>
            <div class="hidden timeline">
                <!-- width=the length that will display - left=100 less width set ie 100-42=58 etc etc -->
                <ul class="events">
                    <li class="red" style="width: 40%; left: 60%;">company_1</li>
                    <li class="dark" style="width: 35%; left: 25%;">company_2</li>
                    <li class="light" style="width: 25%; left: 0%;">company_3</li>
                </ul>

                <ul class="intervals">
                    <li class="first">2003</li>
                    <li>2007</li>
                    <li>2008</li>
                    <li>2009</li>
                    <li>2010</li>
                    <li>2011</li>
                    <li class="last">2012</li>
                </ul>
            </div>

            <div class="clear2"></div>
            <div class="one_half_first">
                <h6><span class="styled_heading"><? l('description_header') ?></span></h6>
                    <div class="content3">
                        <p>
                            <? l('description_body_1') ?><br>
                            <? l('description_body_2') ?><br>
                            <? l('description_body_3') ?><br>
                            <? l('description_body_4') ?><br>
                            <? l('description_body_5') ?><br>
                            <? l('description_body_6') ?><br>
                            <? l('description_body_7') ?>
                        </p>
                    </div>
            </div>

            <div class="one_half">

                <h6><span class="styled_heading"><? l('interest_header') ?></span></h6>
                <ul class="square">
                    <li><? l('interest_01') ?></li>
                    <li><? l('interest_02') ?></li>
                    <li><? l('interest_03') ?></li>
                    <li><? l('interest_04') ?></li>
                    <li><? l('interest_05') ?></li>
                    <li><? l('interest_06') ?></li>
                    <li><? l('interest_07') ?></li>
                    <li><? l('interest_08') ?></li>
                </ul>
            </div>
        </div>
        <div class="clear"></div>

    <div class="full_width">
        <h6><span class="styled_heading">Portfolio</span></h6>
        <ul id="filter" class="hidden ">
            <li class="segment-1 selected-1 active">
                <a data-value="all" href="#">All</a><span class="sep"></span>
            </li>
            <li class="segment-39">
                <a data-value="term-39" href="#">Graphics</a><span class="border"></span><span class="sep"></span>
            </li>
            <li class="segment-38">
                <a data-value="term-38" href="#">Image</a><span class="border"></span><span class="sep"></span>
            </li>
            <li class="segment-37">
                <a data-value="term-37" href="#">Print</a><span class="border"></span><span class="sep"></span>
            </li>
            <li class="segment-36">
                <a data-value="term-36" href="#">Web</a><span class="border"></span><span class="sep"></span>
            </li>
        </ul>

        <div id="portfolio-bg" class="clearfix">
            <ul class="image-grid grid clearfix">
                <li class="term-36" data-id="id-1">
                    <div>
                        <div class="post-thumb post-tumb-img clearfix ">
                            <a  href="http://despachosvalencia.com"
                                title="Despachos Valencia"
                                target="_blank"
                                class="prettyPhoto[portfolio]">
                                <img src="img/portfolio_despachos.png" alt="Despachos Valencia" width="295" height="174" />
                            </a>
                        </div>
                    </div>
                </li>
                <li class="term-36" data-id="id-2">
                    <div>
                        <div class="post-thumb post-tumb-img clearfix">
                            <a  href="http://streamingdjs.com"
                                title="streamingDJs"
                                target="_blank"
                                class="prettyPhoto[portfolio]">
                                <img src="img/portfolio_djs.png" alt="streamingDJs" width="295" height="174" />
                            </a>
                        </div>
                    </div>
                </li>
                <li class="term-36" data-id="id-3">
                    <div>
                        <div class="post-thumb post-tumb-img clearfix">
                            <a  href="http://vsarobe.com"
                                title="VSarobe"
                                target="_blank"
                                class="prettyPhoto[portfolio]">
                                <img src="img/portfolio_vsarobe.png" alt="VSarobe" width="295" height="174" />
                            </a>
                        </div>
                    </div>
                </li>
                <li class="term-38" data-id="id-4">
                    <div>
                        <div class="post-thumb post-tumb-img clearfix ">
                            <a  href="img/portfolio_code.png"
                                title="Codigo en SublimeText"
                                class="prettyPhoto[portfolio]">
                                <img src="img/portfolio_code_small.png" alt="Codigo en SublimeText" width="295" height="174" />
                            </a>
                        </div>
                    </div>
                </li>
                <li class="term-38" data-id="id-5">
                    <div>
                        <div class="post-thumb post-tumb-img clearfix ">
                            <a  href="data/DOCUMENTO%20DE%20PRESENTACI&Oacute;N.pdf"
                                title="Conecta un Sue&ntilde;o"
                                target="_blank"
                                class="prettyPhoto[portfolio]">
                                <img src="img/portfolio_cus.png" alt="Conecta un Sue&ntilde;o" width="295" height="174" />
                            </a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <div class="clear2"></div>

    <!-- ****** CONTACT FORM AND TWITTER TIMELINE DISABLED (class d) ********-->
    <div class="hidden full_width">
        <div class="one_half_first">
        <h6><span class="styled_heading">Contact</span></h6>
        <form action="mailer.php" id="contact_form" method="post">
            <ul class="form">
                <li class="short">
                    <label>First Name<span class="required"></span></label>
                    <input
                        type="text"
                        name="first"
                        id="first"
                        value="First Name"
                        class="requiredField"
                        onblur="if(this.value == '') { this.value = 'First Name'; }"
                        onfocus="if(this.value == 'First Name') { this.value = ''; }"
                    />
                </li>
                <li class="short">
                    <label>Last Name<span class="required"></span></label>
                    <input
                        type="text"
                        name="last"
                        id="last"
                        value="Last Name"
                        class="requiredField"
                        onblur="if(this.value == '') { this.value = 'Last Name'; }"
                        onfocus="if(this.value == 'Last Name') { this.value = ''; }"
                    />
                </li>
                <li class="long">
                    <label>Email Address<span class="required"></span></label>
                    <input
                        type="text"
                        name="email"
                        id="email"
                        value="Email Address"
                        class="requiredField email"
                        onblur="if(this.value == '') { this.value = 'Email Address'; }"
                        onfocus="if(this.value == 'Email Address') { this.value = ''; }"
                    />
                </li>
                <li class="short">
                    <label>Company Name</label>
                    <input
                        type="text"
                        name="company"
                        id="company"
                        value="Company Name"
                        class="requiredField"
                        onblur="if(this.value == '') { this.value = 'Company Name'; }"
                        onfocus="if(this.value == 'Company Name') { this.value = ''; }"
                        />
                </li>
                <li class="short">
                    <label>Telephone Number</label>
                    <input
                        type="text"
                        name="phone"
                        id="phone"
                        value="Telephone Number"
                        class="requiredField"
                        onblur="if(this.value == '') { this.value = 'Telephone Number'; }"
                        onfocus="if(this.value == 'Telephone Number') { this.value = ''; }"
                    />
                </li>
                <li class="textarea">
                    <label>Message<span class="required"></span></label>
                    <textarea name="message" id="message" rows="20" cols="30"></textarea>
                </li>
                <li class="button">
                    <input
                        name="submitted"
                        id="submitted"
                        value="Submit"
                        class="submit"
                        type="submit"
                    />
                </li>
            </ul>
            </form>
        </div>
        <div class="one_half">
        <h6><span class="styled_heading">On The Web</span></h6>
            <div class="twitter_message_content">
                <div class="tweet">
                </div>
            </div>
        </div>
    </div>
</div>
<div class="clear2"></div>
    <div id="footer_wrapper">
        <div class="footer">
            <div class="copyright">
                <? l('footer_legal') ?>
            </div>
            <div class="social_section">
                <div class="hidden facebook">
                    <a href="http://facebook.com" target="_blank"></a>
                </div>
                <div class="hidden flickr">
                    <a href="http://flickr.com" target="_blank"></a>
                </div>
                <div class="linkedin">
                    <a href="http://de.linkedin.com/in/carlosmestre/es" target="_blank"></a>
                </div>
                <div class="tweets">
                    <a href="https://twitter.com/CARMESCE" target="_blank"></a>
                </div>
                <div class="hidden deviant">
                    <a href="http://www.deviantart.com/" target="_blank"></a>
                </div>
                <div class="hidden dribbble">
                    <a href="http://dribbble.com/" target="_blank"></a>
                </div>
            </div>
        </div>
    </div>
<div class="color_wrapper"/>

<!-- PRETTYPHOTO CODE -->
<script type="text/javascript">
    $(document).ready(function()
    {
        $("a[class^='prettyPhoto']").prettyPhoto({showTitle: true});
        $("a[class^='prettyPhoto']").prettyPhoto({social_tools:false});
    });
</script>



</body>
</html>
