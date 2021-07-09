tinymce.init({selector:'textarea'});
$(document).ready(function()
{
    $('#selectAllBoxes').click(function(event)
{
        if(this.checked)
            {
                $('.checkBoxes').each(function(){
                    this.check = true;
                });
            }
        else{
            $('.checkBoxes').each(function(){
                    this.check = false;
                });
        }
        
}); 

});