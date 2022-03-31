// this function IIFE 
(function (){
   
    $("#addlieutrinh").change(function (e) { 
        e.preventDefault();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val()
                }
            });
            alert($(this).val())
            jQuery.ajax({
                method: 'POST',
                url: "quantri/searchdichvu",
                data: {
                    searchValue: $(this).val()
                },
                success: function (response) {
                    
                }
            });

    });

})();


