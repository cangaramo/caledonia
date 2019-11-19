var current_page_news;
var current_page_media;
var map;

$( document ).ready(function() {

    // Count up
    $('.counter').counterUp({
        delay: 10,
        time: 2000,
    });

    //Slick
    $('.case_studies_slider').slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        arrows: true,
        speed: 500,
        autoplay: true,
        dots: false,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                  slidesToShow: 2,
                  slidesToScroll: 2,
                  dots: true,
                  arrows: false,
                }
              },
            {
              breakpoint: 768,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                dots: true,
                arrows: false,
              }
            }
        ]
    });

    /* Search */
    $( "#query-search" ).on('change keydown paste input', function(){
        s = $(this).val();
        LoadPosts(s);
    });

    $( ".open-search" ).click(function() {
        $(".search-box").slideDown( "slow", function() {
            $(".search-box .container").fadeIn("fast");
            $(".search-box .close-window").fadeIn("fast");
            $("#query-search").focus();
        });
    });

    $( ".close-search" ).click(function() {
        $(".search-box .close-window").fadeOut("fast");
        $(".search-box .container").fadeOut( "fast", function() {
            $(".search-box").slideUp("slow");
        });
    });

    /* Film */
    $( ".open-video" ).click(function() {

        var iframe = $('.grid .embed-container iframe');
        player = new Vimeo.Player(iframe);

        player.on('play', function() {
            console.log('played the video!');
        });

        player.play().then(function() {
            $( ".video-thumbnail" ).fadeOut("slow");
        }).catch(function(error) {
            console.log(error.name);
        });
        
    });

    

    /* Team */
    $( ".person" ).click(function() {

        //Hide if the windows is already open
        if ( $( ".info-person-container" ).is(':visible') ){
            $(".info-person-container").hide();
        }

        //Reset
        $(".info-person-container").css('top', 0);
        $(".info-person-container").css('left', '0');

        /* Add content */
        bio = $(this).data("bio");
        name = $(this).data("name");
        role = $(this).data("role");
        image = $(this).data("image");
        linkedin = $(this).data("linkedin");
        twitter = $(this).data("twitter");

        $(".info-person-container .bio").html(bio);
        $(".info-person-container h4").text(name);
        $(".info-person-container .role").text(role);
        $(".info-person-container .image").attr("src", image);
        $(".info-person-container .linkedin a").attr("href", linkedin);
        $(".info-person-container .twitter a").attr("href", twitter);

        //Hide or show social
        if (linkedin == "") {
            $(".info-person-container .linkedin").css("visibility", "hidden");
        }
        else {
            $(".info-person-container .linkedin").css("visibility", "visible");
        }

        if (twitter == ""){
            $(".info-person-container .twitter").css("visibility", "hidden");
        }
        else {
            $(".info-person-container .twitter").css("visibility", "visible");
        }

        /* Position */
    
        index = $('.person').index(this);

        //Move to the right or left
        if (index == 0 || index%3 == 0) {
            $(".info-person-container").css('left', '0');
            $(".info-person-container").css('right', 'auto');
        }
        else {
            $(".info-person-container").css('right', '0');
            $(".info-person-container").css('left', 'auto');
        }

        //Move up or down
        if ($(window).width() >= 992 ){
            columns = 3;
        }
        else if ($(window).width() >= 768 ){
            columns = 2;
        } 
        else {
            columns = 1;
        }

        if (index > (columns-1) ) {

            //Get row of item
            row = Math.floor(index / columns);
            
            //Last row, place box at the top
            total = $('.person').length - 1;
            last_row = Math.floor(total / columns);
            if (row == last_row) {
                row = row - 1;
            }

            pixels = row * 288;
            moveTo = pixels.toString() + 'px';

            $(".info-person-container").css('top', moveTo);
        }

        //Show
        $(".info-person-container").fadeIn("slow");
        
    });

    $( ".close-person" ).click(function() {
        $(".info-person-container").fadeOut();
    });


    /* Projects */
    $('body').on('click', '.project', function(){
    //$('body').on('touchstart click', '.project', function(){

        console.log("project cliked");

        parent = $(this).data("group");
        container = "#" + parent + " .info-project-container";
        project = "#" + parent + " .project";

        if (parent == "current-projects" || parent == "historical-projects") {

            console.log (parent);

            //Hide if the windows is already open
            if ( $(container).is(':visible') ){
                $(container).hide();
            }

            //Reset
            $(container).css('top', 0);
            $(container).css('left', '0');

            /* Add content */
            logo = $(this).data("logo");
            investment = $(this).data("investment");
            status = $(this).data("status");
            description = $(this).data("description");
            equity = $(this).data("equity");
            directors = $(this).data("directors");
            type_of_investment = $(this).data("type_of_investment");
            symbol = equity['symbol'];
            value = equity['value'];
            number = equity['number'];
            case_study = $(this).data("case_study");

            $(container).find(".image").attr("src", logo);
            $(container).find(".investment").text(investment);
            $(container).find(".status").text(status);
            $(container).find(".description").html(description);
            $(container).find(".symbol").text(symbol);
            $(container).find(".num").text(number);
            $(container).find(".value").text(value);
            $(container).find(".directors").html(directors);
            $(container).find(".type_of_investment").html(type_of_investment);
            $(container).find(".case_study").attr("href", case_study);

            /* Hide empty fields */
            if (investment == ""){
                $(container).find(".investment-box").css("display", "none");
            }
            else {
                $(container).find(".investment-box").css("display", "block");
            }

            if (description == ""){
                $(container).find(".description-box").css("display", "none");
            }
            else {
                $(container).find(".description-box").css("display", "block");
            }

            if (number == ""){
                $(container).find(".equity-box").css("display", "none");
            }
            else {
                $(container).find(".equity-box").css("display", "block");
            }

            if (directors == ""){
                $(container).find(".directors-box").css("display", "none");
            }
            else {
                $(container).find(".directors-box").css("display", "block");
            }

            if (type_of_investment == ""){
                $(container).find(".type_of_investment-box").css("display", "none");
            }
            else {
                $(container).find(".type_of_investment-box").css("display", "block");
            }

            if (case_study == ""){
                $(container).find(".case_study").css("display", "none");
            }
            else {
                $(container).find(".case_study").css("display", "inline");
            }


            /* Position */

            index = $(project).index(this);

            //Move to the right or left
            if (index == 0 || index%4 == 0) {
                $(container).css('left', '0');
                $(container).css('right', 'auto');
            }
            else {
                $(container).css('right', '0');
                $(container).css('left', 'auto');
            }

            //Move up or down
            if ($(window).width() >= 992 ){
                columns = 4;
            }
            else if ($(window).width() >= 768 ){
                columns = 2;
            } 
            else {
                columns = 1;
            }

            if (index > (columns-1) ) {

                //Get row of item
                row = Math.floor(index / columns);
                
                total = $(project).length - 1;

                //Current project
                if (parent == "current-projects") {

                    //Last row, place box at the top
                    last_row = Math.floor(total / columns);
                    if (row == last_row) {
                        row = row - 2;
                    }

                    //Second to last row, place box at the top
                    second_to_last_row = Math.floor(total / columns) - 1;
                    if ( row == second_to_last_row){
                        row = row - 1;
                    }

                }
                //Selected projects
                else {
                    last_row = Math.floor(total / columns);
                    if (row == last_row) {
                        row = row - 1;
                    }
                }

                pixels = row * 216;
                moveTo = pixels.toString() + 'px';

                $(container).css('top', moveTo);
            }


            //Show
            $(container).fadeIn("slow");
        }

    });

    $( ".close-project" ).click(function() {
        $(".info-project-container").fadeOut();
    });


    $( ".dropdown-status" ).change(function() {
        $(".info-project-container").fadeOut();
        status = $(this).val();
        LoadProjects(status);
    });


    /* CAROUSEL */
    

    // Pause carousel if arrows are clicked 
    $('body').on('click', '.carousel-control-prev-icon', function(){
        //Pause carousel
        $('#carouselExampleControls').carousel('pause');
    });

    $('body').on('click', '.carousel-control-next-icon', function(){
        //Pause carousel
        $('#carouselExampleControls').carousel('pause');
    });


    /* Open video  */
    $('body').on('click', '.open-modal-video', function(){

        //Pause carousel
        $('#carouselExampleControls').carousel('pause');
       
        vimeo_id = $(this).data("vimeo");
        file = $(this).data("file");

        if (vimeo_id) {
            $('#modalVideo').modal('show');
            path ="https://player.vimeo.com/video/" + vimeo_id + "?title=0&byline=0&portrait=0";
            $('#modalVideo iframe').attr("src", path);
        }

        else if (file) {
            $('#modalFileVideo').modal('show');
            $('#modalFileVideo source').attr("src", file);
            $('#modalFileVideo video')[0].load();
            $('#modalFileVideo video')[0].play();
        }
    });

    $('#modalVideo').on('hidden.bs.modal', function (e) {
        var $frame = $('#modalVideo iframe');
        var vidsrc = $frame.attr('src');
        $frame.attr('src',''); 
        $frame.attr('src', vidsrc); 
        
        //Play carousel
        $('#carouselExampleControls').carousel('cycle');
    });

    /* View historical investments */
    $( ".view-historical" ).click(function() {
        
        var display = $('#historical-projects').css('display');
        var url_up = "url(/wp-content/themes/caledoniaTheme/resources/arrow-down.svg)";
        var url_down = "url(/wp-content/themes/caledoniaTheme/resources/arrow-up.svg)";
        
        if (display === "block"){
            $(".view-historical").css("background-image", url_up);
        }
        else {
            $(".view-historical").css("background-image", url_down);
        }

        $('#historical-projects').slideToggle("slow");
    });


     /* News */

     //When loaded
     if ( $( ".news" ).length ) {
        
        //Get page from url
        var currentURL = (window.location.pathname);
        var num = currentURL.split("/")[3];
        current_page_news = parseInt(num);

        if (num == null){
            current_page_news = 1;
        }

        LoadNews(current_page_news);
    }

    $('body').on('click', '.prev-article', function(){

        current_page_news = current_page_news - 1;

        url = "/news-archive/page/" + current_page_news;
        window.location.href = url;
        current_page_news = parseInt(num);
        
        //LoadNews(current_page_news);
    });

    $('body').on('click', '.next-article', function(){

        current_page_news = current_page_news + 1;

        url = "/news-archive/page/" + current_page_news;
        window.location.href = url;
        
        //LoadNews(current_page_news);
    });


    /* Media */
    current_page_media = 1;
    LoadMedia(current_page_media);

    $('body').on('click', '.prev-media', function(){
        current_page_media = current_page_media - 1;
        LoadMedia(current_page_media);
    });

    $('body').on('click', '.next-media', function(){
        current_page_media = current_page_media + 1;
        LoadMedia(current_page_media);
    });


    /* Boxes clicked */
    $('body').on('click', '.linked-box', function(){
        link = $(this).data("link");
        video = $(this).data("video");
        modal = $(this).data("modal");

        //Redirect
        if (link) {
            window.location.href = link;
        }

        //Show video in grid
        if (video) {
            var iframe = $('.grid .embed-container iframe');
            player = new Vimeo.Player(iframe);
    
            player.on('play', function() {
                console.log('played the video!');
            });
    
            player.play().then(function() {
                $( ".video-thumbnail" ).fadeOut("slow");
            }).catch(function(error) {
                console.log(error.name);
            });
        }

        //Open video modal
        if (modal) {
            video =  $(this).find(".open-modal-video");
            vimeo_id = video.data("vimeo");
            file = video.data("file");
            console.log("file");

            //Vimeo
            if (vimeo_id) {
                $('#modalVideo').modal('show');
                path ="https://player.vimeo.com/video/" + vimeo_id + "?title=0&byline=0&portrait=0";
                $('#modalVideo iframe').attr("src", path);
            }

            //File
            else if (file) {
                $('#modalFileVideo').modal('show');
                $('#modalFileVideo source').attr("src", file);
                $('#modalFileVideo video')[0].load();
                $('#modalFileVideo video')[0].play();
            }
        }
        
    });

    $(document).on('mousedown', '.results-container .result', function(){
        link = $(this).data("link");
        window.location.href = link;
    }); 


});

