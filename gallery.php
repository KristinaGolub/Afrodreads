<?php
    switch ($_GET["page"]) {
        case "afro-curls":
            $title = "Афрокудри и дредокудри";
            $text = "В основе обоих вариантов лежит одинаковое синтетическое волокно. Афрокудри можно заплести на каркас, создавая эффект своих естественных кудряшек (носится до 1-1,5 мес), либо можно вплести точечно, как это делается в варианте с дредокудрями (срок носки до 1,5-2 мес). Точечное плетение носится чуть дольше, а так же позволяет использовать материал повторно, в отличие от афрокудрей на каркасе. Точечный вариант вплетается на полувосьмерку и является абсолютно идентичным принципу работы с любыми другими де дредами, тк в основе кудряшки будет переплетаться дред.";
            $path = "afro-curls";
            break;
        case "back-of-the-head":
            $title = "Дреды и косы на затылок";
            $text = "Являются частичным плетением, так как в этом случае захватывается только затылочная часть головы. На затылок можно заплести как комплект де, так и классические афрокосы. Послужит отличным дополнением к любой повседневной причёске. Подходит для тех, кто хочет экспериментировать, но не готов к кардинальным переменам, либо не позволяет дресс код, ведь под волосами плетение можно полностью скрыть. ";
            $path = "back-of-the-head";
            break;
        case "braids":
            $title = "Брейды";
            $text = "Косы, которые плетутся прилегая к коже головы. Могут быть как с использованием дополнительного материала (канекалона), так и без. Имеют массу вариаций плетения и форм. Использование материала в причёске позволяет перекрывать свой цвет волос любым другим, а так же позволяет причёске носиться в разы дольше (до 2х недель).";
            $path = "braids";
            break;
        case "classic-braids":
            $title = "Классические точечные косы";
            $text = "Точечные косы с добавлением канекалона, плетутся непосредственно на клиенте от начала и до конца (это из основное отличие от де и се кос). Могут быть любой длины/цвета/толщины/количества. В плетении данной разновидности кос свой волос полностью укрывается материалом, за счёт чего полностью изолируется от всех агрессивных внешних воздействий (активные УФ лучи летом, морозный холодный ветер зимой).";
            $path = "classic-braids";
            break;
        case "de-dreadlocks":
            $title = "Де дреды/де(се косы)";
            $text = "Синтетические комплекты дредов и кос, которые можно вплести уже в готовом виде без вреда для волос. Носятся сроком до 2-х месяцев. Все комплекты изготавливаются индивидуально под заказ, можно выбрать любой цвет/длину/фактуру. Комплекты многоразовые и могут вплетаться повторно.";
            $path = "de-dreadlocks";
            break;
        case "extension-on-braids":
            $title = "Точечное наращивание на микрокосы";
            $text = "Наращивание на мелкие косички термоволокна, имитирующего натуральный волос. Можно реализовать как полноценное наращивание по всей голове в цвет своих волос, так и сделать один цветной ряд, разнообразив повседневную причёску яркими акцентами, не прибегая при этом к окрашиванию. От любого другого наращивания отличается своей бюджетностью, тк синтетика стоит в разы дешевле натуральных волос. Срок носки до 1,5 мес.";
            $path = "extension-on-braids";
            break;
        case "natural-dreadlocks":
            $title = "Натуральные дреды";
            $text = "Дреды из своих волос. Плетутся с помощью начёса и спутывания волос крючком, формируя из них однородную структуру. Могут носиться неограниченный период времени. Важно подплетать их по мере отрастания от корня, а так же поддерживать структуру по длине с помощью своевременных коррекций.";
            $path = "natural-dreadlocks";
            break;
        case "unweaving":
            $title = "Расплетение и уход";
            $text = "В целом в самостоятельном расплетении нет ничего сложного, однако есть ряд нюансов, которые нужно учесть, чтоб не навредить своим волосам. Для этого на первое расплетение мы рекомендуем обращаться к нам. Мы покажем, в какой последовательности осуществлять снятие комплекта, чтоб при повторном расплетении дома ты все сделал(а) правильно. После расплетения ты так же можешь помыть у нас голову со всеми необходимыми уходовыми средствами и даже освежить стрижку (для этого у нас есть отдельный специалист).";
            $path = "unweaving";
            break;
        case "weaving":
            $title = "Вплетение готовых комплектов";
            $text = "У нас ты можешь вплести не только любой комплект нашего производства, но и прийти со своим. Мы работаем как с точечным плетением, так и с каркасным (через брейды). На первое вплетение нового комплекта, заказанного в нашей студии, ты гарантированно получишь скидку -500₽.";
            $path = "weaving";
            break;
        default:
            http_response_code(404);
            exit();
    }
    $contentpath = "resources/images/gallery/$path";
    $dirs = scandir($contentpath)
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Afrodreads - <?= "$title"; ?></title>

    <link type="image/png" sizes="128x128" rel="icon" href="/resources/images/favicon-icon.png">

    <meta property="og:title" content="Afrodreads - дреды длинною в жизнь" />
    <meta property="og:url" content="http://afrodreads.com/" />
    <meta property="og:description" content="Привет, давай знакомиться. Мы команда Afrodreads!" />
    <meta property="og:image" content="/resources/images/cover_791x495.JPG" />
    <meta property="og:type" content="website" />

    <!-- Подключение стилей фреймворка Bootstrap -->
    <link rel="stylesheet" href="/resources/libs/bootstrap-5.0.2/css/bootstrap.min.css">

    <!-- Подключение анимационных стилей библиотеки Animate.style -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <!--Собственные стили-->
    <link rel="stylesheet" href="/resources/style.css">
    <!--Шрифты Roboto, Montserrat и Comfortaa-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@400;600;700&family=Montserrat:ital,wght@0,400;0,600;0,700;1,400;1,600&family=Roboto+Condensed:ital,wght@0,400;0,700;1,400&family=Roboto:ital,wght@0,400;0,500;0,700;1,500&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <!--Подключение библиотек Bootstrap-->
    <script src="/resources/libs/bootstrap-5.0.2/js/bootstrap.min.js"></script>


    <!--Подключение JS-библиотек-->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>

    <!--Подключение собственных скриптов-->
    <script src="/resources/script.js"></script>
    <script src="/resources/script-gallery.js"></script>
