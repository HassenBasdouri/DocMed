$('body').on('keyup','#search',function(){
    var search = $(this).val();
    if(search != '')
    {$.ajax({
        method:'POST',
        url:route,
        dataType:'json',
        data:{
            '_token':token,
            search :search
        },
        success: function(res){
            var tableRow='';
            $('#tbody_patients').html('');
            $.each(res , function(index , value){
                tableRow='<tr><th scope="row">'+value.id+'</th><td>'+value.name+'</td><td>'+value.lastname+'</td><td>'+value.cnam+'</td><td>'+value.cin+'</td><td><a href="'+routeEdit+'/'+value.id+'/edit">'+tradEdit+'</a></td><td><a href="'+routeRe+'/'+value.id+'">'+tradList+'</a></td></tr>';
                $('#tbody_patients').append(tableRow);
            });
        }
    });}
});