window.addEventListener("scroll", function (event) {

    checkChartPosition();
});

/* Redirect open modal */
$(window).on('hashchange', function(e){
    url = window.location.href;
    if ( url.includes("team") ) {
        openModal();
    }
    else if ( url.includes("portfolio") ) {
        openModal();
    }
});

if (window.location.hash) {
    url = window.location.href;
    if ( url.includes("team") ) {
        openModal();
    }
    else if ( url.includes("portfolio") ) {
        openModal();
    }
}

function openModal(){
    var fragment = (window.location.hash).substring(1);
    LoadModal(fragment);
}


function LoadModal(id){

	var ajaxurl = $(".search-box").data("url");
    
    $.ajax({
        url: ajaxurl,
        type : 'post',
        data : {
            action : 'load_modal',
            id: id
        },
        beforeSend:function(xhr){

        },
        success:function(response){
            $('#postModal .content').html(response);
            $('#postModal').modal('show')
        }
    });
    return false;
}

function LoadPosts(keyword){

	var ajaxurl = $(".search-box").data("url");

    
    $.ajax({
        url: ajaxurl,
        type : 'post',
        data : {
            action : 'load_posts',
            keyword: keyword
        },
        beforeSend:function(xhr){

        },
        success:function(response){
			$('.results-container').html(response);
        }
    });
    return false;
}

