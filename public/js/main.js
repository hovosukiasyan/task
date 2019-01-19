// $('.filestyle').on('change',function(e){

//     var file = e.target.files[0],reader = new FileReader();
    
//     reader.onload =function(c){
    
//         $('#img').attr('src',c.target.result);    
//     }
        
//     });


$(function(){
    $('#picture').change(function(){
      var url = $(this).val();
      var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
      if (input.files && input.files[0]&& (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) 
       {
          var reader = new FileReader();
  
          reader.onload = function (e) {
             $('#img').attr('src', e.target.result);
          }
         reader.readAsDataURL(input.files[0]);
      }
      else
      {
        $('#img').attr('src', '/assets/no_preview.png');
      }
    });
  
  });