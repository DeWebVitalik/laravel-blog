require('./bootstrap');
import $ from 'jquery';
window.$ = window.jQuery = $;
$(document).ready(function() {
    $('#add-post-content').summernote({ height: 300,});
});