function LoadProjects(status){

    var ajaxurl = $(".response-projects").data("url");

    $.ajax({
        url: ajaxurl,
        type : 'post',
        data : {
            action : 'load_projects',
            status: status       
        },
        beforeSend:function(xhr){

        },
        success:function(response){
			$('.response-projects').html(response);
        }
    });
    return false;

}


function LoadNews(current_page){

    var ajaxurl = $(".response-news").data("url");

    $.ajax({
        url: ajaxurl,
        type : 'post',
        data : {
            action : 'load_news',
            current_page: current_page       
        },
        beforeSend:function(xhr){

        },
        success:function(response){
			$('.response-news').html(response);
        }
    });
    return false;

}

function LoadMedia(current_page){

    console.log("load media");

    var ajaxurl = $(".response-media").data("url");

    $.ajax({
        url: ajaxurl,
        type : 'post',
        data : {
            action : 'load_media',
            current_page: current_page       
        },
        beforeSend:function(xhr){

        },
        success:function(response){
			$('.response-media').html(response);
        }
    });
    return false;

}


function initMap() {

    pathname = window.location.pathname;
    url = window.location.href;
    home_url = url.replace(pathname,"");
    icon_path = home_url + '/wp-content/themes/caledoniaTheme/resources/marker.png';

    var myLatLng = {lat: 51.499359, lng:-0.139071};

    map = new google.maps.Map(document.getElementById('map'), {
        center: myLatLng, 
        zoom: 16,
        zoomControl: true,
        streetViewControl: false,
        mapTypeControl: false,
        styles: [
        {
            "featureType": "water",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#e9e9e9"
                },
                {
                    "lightness": 17
                }
            ]
        },
        {
            "featureType": "landscape",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#f5f5f5"
                },
                {
                    "lightness": 20
                }
            ]
        },
        {
            "featureType": "road.highway",
            "elementType": "geometry.fill",
            "stylers": [
                {
                    "color": "#ffffff"
                },
                {
                    "lightness": 17
                }
            ]
        },
        {
            "featureType": "road.highway",
            "elementType": "geometry.stroke",
            "stylers": [
                {
                    "color": "#ffffff"
                },
                {
                    "lightness": 29
                },
                {
                    "weight": 0.2
                }
            ]
        },
        {
            "featureType": "road.arterial",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#ffffff"
                },
                {
                    "lightness": 18
                }
            ]
        },
        {
            "featureType": "road.local",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#ffffff"
                },
                {
                    "lightness": 16
                }
            ]
        },
        {
            "featureType": "poi",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#f5f5f5"
                },
                {
                    "lightness": 21
                }
            ]
        },
        {
            "featureType": "poi.park",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#dedede"
                },
                {
                    "lightness": 21
                }
            ]
        },
        {
            "elementType": "labels.text.stroke",
            "stylers": [
                {
                    "visibility": "on"
                },
                {
                    "color": "#ffffff"
                },
                {
                    "lightness": 16
                }
            ]
        },
        {
            "elementType": "labels.text.fill",
            "stylers": [
                {
                    "saturation": 36
                },
                {
                    "color": "#333333"
                },
                {
                    "lightness": 40
                }
            ]
        },
        {
            "elementType": "labels.icon",
            "stylers": [
                {
                    "visibility": "off"
                }
            ]
        },
        {
            "featureType": "transit",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#f2f2f2"
                },
                {
                    "lightness": 19
                }
            ]
        },
        {
            "featureType": "administrative",
            "elementType": "geometry.fill",
            "stylers": [
                {
                    "color": "#fefefe"
                },
                {
                    "lightness": 20
                }
            ]
        },
        {
            "featureType": "administrative",
            "elementType": "geometry.stroke",
            "stylers": [
                {
                    "color": "#fefefe"
                },
                {
                    "lightness": 17
                },
                {
                    "weight": 1.2
                }
            ]
        }
    ]
    });

    var marker = new google.maps.Marker({
        position: myLatLng,
        map: map,
        animation: google.maps.Animation.DROP,
        icon: icon_path
    });
}


