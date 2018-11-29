const $ = jQuery;
var tabs = $('.nav-item');
var links = tabs.find('a');
var items = $('.tabs-contents-item');
var success = $('.success');
var errors = $('.errors');

items.eq(0).removeClass('d-none');

tabs.eq(0).on('click', 'a', function () {
    tabs.eq(0).removeClass('line-tab').siblings().addClass('line-tab');
    items.eq(0).removeClass('d-none').siblings().addClass('d-none');
});

tabs.eq(1).on('click', 'a', function () {
    tabs.eq(1).removeClass('line-tab').siblings().addClass('line-tab');
    items.eq(1).removeClass('d-none').siblings().addClass('d-none');
});

tabs.eq(2).on('click', 'a', function () {
    tabs.eq(2).removeClass('line-tab').siblings().addClass('line-tab');
    items.eq(2).removeClass('d-none').siblings().addClass('d-none');
});

tabs.eq(3).on('click', 'a', function () {
    tabs.eq(3).removeClass('line-tab').siblings().addClass('line-tab');
    items.eq(3).removeClass('d-none').siblings().addClass('d-none');
});

