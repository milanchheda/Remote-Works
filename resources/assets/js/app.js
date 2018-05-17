
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('example-component', require('./components/ExampleComponent.vue'));

// const app = new Vue({
//     el: '#app'
// });


// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
$(".description").on('click', function(){
	$(".modal-job-title").text($(this).parents(".post-container:first").find(".job-title").text());
	$(".modal-job-title").addClass($(this).parents(".post-container:first").find(".job-title").attr('class'));

	$(".modal-body").html($(this).parent().html()).addClass('p-4');
	$(".modal-body").find('.description').html($(this).data('desc')).removeAttr('data-desc');
	$(".modal-body").find('.apply-link').remove();

	$('.modal-footer').html($(this).parents('.post-container:first').find('.apply-btn').html()).addClass('flex px-4 pb-4');
	$('.modal-footer').find('.apply-link').removeClass('text-sm').addClass('text-xl');

	$(".modal-content").addClass($(this).parents(".post-container:first").attr('class'));
	modal.style.display = "block";
});

// When the user clicks on <span> (x), close the modal
$(".close-modal").on('click', function() {
	$(".modal-job-title").attr('class', 'modal-job-title');
	$(".modal-content").attr('class', 'modal-content');
    modal.style.display = "none";
});

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

$(document).keyup(function(e) {
  if (e.keyCode === 27) $('.close-modal').trigger('click');   // esc
});
