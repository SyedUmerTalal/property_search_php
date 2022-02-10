<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link href="https://getbootstrap.com/docs/4.0/examples/carousel/carousel.css" rel="stylesheet">
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/lozad/dist/lozad.min.js"></script>
<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
<style>
.myInnertextarea
{
    width: 100%;
    overflow: hidden;
    resize: none;
    border: none;
}

</style>

<div class="container" id="myListing">
    <form id="myRequest" class="mt-4" onsubmit="myForm(event,'')">
        <div class="row">
            <div class="col-lg-12">
                <input type="text" class="form-control" id="keyword" name="keyword" placeholder="Enter keyword here">
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-lg-4">
                <select class="form-control" name="city" id="city">
                    <option value="">Select Location</option>  
                    <option value="Dubai">Dubai</option>  
                    <option value="Sharjah">Sharjah</option>  
                </select>            
            </div>
            <div class="col-lg-4">
                <select class="form-control" name="property_type" id="property_type">
                    <option value="">Property Type</option>  
                    <option value="Apartment">Apartment</option>  
                    <option value="Townhouse">Townhouse</option>  
                </select>            
            </div>
            <div class="col-lg-4">
                <select class="form-control" name="bed" id="bed">
                    <option value="">Select number of Bedrooms</option>  
                    <option value="1.0">1</option>  
                    <option value="2.0">2</option>  
                    <option value="3.0">3</option>  
                    <option value="4.0">4</option>  
                    <option value="5.0">5</option>  
                    <option value="6.0">6</option>  
                </select>            
            </div>
        </div>
        
        <div class="row mt-4">
            <div class="col-lg-4">
                <label>Min-Max Price:</label>
                <input type="range" id="vol" name="volss" min="10000" max="2500000">
                <span id="value_range">1M - 25M</span>
            </div>
            <div class="col-lg-4">
                <label>Sqft:</label>
                <input type="range" id="sqft" name="sqft" min="1000" max="25000">
                <span id="sq_ft_range">1000 - 25000</span>
            </div>
            <div class="col-lg-2">
                <a class="btn btn-primary btn btn-sm" style="color:#fff;" id="advanceSearch">Advance Search</a>
            </div>
            <div class="col-lg-2"> 
                <button class="btn btn-primary btn btn-lg" type="submit">Search</button>
            </div>
        </div>
        
        <div class="row mt-4 jumbotron" id="advanceFilters">
            <div class="col-lg-4">
                <label>Bathrooms:</label>
                <select class="form-control" name="bath" id="bath">
                    <option value="">Select number of Bathrooms</option>  
                    <option value="1.0">1</option>  
                    <option value="2.0">2</option>  
                    <option value="3.0">3</option>  
                    <option value="4.0">4</option>  
                    <option value="5.0">5</option>  
                    <option value="6.0">6</option>  
                </select>   
            </div>
        </div>
        
    </form>
</div>

<div id="result">
    <div class="container">
        <div class="row" id="result2"></div>
        <div class="row" id="load"></div>
        <div class="row" id="view_more"></div>
    </div>
</div>

<div id="inner_page">
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://getbootstrap.com/docs/4.0/assets/js/vendor/popper.min.js"></script>
<script src="https://getbootstrap.com/docs/4.0/dist/js/bootstrap.min.js"></script>
<script>
var passingData, queryParams = {};

window.onload = () => {
    $("#inner_page").hide();
}
$("#vol").on('change', () => {
    $("#value_range").html($("#vol").val()+'M');
});
$("#sqft").on('change', () => {
    $("#sq_ft_range").html($("#sqft").val());
});
$("#advanceFilters").hide();
$("#advanceSearch").click(() => {
    $("#advanceFilters").toggle();
});


  
  