</head>

<body>
    
    <div class="wrapper">

        <div class="loader">
            <div class="loader-box">
                <div class="loader-visual-box">
                    <span class="loader-visual"></span>
                    <span class="loader-visual loader-visual-revers"></span>    
                </div>
                <span class="loader-text"></span>
            </div>
        </div>

        <div id="modal-window-original-photo" class="d-none modal-gallery-window-bg">

            <div class="close-gallery-box m-2 m-sm-3 m-lg-4">
                <a class="close" id="close-modal-window-original-photo">
                    <img class="img-fluid" src="/resources/images/markers/exit.svg" alt="Крестик">
                </a>
            </div>

            <div id="original-photo-box" class="original-photo-box"></div>
        </div>

        <header class="header py-3 py-md-0" id="header">
            <div class="container-xl">
                <div class="d-flex justify-content-between align-items-center">
                    <div data-collase-target="burger-menu" class="burger-menu-container" closed id="burger-menu-container">
                        <div class="header-burger-box">
                            <a id="burger-menu-button" data-collapse-for="burger-menu" class="header-burger d-flex d-md-none col-2">
                                <span></span>
                            </a>
                        </div>
                        <nav class="header-navigation d-md-flex" id="menu">
                            <a data-collapse-for="burger-menu"  class="mr-2 burger-menu-elem-js" href="/#main">Главная</a>
                            <a data-collapse-for="burger-menu"  class="mr-2 burger-menu-elem-js" href="/#services">Услуги</a>
                            <a data-collapse-for="burger-menu"  class="mr-2 burger-menu-elem-js" href="/#masters">Мастера</a>
                            <a data-collapse-for="burger-menu"  class="mr-2 burger-menu-elem-js" href="/#care">Уход</a>
                            <a data-collapse-for="burger-menu"  class="mr-2 burger-menu-elem-js" href="/#contacts">Контакты</a>
                        </nav>
                    </div>

                    <div class="logo-box d-none d-md-flex">
                        <a class="logo" href="/">
                            <span class="logo logo-small">
                                Afrodreads
                            </span>
                        </a>
                    </div>

                    <a class="header-phone d-flex mr-5" href="tel:+79917067186">
                        <span class="phone-icon-box d-flex flex-column align-items-center">
                            <img class="img-svg" src="/resources/images/social-networks/phone-img.svg" alt="Иконка телефона">
                        </span>
                        <span class="phone-link">7&nbsp(991)&nbsp706&nbsp71&nbsp86</span>
                    </a>

                    <div class="social-networks social-networks-white d-flex">

                        <a href="https://vk.com/afrodreadsmsk" target="_blank" class="header-network-icon network-icon d-flex flex-column align-items-center justify-content-center">
                            <div class="header-img-box-vk">
                                <img class="img-svg w-100 h-auto" src="/resources/images/social-networks/vk.svg" alt="Иконка Вконтакте">
                            </div>
                        </a>

                        <a href="https://t.me/afrodreadsmsk" target="_blank" class="header-network-icon network-icon d-flex flex-column align-items-center justify-content-center">
                            <div class="header-img-box-tg">
                                <img class="img-svg w-100 h-auto" src="/resources/images/social-networks/telegram.svg" alt="Иконка Телеграма">
                            </div>
                        </a>

                        <a href="https://wa.me/79917067186" target="_blank" class="header-network-icon network-icon d-flex flex-column align-items-center justify-content-center">
                            <div class="header-img-box-wa">
                                <img class="img-svg w-100 h-auto" src="/resources/images/social-networks/whatsapp.svg" alt="Иконка Вотсаппа">
                            </div>
                        </a>

                        <a href="https://instagram.com/afrodreads?igshid=YmMyMTA2M2Y=" target="_blank" class="header-network-icon network-icon d-flex flex-column align-items-center justify-content-center">
                            <div class="header-img-box-inst">
                                <img class="img-svg w-100 h-auto" src="./resources/images/social-networks/instagram.svg" alt="Иконка Инстаграмма">
                            </div>
                        </a>
                    </div>

                </div>
            </div>
        </header>

        <main class="content">
            
            <section class="gallery">
                <div class="container-xl py-3 py-md-5 px-1">
                    <div class="mt-1 mt-sm-2 mt-md-5">
                        <a href="index.html" class="go-back-main-link">&#171; на главную</a>
                    </div>

                    <h2 class="main-title py-md-5 py-3 pt-0 pt-md-3 m-0">Де дреды</h2>

                    <div class="gallery-description">

                    </div>

                    <div class="gallery-content px-0">

                            <?php foreach($dirs as $dir): ?>
                                <div>
                                    <a class="js-open-img-full" data-original-src="<?= "$contentpath\/$dir\/original.webp"; ?>">
                                        <img class="gallery-img" src="<?= "$contentpath\/$dir\/thumbnail.webp"; ?>" alt="">
                                    </a>
                                </div>
                            <?php endforeach; ?>
                         
                    </div>

                </div>
            </section>



        </main>



        <footer class="footer py-3 py-md-5">
            <div class="container-xl">
                <div class="footer-content d-flex row  justify-content-between">
                    <div class="footer-contacts text-center text-md-start col-12 col-md-4 row justify-content-between flex-column">
                        <div class="social-networks social-networks-white mb-2 d-flex justify-content-center justify-content-md-start">

                            <a href="https://vk.com/afrodreadsmsk" target="_blank" class="footer-network-icon network-icon d-flex flex-column align-items-center justify-content-center">
                                <div class="footer-img-box-vk">
                                    <img class="img-svg w-100 h-auto" src="/resources/images/social-networks/vk.svg" alt="Иконка Вконтакте">
                                </div>
                            </a>
                            <a href="https://t.me/afrodreadsmsk" target="_blank" class="footer-network-icon network-icon d-flex flex-column align-items-center justify-content-center">
                                <div class="footer-img-box-tg">
                                    <img class="img-svg w-100 h-auto" src="/resources/images/social-networks/telegram.svg" alt="Иконка Телеграма">
                                </div>
                            </a>
                            <a href="https://wa.me/79917067186" target="_blank" class="footer-network-icon network-icon d-flex flex-column align-items-center justify-content-center">
                                <div class="footer-img-box-wa">
                                    <img class="img-svg w-100 h-auto" src="/resources/images/social-networks/whatsapp.svg" alt="Иконка Вотсаппа">
                                </div>
                            </a>
                            <a href="https://instagram.com/afrodreads?igshid=YmMyMTA2M2Y=" target="_blank" class="footer-network-icon network-icon d-flex flex-column align-items-center justify-content-center">
                                <div class="footer-img-box-inst">
                                    <img class="img-svg w-100 h-auto" src="./resources/images/social-networks/instagram.svg" alt="Иконка Инстаграмма">
                                </div>
                            </a>
                        </div>

                        <div class="mb-2 d-flex justify-content-center justify-content-md-start">
                            <a class="footer-phone d-flex align-items-center " href="tel:+79917067186">
                                <span class="phone-icon-box phone-icon-box-footer d-flex flex-column justify-content-between align-items-center">
                                    <img class="img-fluid img-svg" src="/resources/images/social-networks/phone-img.svg" alt="Иконка телефона">
                                </span>
                                <span>7&nbsp(991)&nbsp706&nbsp71&nbsp86</span>
                            </a>

                        </div>

                        <div class="mb-2">
                            <a href="#contacts" class="footer-geolocation">
                                <div>г. Москва ул. Сущевский вал 43</div>
                            </a>
                        </div>
                    </div>

                    <div class="footer-logo text-center col-12 col-md-4 d-flex flex-column align-items-center justify-content-center">
                        <a href="/">
                            <span class="logo logo-small">
                                Afrodreads
                            </span>
                        </a>
                    </div>

                    <div class="footer-navigation d-none d-md-flex col-md-4  justify-content-between">
                        <div class="col-6 ">
                            <div class="d-flex flex-column align-items-center">
                                <a href="/#main" class="footer-section-link">Главная</a>
                            </div>
                            <div class="d-flex flex-column align-items-center">
                                <a href="/#services" class="footer-section-link">Услуги</a>
                            </div>
                            <div class="d-flex flex-column align-items-center">
                                <a href="/#masters" class="footer-section-link">Мастера</a>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex flex-column align-items-center">
                                <a href="/#care" class="footer-section-link">Уход</a>
                            </div>
                            <div class="d-flex flex-column align-items-center">
                                <a href="/#contacts" class="footer-section-link">Контакты</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </footer>


        <div class="fixed-links d-flex flex-column d-md-none  social-networks-white">
            <a href="https://wa.me/79917067186" target="_blank" class="network-icon-fixed-pink fixed-link fixed-whatsapp-link d-flex flex-column align-items-center justify-content-center ">
                <div class="fixed-img-box-wa">
                    <img class="img-svg w-100 h-auto" src="/resources/images/social-networks/whatsapp.svg" alt="Иконка Вотсаппа">
                </div> 
            </a>

            <a href="https://t.me/afrodreadsmsk" target="_blank" class="network-icon-fixed-pink fixed-link fixed-tg-link d-flex flex-column align-items-center justify-content-center">
                <div class="fixed-img-box-tg">
                    <img class="img-svg w-100 h-auto" src="/resources/images/social-networks/telegram.svg" alt="Иконка Телеграма">
                </div>
            </a>

            <a href="#header" class="network-icon-fixed-gray fixed-link fixed-up-link d-flex flex-column align-items-center justify-content-center">
                <div class="fixed-img-box-up">
                    <img class="img-svg w-100 h-auto" src="/resources/images/social-networks/fixed-up.svg" alt="Стрелочка вверх">
                </div> 
            </a>    
        </div>

    </div>
</body>
</html>