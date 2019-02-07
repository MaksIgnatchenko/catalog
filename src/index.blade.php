<!doctype html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Home page</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
    <link rel="stylesheet" href="css/public-style.css">
</head>
<body class="main-page">
    {{ print_r($errors->all()) }}
    @auth('visitor')
        @if(!Auth::guard('visitor')->user()->hasVerifiedEmail())
            {!! Form::hidden('userShouldVerifyEmail', null, ['id' => 'userShouldVerifyEmail']) !!}
        @endif
    @endauth
    <!-- Header -->
    <header class="header-main">
        <div class="container">
            <div class="header-mob">
                <div class="mob-logo">
                    <a href="">Site mobile logo</a>
                    <!--<span>Site mobile logo</span>-->
                </div>
                <div class="mob-btn">
                    <button class="mob-btn" id="js-mob-btn">
                        <span class="mob-btn__line"></span>
                    </button>
                </div>
            </div>
            <div class="header-content header-inner">
                <div class="h-logo">
                    <a href="#">Site logo</a>
                    <!--<span>Site logo</span>-->
                </div>

                <div class="h-content">
                    <div class="h-links">
                        <div class="h-lang">
                            <span id="js-lang">Languages</span>
                            <ul class="lang-list">
                                <li><a href="#" class="lang-active">English</a></li>
                                <li><a href="#">العربية</a></li>
                            </ul>
                        </div>
                        @guest('visitor')
                            <div class="h-log">
                                <a href="#" id="js-login">Login</a>
                            </div>
                        @endguest
                        @auth('visitor')
                            <div class="h-log">
                                <a href="{!! route('logout') !!}" id="js-logout"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                            </div>
                            <form id="logout-form" action="{{ route('visitorLogout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        @endauth
                        @guest('visitor')
                            <div class="h-account">
                                <a href="#" id="js-registration">Free Account</a>
                            </div>
                        @endguest
                        @auth('visitor')
                            <div class="h-account">
                                <a href="" id="js-registration">{{ $dto->getUserEmail() }}</a>
                            </div>
                        @endauth
                    </div>
                    <div class="h-btn-wr">
                        <button class="humburger">
                            <span class="humburger__line"></span>
                        </button>
                        <ul class="h-main-pages">
                            <li><a href="#">Search page</a></li>
                            <li><a href="#">Who we are</a></li>
                            <li><a href="#">Our vision</a></li>
                            <li><a href="#">Help</a></li>
                            <li><a href="#">Contact Us</a></li>
                        </ul>
                    </div>
                    <!-- This block uses for mobile -->
                    <div class="h-pages-wr">
                        <span class="h-pages-wr__title">Pages</span>
                        <ul>
                            <li><a href="#">Search page</a></li>
                            <li><a href="#">Who we are</a></li>
                            <li><a href="#">Our vision</a></li>
                            <li><a href="#">Help</a></li>
                            <li><a href="#">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
            </div><!-- /. end header content -->

        </div>
    </header><!-- /. end header -->

    <!-- Main block -->
    <div class="main-wrapper">
        <div class="main-content">
            <h1 class="m-title">Hospital Pages</h1>
            <form action="{{ route('result') }}" method="get" name="main-form" class="main-form">
                <div class="main-form__line">
                    <div class="main-form__selects">
                        <div class="main-form__piece">
                            <select id="country" name="country">
                                <option value="">Country</option>
                                @foreach($dto->getCountries() as $id => $name)
                                    <option value={{ $id }}>{{ $name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="main-form__piece">
                            <select id="city" name="city">
                                <option value="">City</option>
                            </select>
                        </div>

                        <div class="main-form__piece">
                            <select id="category" name="category">
                                <option value="">Category</option>
                                @foreach($dto->getCategories() as $id => $name)
                                    <option value={{ $id }}>{{ $name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="main-form__piece">
                            <select id="speciality" name="speciality">
                                <option value="">Speciality</option>
                            </select>
                        </div>

                        <div class="main-form__piece">
                            <select id="type" name="type">
                                <option value="">Type</option>
                            </select>
                        </div>
                    </div>
                    <div class="main-form__search">
                        <input type="search" name="main-search" id="search" placeholder="Search...">
                    </div>
                </div>
                <div class="main-form__sbm">
                    <button type="submit">Lets Go</button>
                </div>
            </form>
        </div>
    </div><!-- /. end main block -->

    <!-- Popup login -->
    <div class="popup-wr popup-wr--hide" id="js-login-popup">
        <button class="popup-btn-cl">Close</button>
        <div class="popup-inner">
            <form class="popup-form" action="{{ route('visitorLogin') }}" name="login" method="post" id="js-login-form">
                <div class="popup-form__line popup-form__line--center">
                    <p class="popup-form__title">Login</p>
                </div>
                <div class="popup-form__line">
                    <label for="l-email">Email</label>
                    <input id="l-email" type="email" name="email" placeholder="Email" required>
                </div>
                <div class="popup-form__line">
                    <label for="l-pass">Password</label>
                    <input id="l-pass" type="password" name="password" placeholder="Password" required>
                </div>
                <div class="popup-form__line">
                    <a href="#">Forgot password?</a>
                </div>
                <div class="popup-form__line popup-form__line--center">
                    <button class="popup-form__btn" type="submit" disabled>Login</button>
                </div>
            </form>
        </div>
    </div><!-- /. end popup login -->

    <!-- Popup registration -->
    <div class="popup-wr popup-wr--hide" id="js-reg-popup">
        <button class="popup-btn-cl">Close</button>
        <div class="popup-inner">
            <form class="popup-form" action="{{ route('visitorRegister') }}" name="login" method="post" id="js-pass-form">
                @csrf
                <div class="popup-form__line popup-form__line--center">
                    <p class="popup-form__title">Registration</p>
                </div>
                <div class="popup-form__line">
                    <label for="l-reg-name">Name</label>
                    <input id="l-reg-name" type="text" name="reg-name" placeholder="Name" required>
                </div>
                <div class="popup-form__line">
                    <label for="l-reg-email">Email</label>
                    <input id="l-reg-email" type="email" name="reg-email" placeholder="Email" required>
                </div>
                <div class="popup-form__line">
                    <label for="l-reg-pass">Password</label>
                    <input id="l-reg-pass" type="password" name="reg-pass" placeholder="Password" required>
                </div>
                <div class="popup-form__line">
                    <label for="l-reg-pass">Password confirmation</label>
                    <input id="l-reg-pass_confirmation" type="password" name="reg-pass_confirmation" placeholder="Password confirmation" required>
                </div>
                <div class="popup-form__line">
                    <input id="l-reg-agree" type="checkbox" name="reg-agree">
                    <label for="l-reg-agree">Approval of the terms and conditions and privacy policy then registration</label>
                </div>
                <div class="popup-form__line popup-form__line--center">
                    <button class="popup-form__btn" type="submit" disabled>Registration</button>
                </div>
            </form>
        </div>
    </div><!-- /. end popup registration -->

    <!-- Popup verify -->
    <div class="popup-wr popup-wr--hide" id="js-verify-popup">
        <div class="popup-inner">
            <div class="popup-form__line popup-form__line--center">
                <p class="popup-form__title">Before proceeding, please check your email for a verification link.</p>
                <button id="verifyPopupCloseBtn">Close</button>
            </div>
        </div>
    </div><!-- /. end popup login -->

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/all.js"></script>
</body>
</html>

<!--<html lang="en" dir="rtl">-->
<!--<head>-->
    <!--<meta charset="UTF-8">-->
    <!--<meta name="viewport"-->
          <!--content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">-->
    <!--<meta http-equiv="X-UA-Compatible" content="ie=edge">-->
    <!--<title>الصفحة الرئيسية</title>-->
    <!--<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">-->
    <!--<link rel="stylesheet" href="css/style.css">-->
<!--</head>-->
<!--<body class="main-page">-->
<!--&lt;!&ndash; Header &ndash;&gt;-->
<!--<header class="header-main">-->
    <!--<div class="container">-->
        <!--<div class="header-mob">-->
            <!--<div class="mob-logo">-->
                <!--<a href="">شعار الجوال للموقع</a>-->
                <!--&lt;!&ndash;<span>شعار الجوال للموقع</span>&ndash;&gt;-->
            <!--</div>-->
            <!--<div class="mob-btn">-->
                <!--<button class="mob-btn" id="js-mob-btn">-->
                    <!--<span class="mob-btn__line"></span>-->
                <!--</button>-->
            <!--</div>-->
        <!--</div>-->
        <!--<div class="header-content header-inner">-->
            <!--<div class="h-logo">-->
                <!--<a href="#">شعار الجوال للموقع</a>-->
                <!--&lt;!&ndash;<span>شعار الجوال للموقع</span>&ndash;&gt;-->
            <!--</div>-->

            <!--<div class="h-content">-->
                <!--<div class="h-links">-->
                    <!--<div class="h-lang">-->
                        <!--<span id="js-lang">اللغات</span>-->
                        <!--<ul class="lang-list">-->
                            <!--<li><a href="#">English</a></li>-->
                            <!--<li><a href="#" class="lang-active">العربية</a></li>-->
                        <!--</ul>-->
                    <!--</div>-->
                    <!--<div class="h-log">-->
                        <!--<a href="#" id="js-login">تسجيل الدخول</a>-->
                    <!--</div>-->
                    <!--<div class="h-account">-->
                        <!--<a href="#" id="js-registration">حساب مجاني</a>-->
                    <!--</div>-->
                <!--</div>-->
                <!--<div class="h-btn-wr">-->
                    <!--<button class="humburger">-->
                        <!--<span class="humburger__line"></span>-->
                    <!--</button>-->
                    <!--<ul class="h-main-pages">-->
                        <!--<li><a href="#">صفحة البحث</a></li>-->
                        <!--<li><a href="#">من نحن</a></li>-->
                        <!--<li><a href="#">رؤيتنا</a></li>-->
                        <!--<li><a href="#">مساعدة</a></li>-->
                        <!--<li><a href="#">اتصل بنا</a></li>-->
                    <!--</ul>-->
                <!--</div>-->
                <!--&lt;!&ndash; This block uses for mobile &ndash;&gt;-->
                <!--<div class="h-pages-wr">-->
                    <!--<span class="h-pages-wr__title">صفحات</span>-->
                    <!--<ul>-->
                        <!--<li><a href="#">صفحة البحث</a></li>-->
                        <!--<li><a href="#">من نحن</a></li>-->
                        <!--<li><a href="#">رؤيتنا</a></li>-->
                        <!--<li><a href="#">مساعدة</a></li>-->
                        <!--<li><a href="#">اتصل بنا</a></li>-->
                    <!--</ul>-->
                <!--</div>-->
            <!--</div>-->
        <!--</div>&lt;!&ndash; /. end header content &ndash;&gt;-->

    <!--</div>-->
<!--</header>&lt;!&ndash; /. end header &ndash;&gt;-->

<!--&lt;!&ndash; Main block &ndash;&gt;-->
<!--<div class="main-wrapper">-->
    <!--<div class="main-content">-->
        <!--<h1 class="m-title">صفحات المستشفيات</h1>-->
        <!--<form action="/" method="post" name="main-form" class="main-form">-->
            <!--<div class="main-form__line">-->
                <!--<div class="main-form__selects">-->
                    <!--<div class="main-form__piece">-->
                        <!--<select id="country" name="country">-->
                            <!--<option value="hide">الدولة</option>-->
                            <!--<option value="january">محـرّم‎</option>-->
                            <!--<option value="february">صفـر‎</option>-->
                            <!--<option value="march">ربـيع الأول</option>-->
                            <!--<option value="april">ربـيع الآخر</option>-->
                            <!--<option value="may">جمادى الأولى</option>-->
                            <!--<option value="june">جمادى الآخرة</option>-->
                            <!--<option value="july">رجب‎</option>-->
                            <!--<option value="august">شعـبان‎</option>-->
                            <!--<option value="september">رمضان‎</option>-->
                            <!--<option value="october">شوّال‎</option>-->
                            <!--<option value="november">ذو الـقـعـدة‎</option>-->
                            <!--<option value="december">ذو الحجة‎</option>-->
                        <!--</select>-->
                    <!--</div>-->

                    <!--<div class="main-form__piece">-->
                        <!--<select id="city" name="city">-->
                            <!--<option value="hide">المدينة</option>-->
                            <!--<option value="january">محـرّم‎</option>-->
                            <!--<option value="february">صفـر‎</option>-->
                            <!--<option value="march">ربـيع الأول</option>-->
                            <!--<option value="april">ربـيع الآخر</option>-->
                            <!--<option value="may">جمادى الأولى</option>-->
                            <!--<option value="june">جمادى الآخرة</option>-->
                            <!--<option value="july">رجب‎</option>-->
                            <!--<option value="august">شعـبان‎</option>-->
                            <!--<option value="september">رمضان‎</option>-->
                            <!--<option value="october">شوّال‎</option>-->
                            <!--<option value="november">ذو الـقـعـدة‎</option>-->
                            <!--<option value="december">ذو الحجة‎</option>-->
                        <!--</select>-->
                    <!--</div>-->

                    <!--<div class="main-form__piece">-->
                        <!--<select id="category" name="category">-->
                            <!--<option value="hide">الفئة</option>-->
                            <!--<option value="january">محـرّم‎</option>-->
                            <!--<option value="february">صفـر‎</option>-->
                            <!--<option value="march">ربـيع الأول</option>-->
                            <!--<option value="april">ربـيع الآخر</option>-->
                            <!--<option value="may">جمادى الأولى</option>-->
                            <!--<option value="june">جمادى الآخرة</option>-->
                            <!--<option value="july">رجب‎</option>-->
                            <!--<option value="august">شعـبان‎</option>-->
                            <!--<option value="september">رمضان‎</option>-->
                            <!--<option value="october">شوّال‎</option>-->
                            <!--<option value="november">ذو الـقـعـدة‎</option>-->
                            <!--<option value="december">ذو الحجة‎</option>-->
                        <!--</select>-->
                    <!--</div>-->

                    <!--<div class="main-form__piece">-->
                        <!--<select id="speciality" name="speciality">-->
                            <!--<option value="hide">التخصص</option>-->
                            <!--<option value="january">محـرّم‎</option>-->
                            <!--<option value="february">صفـر‎</option>-->
                            <!--<option value="march">ربـيع الأول</option>-->
                            <!--<option value="april">ربـيع الآخر</option>-->
                            <!--<option value="may">جمادى الأولى</option>-->
                            <!--<option value="june">جمادى الآخرة</option>-->
                            <!--<option value="july">رجب‎</option>-->
                            <!--<option value="august">شعـبان‎</option>-->
                            <!--<option value="september">رمضان‎</option>-->
                            <!--<option value="october">شوّال‎</option>-->
                            <!--<option value="november">ذو الـقـعـدة‎</option>-->
                            <!--<option value="december">ذو الحجة‎</option>-->
                        <!--</select>-->
                    <!--</div>-->

                    <!--<div class="main-form__piece">-->
                        <!--<select id="type" name="type">-->
                            <!--<option value="hide">النوع</option>-->
                            <!--<option value="january">محـرّم‎</option>-->
                            <!--<option value="february">صفـر‎</option>-->
                            <!--<option value="march">ربـيع الأول</option>-->
                            <!--<option value="april">ربـيع الآخر</option>-->
                            <!--<option value="may">جمادى الأولى</option>-->
                            <!--<option value="june">جمادى الآخرة</option>-->
                            <!--<option value="july">رجب‎</option>-->
                            <!--<option value="august">شعـبان‎</option>-->
                            <!--<option value="september">رمضان‎</option>-->
                            <!--<option value="october">شوّال‎</option>-->
                            <!--<option value="november">ذو الـقـعـدة‎</option>-->
                            <!--<option value="december">ذو الحجة‎</option>-->
                        <!--</select>-->
                    <!--</div>-->
                <!--</div>-->
                <!--<div class="main-form__search">-->
                    <!--<input type="search" name="main-search" id="search" placeholder="البحث بالكلمة">-->
                <!--</div>-->
            <!--</div>-->
            <!--<div class="main-form__sbm">-->
                <!--<button type="submit">ابحث</button>-->
            <!--</div>-->
        <!--</form>-->
    <!--</div>-->
<!--</div>&lt;!&ndash; /. end main block &ndash;&gt;-->

<!--&lt;!&ndash; Popup login &ndash;&gt;-->
<!--<div class="popup-wr popup-wr&#45;&#45;hide" id="js-login-popup">-->
    <!--<button class="popup-btn-cl">أغلق</button>-->
    <!--<div class="popup-inner">-->
        <!--<form class="popup-form" action="/" name="login" method="post" id="js-login-form">-->
            <!--<div class="popup-form__line popup-form__line&#45;&#45;center">-->
                <!--<p class="popup-form__title">تسجيل الدخول</p>-->
            <!--</div>-->
            <!--<div class="popup-form__line">-->
                <!--<label for="l-email">البريد الإلكتروني</label>-->
                <!--<input id="l-email" type="email" name="login-email" placeholder="البريد الإلكتروني" required>-->
            <!--</div>-->
            <!--<div class="popup-form__line">-->
                <!--<label for="l-pass">كلمه السر</label>-->
                <!--<input id="l-pass" type="password" name="login-pass" placeholder="كلمه السر" required>-->
            <!--</div>-->
            <!--<div class="popup-form__line">-->
                <!--<a href="#">هل نسيت كلمة المرور؟</a>-->
            <!--</div>-->
            <!--<div class="popup-form__line popup-form__line&#45;&#45;center">-->
                <!--<button class="popup-form__btn" type="submit" disabled>تسجيل الدخول</button>-->
            <!--</div>-->
        <!--</form>-->
    <!--</div>-->
<!--</div>&lt;!&ndash; /. end popup login &ndash;&gt;-->

<!--&lt;!&ndash; Popup registration &ndash;&gt;-->
<!--<div class="popup-wr popup-wr&#45;&#45;hide" id="js-reg-popup">-->
    <!--<button class="popup-btn-cl">أغلق</button>-->
    <!--<div class="popup-inner">-->
        <!--<form class="popup-form" action="/" name="login" method="post" id="js-pass-form">-->
            <!--<div class="popup-form__line popup-form__line&#45;&#45;center">-->
                <!--<p class="popup-form__title">التسجيل</p>-->
            <!--</div>-->
            <!--<div class="popup-form__line">-->
                <!--<label for="l-reg-name">اسم</label>-->
                <!--<input id="l-reg-name" type="text" name="reg-name" placeholder="اسم" required>-->
            <!--</div>-->
            <!--<div class="popup-form__line">-->
                <!--<label for="l-reg-email">البريد الإلكتروني</label>-->
                <!--<input id="l-reg-email" type="email" name="reg-email" placeholder="البريد الإلكتروني" required>-->
            <!--</div>-->
            <!--<div class="popup-form__line">-->
                <!--<label for="l-reg-pass">كلمه السر</label>-->
                <!--<input id="l-reg-pass" type="password" name="reg-pass" placeholder="كلمه السر" required>-->
            <!--</div>-->
            <!--<div class="popup-form__line">-->
                <!--<input id="l-reg-agree" type="checkbox" name="reg-agree">-->
                <!--<label for="l-reg-agree">الموافقة على الشروط والأحكام وسياسة الخصوصية ثم التسجيل</label>-->
            <!--</div>-->
            <!--<div class="popup-form__line popup-form__line&#45;&#45;center">-->
                <!--<button class="popup-form__btn" type="submit" disabled>التسجيل</button>-->
            <!--</div>-->
        <!--</form>-->
    <!--</div>-->
<!--</div>&lt;!&ndash; /. end popup registration &ndash;&gt;-->

<!--&lt;!&ndash; Scripts &ndash;&gt;-->
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->
<!--<script src="js/all.js"></script>-->
<!--</body>-->
<!--</html>-->
