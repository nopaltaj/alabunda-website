<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>AlaBunda</title>
    <link rel="icon" href="{{ URL::asset('frontend/assets/Logo_svg.svg') }}">
    <link rel="stylesheet" href="{{ URL::asset('frontend/css/landing.css') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
        rel="stylesheet" />
</head>

<body>
    <div class="kacang">
        <img src=" {{ URL::asset('frontend/assets/Yellow_Material_Cashew_Nuts_PNG_Images___Yellow_Dried_Material__Dried_Fruit__Cashew_PNG_Transparent_Background_-_Pngtree-removebg-preview 1.png') }} "
            alt="" width="299" />
    </div>
    <nav>
        <div class="topnav" style="display: flex; justify-content: center; align-items: center">
            <a class="animasi-navbar" href="#category">KATEGORI</a>
            <a class="animasi-navbar" href="#menu">MENU</a>
            <a class="animasi-navbar" href="#order">ORDER</a>
            <a href="#"><img class="logo-atas" src="{{ URL::asset('frontend/assets/Logo_svg.svg') }}"
                    alt="" width="80.361px" style="margin: 0 auto" /></a>
            <a class="animasi-navbar" href="#testimoni">TESTIMONI</a>
            <a class="animasi-navbar" href="#about">TENTANG</a>
            <a class="animasi-navbar" href="{{ route('login') }}">LOGIN</a>
        </div>
        <div class="hamburger">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>
    </nav>

    <div class="header">
        <div class="texthead">
            <h2 id="welcome" class="Welcome">WELCOME</h2>
            <h1 class="title_welcome">
                <span class="title_biru">AlaBunda</span>
                Produk Makanan Pilihan!
            </h1>
            <h3 class="deskripsi" style="text-align: justify">
                Alabunda merupakan produk makanan yang dibuat secara homade, dengan bahan alami dan tanpa bahan
                pengawet. Ada berbagai makanan dengan racikan bumbu khas alabunda, seperti; nasi bumbu kebuli/briyani,
                dengan bumbu khas alabunda, pempek dengan cukonya yang khas alabunda, Kue kering yang lezat(nastar
                karakter, dibuat dengan selai homemade dan dengan berbagai bentuk karakter yang lucu &unik) dan lain
                lain.
            </h3>
            <div class="btnhead">
                <a href="#order" class="ordrbtn">Order Now</a>
                <a href="#menu" class="servicebtn">Our Menu</a>
            </div>
        </div>
        <div class="imghead">
            <img src="{{ URL::asset('frontend/assets/bread_1.png') }}" alt="" height="100%" />
        </div>
    </div>
    <div class="shopcategory">
        <div class="imgcategory">
            <img src="{{ URL::asset('frontend/assets/bread_2.png') }}" alt="" width="400" />
        </div>
        <div class="txtshopcategory">
            <h2 class="txt-menu">MENU</h2>
            <h1 id="category" class="title-menu">KATEGORI</h1>
            <h3 class="deskripsi-menu">
                Kami menyediakan berbagai menu makanan yang lezat dan sehat, dengan
                bahan-bahan alami dan tanpa bahan pengawet. Ada berbagai makanan
                dengan racikan bumbu khas alabunda, seperti; nasi bumbu
                kebuli/briyani, pempek dengan cuko khas alabunda, kue kering yang
                lezat, nastar karakter, dibuat dengan selai homemade dan dengan
                berbagai bentuk karakter yang lucu, unik dan lain lain.
            </h3>
        </div>
    </div>
    <div class="card-category">

        @forelse ($category as $row)
            <div class="card">
                <img src="{{ $row->image }}" alt="Avatar" class="img-card">
                <div class="container-card">
                    <h4 class="title-card"><b>{{ $row->name }}</b></h4>
                    <p class="desc-card">{{ strip_tags($row->description) }}</p>
                </div>
            </div>
        @empty
            <p>data kosong</p>
        @endforelse

    </div>



    <div class="menu-container">
        <div id="menu" class="menu-text">
            <h2 class="txt-menu">MENU</h2>
            <h1 class="title-menu">Order & Choose What You Like</h1>
            <h3 class="deskripsi-menu-bwh">
                Pesan dan pilih apa yang kamu suka dari menu-menu terbaik pilihan kami!
            </h3>
        </div>
        <div class="topnav nav-cat" style="display: flex; justify-content: center; align-items: center; margin-top:0;"
            id="myBtnContainer">
            <button class="nav-category" onclick="filterSelection('all')">Show All</button>
            @foreach ($category as $row)
                <button class="nav-category"
                    onclick="filterSelection('{{ $row->id }}')">{{ $row->name }}</button>
            @endforeach
        </div>


        <div class="card-category">
            @forelse ($product as $row)
                <div class="card-menu filterDiv {{ $row->category_id }}">
                    <img src="{{ asset('storage/products/' . $row->gambar) }}" alt="{{ $row->category_id }}"
                        class="image-menu">
                    <div class="container-card">
                        <h4 class="title-card-menu"><b>{{ $row->name }}</b></h4>
                        <h5 class="price-card">Rp {{ number_format($row->price) }}</h5>
                        <p class="desc-card-menu">{{ strip_tags($row->description) }}</p>
                    </div>
                </div>
            @empty
                <p>produk ini sedang kosong</p>
            @endforelse
        </div>
    </div>

    <div id="order" class="call-action"
        style="background-image: url('{{ URL::asset('frontend/assets/call_to_action.png') }}')">
        <h1 class="call-action-text">Chat to Order</h1>
        <a href="https://api.whatsapp.com/send?phone=6281927637306&text=Hello, Saya ingin memesan"
            class="call-action-btn" target="blank">CHAT</a>
    </div>
    <div id="testimoni" class="testimoni">
        <div class="testimoni-box">
            <h2 class="txt-menu">TESTIMONIALS</h2>
            <h1 class="title-testimony">What Our Customer Say</h1>
            <div class="carousel-container" id="carousel-container">
                <div class="deskripsi-bawah">
                    <div class="deskirpsi-orang">
                        <div class="deskirpsi-kata-orang">
                            <div class="nama-orang">Pusporini</div>
                            <div class="rating-orang">Sueneeengnyaa..</div>
                            <div class="komentar-orang">
                                Aku termasuk yang bahagia karena selalu merasakan bahagia kelezatannya😋🥰. Terima
                                Kasih
                            </div>
                        </div>
                    </div>
                </div>
                <div class="deskripsi-bawah">
                    <div class="deskirpsi-orang">
                        <div class="deskirpsi-kata-orang">
                            <div class="nama-orang">Rima</div>
                            <div class="rating-orang">Enaaaaak Bgtt</div>
                            <div class="komentar-orang">
                                Pempeknya empuk tidak keras, bumbunya kerasa banget tidak hambar. Cuko nya best
                                perpaduan asem gurih pedas, acar nya juga pas. Pokoknya enak banget mantep g kalah
                                sama
                                yang di Mall.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="deskripsi-bawah">
                    <div class="deskirpsi-orang">
                        <div class="deskirpsi-kata-orang">
                            <div class="nama-orang">Rizky</div>
                            <div class="rating-orang">Sangat Terpesona!</div>
                            <div class="komentar-orang">
                                Kata adik kemarin dapat pujian yang bagus dari dosennya. Kata dosennya lucu banget
                                bentuk bentuknya... Alhamdulillah dosennya diberi 1 toples buat dibawa pulang, yang 3
                                dibagikan ke teman temannya untuk mencicipi🤗🙏
                            </div>
                        </div>
                    </div>
                </div>
                <div class="deskripsi-bawah">
                    <div class="deskirpsi-orang">
                        <div class="deskirpsi-kata-orang">
                            <div class="nama-orang">Indah</div>
                            <div class="rating-orang">Mantul...</div>
                            <div class="komentar-orang">
                                Enak Banget. Ini sampai ada yang nyoba nyicip tapi cuma ku bagi sedikit, Enak banget
                                soalnya😂😘
                            </div>
                        </div>
                    </div>
                </div>
                <div class="deskripsi-bawah">
                    <div class="deskirpsi-orang">
                        <div class="deskirpsi-kata-orang">
                            <div class="nama-orang">Pusporini</div>
                            <div class="rating-orang">Sueneeengnyaa..</div>
                            <div class="komentar-orang">
                                Aku termasuk yang bahagia karena selalu merasakan bahagia kelezatannya😋🥰. Terima
                                Kasih
                            </div>
                        </div>
                    </div>
                </div>
                <div class="deskripsi-bawah">
                    <div class="deskirpsi-orang">
                        <div class="deskirpsi-kata-orang">
                            <div class="nama-orang">Rima</div>
                            <div class="rating-orang">Enaaaaak Bgtt</div>
                            <div class="komentar-orang">
                                Pempeknya empuk tidak keras, bumbunya kerasa banget tidak hambar. Cuko nya best
                                perpaduan asem gurih pedas, acar nya juga pas. Pokoknya enak banget mantep g kalah
                                sama
                                yang di Mall.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="deskripsi-bawah">
                    <div class="deskirpsi-orang">
                        <div class="deskirpsi-kata-orang">
                            <div class="nama-orang">Rizky</div>
                            <div class="rating-orang">Sangat Terpesona!</div>
                            <div class="komentar-orang">
                                Kata adik kemarin dapat pujian yang bagus dari dosennya. Kata dosennya lucu banget
                                bentuk bentuknya... Alhamdulillah dosennya diberi 1 toples buat dibawa pulang, yang 3
                                dibagikan ke teman temannya untuk mencicipi🤗🙏
                            </div>
                        </div>
                    </div>
                </div>
                <div class="deskripsi-bawah">
                    <div class="deskirpsi-orang">
                        <div class="deskirpsi-kata-orang">
                            <div class="nama-orang">Indah</div>
                            <div class="rating-orang">Mantul...</div>
                            <div class="komentar-orang">
                                Enak Banget. Ini sampai ada yang nyoba nyicip tapi cuma ku bagi sedikit, Enak banget
                                soalnya😂😘
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div id="about" class="maps-container">
        <div class="maps-title">
            <div class="maps-title-kiri">
                <h2 class="txt-maps">HOURS & LOCATIONS</h2>
                <h1 class="title-maps">Come & Visit</h1>
            </div>
            <div class="maps-title-desc">
                <h3 class="deskripsi-maps">
                    "Datang dan Cek barangnya untuk kepastian barangnya!"
                </h3>
            </div>
        </div>
        <div class="maps-title">
            <div class="maps-bawah-kiri">
                <h1 class="maps-location">
                    <img src="{{ URL::asset('frontend/assets/maps_logo.svg') }}" alt="" width="15px"
                        class="ic-maps" /> Jl. Jobayan, RT.002/RW.001, Menuran, Baki, Sukoharjo
                </h1>
                <h3 class="txt-time">
                    <img src="{{ URL::asset('frontend/assets/jam_logo.svg') }}" alt="" width="15px"
                        class="ic-time" /> Open : 08.30 AM
                </h3>
                <h3 class="txt-time">
                    <img src="{{ URL::asset('frontend/assets/jam_logo.svg') }}" alt="" width="15px"
                        class="ic-time" /> Close : 19.00 PM
                </h3>
            </div>
            <div class="maps-bawah-kanan"></div>
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3954.6124679749073!2d110.77649187596082!3d-7.617077392398278!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a3fcc60b79159%3A0xc93251de2147ada7!2sJobayan%2C%20Menuran%2C%20Baki!5e0!3m2!1sid!2sid!4v1709604242269!5m2!1sid!2sid"
                width="500" height="250" style="border: 0" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade" class="maps-gog"></iframe>
        </div>
    </div>
    </div>
    <script>
        filterSelection("all")

        function filterSelection(c) {
            var x, i;
            x = document.getElementsByClassName("filterDiv");
            if (c == "all") c = "";
            for (i = 0; i < x.length; i++) {
                w3RemoveClass(x[i], "show");
                if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
            }
        }

        function w3AddClass(element, name) {
            var i, arr1, arr2;
            arr1 = element.className.split(" ");
            arr2 = name.split(" ");
            for (i = 0; i < arr2.length; i++) {
                if (arr1.indexOf(arr2[i]) == -1) {
                    element.className += " " + arr2[i];
                }
            }
        }

        function w3RemoveClass(element, name) {
            var i, arr1, arr2;
            arr1 = element.className.split(" ");
            arr2 = name.split(" ");
            for (i = 0; i < arr2.length; i++) {
                while (arr1.indexOf(arr2[i]) > -1) {
                    arr1.splice(arr1.indexOf(arr2[i]), 1);
                }
            }
            element.className = arr1.join(" ");
        }

        // Add active class to the current button (highlight it)
        var btnContainer = document.getElementById("myBtnContainer");
        var btns = btnContainer.getElementsByClassName("nav-category");
        for (var i = 0; i < btns.length; i++) {
            btns[i].addEventListener("click", function() {
                var current = document.getElementsByClassName("active");
                current[0].className = current[0].className.replace(" active", "");
                this.className += " active";
            });
        }
    </script>
</body>
<footer>
    <div id="footer" class="footer">
        <div class="footer-layout">
            <img src="{{ URL::asset('frontend/assets/Logo_svg.svg') }}" alt="" width="100px">
            <div class="text-footer">
                <h3 class="footer-text">"Selalu menyediakan makanan berkualitas dan terjangkau untuk keluarga"</h3>
            </div>
            <hr class="garis">
            <div class="logo-footer">
                <a href="https://www.facebook.com/yunitadwi.prihatini/" class="logo-footer" target="blank">
                    <img src="{{ URL::asset('frontend/assets/facebook.svg') }}" alt="">
                </a>
                <a href="https://api.whatsapp.com/send?phone=6281927637306&text=Hello, Saya ingin memesan"
                    class="logo-footer">
                    <img src="{{ URL::asset('frontend/assets/whatssapp.svg') }}" alt="" target="blank">
                </a>
            </div>
        </div>
    </div>
    <div class="license">
        © 2024 UKES. All rights reserved.
    </div>
</footer>

<script src="{{ URL::asset('frontend/js/landing.js') }}"></script>




</html>