/* Chart */

function isScrolledIntoView(elem){
    var docViewTop = $(window).scrollTop();
    var docViewBottom = docViewTop + $(window).height();
  
    var elemTop = $(elem).offset().top;
    var elemBottom = elemTop + $(elem).height();
  
    return ((elemBottom <= docViewBottom) && (elemTop >= docViewTop));
}

function checkChartPosition () {

    element =  $("#chart");
    visible = isScrolledIntoView(element);
        
    if (visible ) {

        if ( $('#chart').children().length > 0 ) {
        }
        else {
            LoadChart ();
        }
    }
}

function LoadChart () {

    //get percetanges here
    percs = $("#chart").data("percentages");
    console.log(percs);

    var width = 260,
    height = 260,
    offset = 0,
    radius = Math.min(width, height) / 2;
    
    var color = d3.scale.ordinal()
        .range(["#00205c", "#7a7a7b", "#9dc41a", "#7184af", "#853479", "#009fe3", "#611445", "#d3d3d3"]);

    var arc = d3.svg.arc()
        .outerRadius(radius - 15)
        .innerRadius(radius - 45);

    var pie = d3.layout.pie()
        .sort(null)
       // .startAngle(1.1*Math.PI)
       // .endAngle(3.1*Math.PI)
        .value(function(d) { return d.percentage; });
    
    var data = [
      {sector: '1', percentage: parseInt(percs[0]) },
      {sector:'2', percentage:  parseInt(percs[1])},
      {sector: '3', percentage:  parseInt(percs[2])},
      {sector: '4', percentage:  parseInt(percs[3])},
      {sector: '5', percentage:  parseInt(percs[4])},
      {sector: '6', percentage:  parseInt(percs[5])},
      {sector: '7', percentage:  parseInt(percs[6])},
      {sector: '8', percentage:  parseInt(percs[7])}
    ];
    
    var svg = d3.select("#chart").append("svg")
        .attr("id", "chart")
        .attr("width", width + offset)
        .attr("height", height + offset)
        .attr('viewBox', '0 0 ' + width + offset + ''+ width + offset +'')
        .attr('perserveAspectRatio', 'xMinYMid')
        .append("g")
        .attr("transform", "translate(" + (width+offset) / 2 + "," + (height + offset) / 2 + ")");
    
    var g = svg.selectAll(".arc")
        .data(pie(data))
        .enter().append("g")
        .attr("class", "arc");
    
    g.append("path")
        .style("fill", function(d) { return color(d.data.sector); })
        .transition().delay(function(d, i) { return i * 500; }).duration(500)
        .attrTween('d', function(d) {
            var i = d3.interpolate(d.startAngle+0.1, d.endAngle);
            return function(t) {
               d.endAngle = i(t);
            return arc(d);
        };
    });


    var aspect = width / height,
    chart = $("#chart");
    
     data.forEach(function(d) {
            d.songs = +d.songs;
    });


}