function myForm(e,page)
{
    e.preventDefault();
    if(page < 1){
        $("#result2").empty();
        $("#result2").empty();
        $('#load').empty();
    }
    var range = $("#vol").val();
    var city = $("#city").val();
    var bedrooms = $("#bedrooms").val();
    var property_type = $("#property_type").val();
    var keyword = $("#keyword").val();
    var sqft = $("#sqft").val();
    var bed = $("#bed").val();
    var keyword = $("#keyword").val();
    var bath = $("#bath").val();
    $.ajax({
        url: 'ajax.php',
        method: "POST",
        data: { range: range, city: city, page: page, property_type: property_type, keyword: keyword, sqft: sqft, bed: bed, bath: bath },
        dataType: 'JSON',
        beforeSend: function(){
            $('#load').html(`
            <div class="col-lg-4 col-sm-12">
            <lottie-player src="https://assets6.lottiefiles.com/packages/lf20_jp3Dk5.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"  loop autoplay></lottie-player>
            </div>
            <div class="col-lg-4 col-sm-12">
            <lottie-player src="https://assets6.lottiefiles.com/packages/lf20_jp3Dk5.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"  loop autoplay></lottie-player>
            </div>
            <div class="col-lg-4 col-sm-12">
            <lottie-player src="https://assets6.lottiefiles.com/packages/lf20_jp3Dk5.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"  loop autoplay></lottie-player>
            </div>
            <div class="col-lg-4 col-sm-12">
            <lottie-player src="https://assets6.lottiefiles.com/packages/lf20_jp3Dk5.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"  loop autoplay></lottie-player>
            </div>
            <div class="col-lg-4 col-sm-12">
            <lottie-player src="https://assets6.lottiefiles.com/packages/lf20_jp3Dk5.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"  loop autoplay></lottie-player>
            </div>
            <div class="col-lg-4 col-sm-12">
            <lottie-player src="https://assets6.lottiefiles.com/packages/lf20_jp3Dk5.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"  loop autoplay></lottie-player>
            </div>`);
        },        
        success:function(r, textStatus, jqXHR)
        {
            // console.log(textStatus, jqXHR);
            var response = '';
            var url = '';
            //console.log(r);
            if(r.content.listings.length > 0)
            {
                passingData = r;
                response += `<div class="container">
                <div class="row">`
                r.content.listings.forEach((data, index) => {
                    if(data.media.images[0] !== undefined){
                       url = data.media.images[0].url; 
                    }
                    response += `
                    <div class="col-lg-6 col-sm-12">
                        <div class="card" >
                          <img class="card-img-top" src="${url ? url : 'https://www.salonlfc.com/wp-content/uploads/2018/01/image-not-found-scaled-1150x647.png'}" 
                          id="dd" alt="Image" style="object-fit:contain;">
                          
                            <div class="card-body">
                                 <a class="card-text" onclick="updateURL(passingData, this.id);" id="${data.data.id}">${data.data.name}</a>
                                 <p class="card-text">City: ${data.data.pba__city_pb__c}</p>
                                 <p class="card-text">Price: ${data.data.pba__listingprice_pb__c}</p>
                                 <p class="card-text">Bed: ${data.data.pba__bedrooms_pb__c}</p>
                                 <p class="card-text">Bath: ${data.data.pba__fullbathrooms_pb__c}</p>
                                 <p class="card-text">Type: ${data.data.pba__propertytype__c}</p>
                                 <p class="card-text">Sqft: ${data.data.pba__totalarea_pb__c}</p>
                            </div>
                        </div>
                    </div>`;
                });
                response +=`</div></div>`;
                $("#load").html(``);
                $("#result2").append(response);
                $("#view_more").html('<button class="btn btn-primary" onclick="myForm(event,'+r.page+')">View more</button>');
            }
            else
            {
                $("#load").html(`
                <div class="row">
                <div class="col-lg-4 col-sm-4">
                </div>
                <div class="col-lg-4 col-sm-4">
                <lottie-player src="https://assets2.lottiefiles.com/packages/lf20_inuxiflu.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"  loop autoplay>
                </lottie-player>
                </div>
                         <div class="col-lg-4 col-sm-4">
                </div>
                </div>
                `);
                $("#view_more").html('');
            }
        }
    });
}

function clearView(){
    $('#myListing').empty();
    $("#result").empty();
}
function renderView(listingData) {
    clearView();
    $("#inner_page").show();
}
  
function findListingById(id, data) {
    if(data.content.listings){
        var result = $.grep(data.content.listings, function(i){ 
            return i.data.id == id;
        });
        $.ajax({
            url: 'ajax_two2.php',
            method: "POST",
            data: result[0],
            dataType: 'JSON',
            success:function(r, textStatus, jqXHR)
            {
                autosize();
                console.log(r);
                $("#inner_page").html(r);
            }
        });
    }
}
function updateURL(stateData, str) {
    str = str.replace(/([^?&])*?=default[&]*/g, '');
    str = str.replace(/&$/g, '');
    if (history.pushState) {
        var newurl = window.location.protocol + "//" + window.location.host + window.location.pathname + '?' + 'id='+str;
        history.pushState(stateData, null, newurl);
        renderView(stateData);
        findListingById(str, stateData);
    }
}


  
</script>
<script>

function autosize(){
    var text = $('.myInnertextarea');

    text.each(function(){
        $(this).attr('rows',1);
        resize($(this));
    });

    text.on('input', function(){
        resize($(this));
    });
    
    function resize ($text) {
        $text.css('height', 'auto');
        $text.css('height', $text[0].scrollHeight+'px');
    }
}
</script>