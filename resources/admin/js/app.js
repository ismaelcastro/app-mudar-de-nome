/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
window.Popper = require('popper.js').default;
window.$ = window.jQuery = require('jquery');
window.ApexCharts = require('apexcharts');

require('./bootstrap');

require('../plugins/jquery-bar-rating/js/jquery.barrating.js');
require('../plugins/sweetalert/js/sweetalert.min.js');

//import ApexCharts from 'apexcharts'

$( document ).ready(function() {
    $('[data-toggle="tooltip"]').tooltip();
    $(".au-loading").fadeOut("slow");
    $('.btn-avanced').click(function(){
        $('.box-advanced').show();
    });
    $('.cancel-advanced').click(function(){
        $('.box-advanced').hide();
    });

    $('.checkItem0').click(function(){
        if ($(this).is(':checked')) {
            $(".checkItem").prop('checked', true);
        }else{
            $(".checkItem").prop('checked', false);
        }
    });    
    
});


