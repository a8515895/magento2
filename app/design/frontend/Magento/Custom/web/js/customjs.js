define([
    "jquery", "jquery/ui", 'domReady!','customjs'
], function($){
    $(document).ready(function(){

    })
    $(document).on('click','.home-tab-category',function(){
        let href = $(this).data('href');
        let tab_pane = $(this).closest('.main-custom-container').find(`.tab-pane[data-id='${href}']`);
        $(`.tab-pane`).removeClass('active');
        $(tab_pane).addClass('active');
    })
});