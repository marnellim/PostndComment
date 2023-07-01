import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

$(document).ready(function() {
    $('.read-more-link').click(function(e) {
        e.preventDefault();
        var description = $(this).closest('.description');
        var fullDescription = description.data('full-description');

        description.find('.summary-content').text(fullDescription);
        $(this).hide();
        description.find('.read-less-link').show();
    });

    $('.read-less-link').click(function(e) {
        e.preventDefault();
        var description = $(this).closest('.description');
        var shortDescription = description.data('short-description');

        description.find('.summary-content').text(shortDescription);
        $(this).hide();
        description.find('.read-more-link').show();
    });

    $('.description').each(function() {
        var description = $(this);
        var fullDescription = description.data('full-description');
        var shortDescription = description.data('short-description');

        if (fullDescription.length > 100) {
            description.find('.read-more-link').show();
        } else {
            description.find('.read-more-link').hide();
        }

        description.find('.summary-content').text(shortDescription);
        description.find('.read-less-link').hide();

    });

    // // document.addEventListener('DOMContentLoaded', function() {
    //     e.preventDefault();
    //     var myPostsCheckbox = document.getElementById('my-posts');
    //     const categorySelect = document.getElementById('category');
    // });

});
