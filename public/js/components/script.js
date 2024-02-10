import $ from './jquery';
window.jQuery = $;
window.$ = $;
jQuery(document).ready(function ($) {
    $.post("", {}).then((resp) => {

    });
});