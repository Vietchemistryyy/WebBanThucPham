$(document).ready(function () {
    $('.nav-link.active .sub-menu').slideDown();

    // Khi click vào icon mũi tên
    $('#sidebar-menu .arrow').click(function (e) {
        e.preventDefault();

        let parentLi = $(this).closest('li');

        // Đóng tất cả submenu khác
        $('#sidebar-menu .sub-menu').slideUp();
        $('#sidebar-menu .arrow').removeClass('fa-angle-down').addClass('fa-angle-right');

        // Nếu submenu hiện tại đang đóng thì mở ra
        if (!parentLi.hasClass('open')) {
            parentLi.children('.sub-menu').slideDown();
            $(this).removeClass('fa-angle-right').addClass('fa-angle-down');
        }

        // Toggle class open
        $('#sidebar-menu .nav-link').removeClass('open');
        parentLi.toggleClass('open');
    });

    // Checkbox check all
    $("input[name='checkall']").click(function () {
        var checked = $(this).is(':checked');
        $('.table-checkall tbody tr td input:checkbox').prop('checked', checked);
    });
});