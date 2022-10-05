//custom mobile ext dropdown js
// dropdown show & hide
var mobile = document.querySelector(".getSelect");
if(mobile){
        mobile.addEventListener("click", function(e){
        e.stopPropagation();
        e.preventDefault();
        var flagList = document.getElementsByClassName("country_dropdown")[0];
        var icon = document.querySelector('.fa-angle-down');
        if(flagList.style.display == 'block'){
            flagList.style.display = "none";
            icon.classList.remove("icon");
        }else{
            flagList.style.display = "block";
            icon.classList.add("icon");
        }
    });
}


//dropdown list value get code
var flags= document.querySelectorAll('.country_dropdown');
    if(flags){
    flags.forEach(function(val){
        val.querySelectorAll('.allcountries li').forEach(function(a){
            a.addEventListener("click", function(){
                var flagValue = this.innerHTML;
                document.querySelector('.getSelect').innerHTML = flagValue + '<i class="fa fa-angle-down" aria-hidden="true">'; 
                document.querySelector('.country_dropdown').style.display = "none";
            });
        });
    });
}

//close dropdown option 
document.querySelector('body').addEventListener('click',function(e){
    if(document.querySelector('.country_dropdown')){
        var icon = document.querySelector('.fa-angle-down');
        document.querySelector('.country_dropdown').style.display = "none";
        icon.classList.remove("icon");
    } 
});



//custom mobile ext second modal
// dropdown show & hide
var mobileGet = document.querySelector(".getSelectNumber");
if(mobileGet){
        mobileGet.addEventListener("click", function(e){
        e.stopPropagation();
        e.preventDefault();
        var flagList = document.getElementsByClassName("country_dropdown")[1]; 
        if(flagList.style.display == 'block'){
            flagList.style.display = "none"; 
        }else{
            flagList.style.display = "block"; 
        }
    });
} 

//dropdown list value get code
var flags= document.querySelectorAll('.options');
    if(flags){
    flags.forEach(function(val){
        val.querySelectorAll('.allPhoneNumber li').forEach(function(a){
            a.addEventListener("click", function(){
                var flagValue = this.innerHTML;
                document.querySelector('.getSelectNumber').innerHTML = flagValue + '<i class="fa fa-angle-down" aria-hidden="true">'; 
                document.querySelector('.options').style.display = "none";
            });
        });
    });
}

//close dropdown option 
document.querySelector('body').addEventListener('click',function(e){
    if(document.querySelector('.options')){
        document.querySelector('.options').style.display = "none";
    }  
});



//custom select dropdown js
$(document).ready(function(){
    $('.select select').each(function(){
        var $this = $(this), numberOfOptions = $(this).children('option').length;
      
        $this.addClass('select-hidden'); 
        $this.wrap('<div class="select"></div>');
        $this.after('<div class="select-styled"></div>');
    
        var $styledSelect = $this.next('div.select-styled');
        $styledSelect.text($this.children('option').eq(0).text());
      
        var $list = $('<ul />', {
            'class': 'select-options'
        }).insertAfter($styledSelect);
      
        for (var i = 0; i < numberOfOptions; i++) {
            $('<li />', {
                text: $this.children('option').eq(i).text(),
                rel: $this.children('option').eq(i).val()
            }).appendTo($list);
        }
      
        var $listItems = $list.children('li');
      
        $styledSelect.click(function(e) {
            e.stopPropagation();
            $('div.select-styled.active').not(this).each(function(){
                $(this).removeClass('active').next('ul.select-options').hide();
            });
            $(this).toggleClass('active').next('ul.select-options').toggle();
        });
      
        $listItems.click(function(e) {
            e.stopPropagation();
            $styledSelect.text($(this).text()).removeClass('active');
            $this.val($(this).attr('rel'));
            $list.hide();
            //console.log($this.val());
        });
      
        $(document).click(function() {
            $styledSelect.removeClass('active');
            $list.hide();
        });
    
    });
})


//Tax Settings js 
$(document).ready(function(){
    $("#tax-settings").click(function(){
        var id = $(this).attr('id'); 
        $("."+id).slideToggle();    
    });
})

//Collaterals offered
$(document).ready(function(){
    $(".collacteral").click(function(){
        var show = $(".tabs-form").css("display");
        if(show == "block"){
            $(".tabs-form").hide();
            $(".tabs-form").removeClass('active');
            $(".card .bg-purple").removeClass('active');
            $(".collateral").removeClass('active');
        }else{
            $(".tabs-form").show();
            $(".tabs-form").addClass('active');
            $(".card .bg-purple").addClass('active');
            $(".fa-chevron-down .collateral").addClass('active');
        }
    });
    $("#more-details").click(function(){ 
        $('.more-view-details').slideToggle(); 
    });
})  
 